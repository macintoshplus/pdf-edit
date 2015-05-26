<?php

namespace Jbnahan\PdfEdit\Specification;

class PagesExistsSpecification extends CompositeSpecification
{
	private $composite;
	public function __construct()
	{
		$composite = new ArrayNotEmptySpecification();
	}

	public function isSatisfiedBy($object)
	{	
		return $this->composite->isSatisfiedBy($object['pages']);
	}
}