<?php
/**
 * This file is part of Pdf-Edit Library
 * @author Macintoshplus <jb@nahan.fr>
 * @licence MIT
 */


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