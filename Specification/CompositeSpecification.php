<?php

namespace Jbnahan\PdfEdit\Specification;

abstract class CompositeSpecification implements SpecificationInterface
{
	abstract public function isSatisfiedBy($object);

	public function and(SpecificationInterface $other)
	{
		return new AndSpecification($this, $other);
	}

	public function or(SpecificationInterface $other)
	{
		return new OrSpecification($this, $other);
	}

	public function not()
	{
		return new NotSpecification($this);
	}
}