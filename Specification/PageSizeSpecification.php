<?php

namespace Jbnahan\PdfEdit\Specification;

class PageSizeSpecification extends CompositeSpecification
{
	private $spec;

	public function __construct()
	{
		$this->spec = new InArraySpecification(['a3', 'a4', 'a5', 'letter', 'legal']);
	}

	public function isSatisfiedBy($object)
	{
		return $this->spec->isSatisfiedBy(strtolower($object['size']));
	}
}