<?php
/**
 * This file is part of Pdf-Edit Library
 * @author Macintoshplus <jb@nahan.fr>
 * @licence MIT
 */


namespace Jbnahan\PdfEdit\Specification;

class ConfigurationSpecification extends CompositeSpecification
{
	private $compose;
	public function __construct()
	{
		$this->compose = new KeysArrayExistsSpecification(['pages', 'orientation', 'size', 'font', 'font-size']);
		$this->compose->addAnd(new PagesExistsSpecification())
						->addAnd(new OrientationSpecification())
						->addAnd(new PageSizeSpecification())
						;
	}

	public function isSatisfiedBy($object)
	{
		return $this->compose->isSatisfiedBy($object);
	}
}