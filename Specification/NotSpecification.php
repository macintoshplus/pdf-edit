<?php
/**
 * This file is part of Pdf-Edit Library
 * @author Macintoshplus <jb@nahan.fr>
 * @licence MIT
 */


namespace Jbnahan\PdfEdit\Specification;

class NotSpecification extends CompositeSpecification
{
	private $one;

	public function __construct(SpecificationInterface $one)
	{
		$this->one = $one;
	}

	public function isSatisfiedBy($object)
	{
		return !$this->one->isSatisfiedBy($object);
	}
}