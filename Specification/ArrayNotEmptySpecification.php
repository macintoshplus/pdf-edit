<?php
/**
 * This file is part of Pdf-Edit Library
 * @author Macintoshplus <jb@nahan.fr>
 * @licence MIT
 */


namespace Jbnahan\PdfEdit\Specification;

class ArrayNotEmptySpecification extends CompositeSpecification
{

	public function __construct()
	{
	}

	public function isSatisfiedBy($object)
	{
		if (!is_array($object)) {
			return false;
		}
		
		return count($object) !== 0;
	}
}