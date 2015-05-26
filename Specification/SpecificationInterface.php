<?php
/**
 * This file is part of Pdf-Edit Library
 * @author Macintoshplus <jb@nahan.fr>
 * @licence MIT
 */


namespace Jbnahan\PdfEdit\Specification;

interface SpecificationInterface
{
	public function isSatisfiedBy($object);

	public function addAnd(SpecificationInterface $other);
	public function addOr(SpecificationInterface $other);
	public function negate();
}