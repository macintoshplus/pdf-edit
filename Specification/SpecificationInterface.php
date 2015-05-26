<?php
/**
 * This file is part of Pdf-Edit Library
 * @author Macintoshplus <jb@nahan.fr>
 * @licence MIT
 */


namespace Jbnahan\PdfEdit\Specification;

class SpecificationInterface
{
	public function isSatisfiedBy($object);

	public function and(SpecificationInterface $other);
	public function or(SpecificationInterface $other);
	public function not();
}