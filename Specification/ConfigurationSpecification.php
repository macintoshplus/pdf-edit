<?php

namespace Jbnahan\PdfEdit\Specification;

class ConfigurationSpecification extends CompositeSpecification
{
	private $compose;
	public function __construct()
	{
		$this->compose = new KeysArrayExistsSpecification(['pages', 'orientation', 'size', 'font', 'font-size'])
							->and(new PagesExistsSpecification())
							->and(new OrientationSpecification())
							->and(new PageSizeSpecification())
							;
	}

	public function isSatisfiedBy($object)
	{
		return $this->compose->isSatisfiedBy($object);
	}
}