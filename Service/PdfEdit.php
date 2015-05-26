<?php
/**
 * This file is part of Pdf-Edit Library
 * @author Macintoshplus <jb@nahan.fr>
 * @licence MIT
 */

namespace Jbnahan\PdfEdit\Service;

use Jbnahan\PdfEdit\Specification\ConfigurationSpecification;

class PdfEdit
{
	private $config;

	private $data;

	private $pdf;

	private $currentPage;

	public function __construct()
	{
	}

	public function compute($inputPath, $data, array $config, $outputPath=null)
	{
		if (!is_file($inputPath)) {
			throw new \InvalidArgumentException("Error : Input file not found or not a file");
		}

		$spec = new ConfigurationSpecification();
		if (!$spec->isSatisfiedBy($config)) {
			throw new \InvalidArgumentException("Error : Config arg is invalid");
		}

		$this->data = $data;
		$this->config = $config;

		$this->pdf = new \FPDI();
		$this->pdf->setSourceFile($inputPath);
		$this->currentPage = 0;

		$continue = true;
		while ($continue) {
			try {
				$this->addNextPage();
				$this->computePage();
			} catch (\Exception $e) {
				$continue = false;
			}
		}

		if (null === $outputPath) {
			$this->pdf->Output();
			return;
		}

		$this->pdf->Output($outputPath, 'F');

	}

	private function extractPage($number)
	{
		return $this->pdf->importPage($number);
	}

	/**
	 * add next page into pdf
	 */
	private function addNextPage()
	{
		$this->addNextPage++;
		$this->pdf->addPage($this->config['orientation'], $this->config['size']);
		$this->pdf->useTemplate($this->extractPage($this->currentPage));

		$this->pdf->setFont($this->config['font']);
		$this->pdf->setFontSize($this->config['font-size']);
	}

	/**
	 * Add data into page
	 */
	private function computePage()
	{
		if (array_key_exists($this->currentPage, $this->config['pages'])) {
			return;
		}

		foreach ($this->config['pages'][$this->currentPage] as $key => $params) {
			$data = $this->getDataByKey((!array_key_exists('key', $params))? $key:$params['key']);
			if (null === $data) {
				continue;
			}

			switch (strtolower($params['type'])) {
				case 'text':
					$this->pdf->Text(floatval($params['x']), floatval($params['y']), $data);
					break;
			}
		}
	}

	/**
	 * key ex : 'pages.data.index1'
	 * @param string $originalKey
	 * @return mixed
	 */
	private function getDataByKey($originalKey)
	{
		$elements = explode('.', $originalKey);
		$data = $this->data;
		foreach ($elements as $key) {
			if (is_array($data)) {
				if (!array_key_exists($key, $data)) {
					trigger_error(sprintf('This key not exist : %s', $key), E_USER_WARNING);
					return null;
				}
				$data = $data[$key];
			}
			if (is_object($data)) {
				if (property_exists($data, $key)) {
					$data = $data->$key;
					continue;
				}
				if (method_exists($data, $key)) {
					$data = $data->$key();
					continue;
				}
				trigger_error(sprintf('This key not exist : %s', $key), E_USER_WARNING);
				return null;
			}
		}
		return $data;
	}
}