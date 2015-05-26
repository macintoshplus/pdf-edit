<?php
/**
 * This file is part of Pdf-Edit Library
 * @author Macintoshplus <jb@nahan.fr>
 * @licence MIT
 */


namespace Jbnahan\PdfEdit\Specification;

class AndSpecification extends CompositeSpecification
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
		return $this->one->isSatisfiedBy($object) && $this->other->isSatisfiedBy($object);
	}
}