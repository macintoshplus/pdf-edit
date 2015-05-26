<?php

namespace Jbnahan\PdfEdit\Specification;

class OrSpecification extends CompositeSpecification
{
	private $one;

	private $other;

	public function __construct(SpecificationInterface $one, SpecificationInterface $other)
	{
		$this->one = $one;
		$this->other = $other;
	}

	public function isSatisfiedBy($object)
	{
		return $this->one->isSatisfiedBy($object) || $this->other->isSatisfiedBy($object);
	}
}