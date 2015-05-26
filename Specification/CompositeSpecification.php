<?php
/**
 * This file is part of Pdf-Edit Library
 * @author Macintoshplus <jb@nahan.fr>
 * @licence MIT
 */

namespace Jbnahan\PdfEdit\Specification;

abstract class CompositeSpecification implements SpecificationInterface
{
	abstract public function isSatisfiedBy($object);

	public function addAnd(SpecificationInterface $other)
	{
		return new AndSpecification($this, $other);
	}

	public function addOr(SpecificationInterface $other)
	{
		return new OrSpecification($this, $other);
	}

	public function negate()
	{
		return new NotSpecification($this);
	}
}