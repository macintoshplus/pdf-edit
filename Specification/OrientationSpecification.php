<?php
/**
 * This file is part of Pdf-Edit Library
 * @author Macintoshplus <jb@nahan.fr>
 * @licence MIT
 */


namespace Jbnahan\PdfEdit\Specification;

class OrientationSpecification extends CompositeSpecification
{
	private $spec;

	public function __construct()
	{
		$this->spec = new InArraySpecification(['p', 'portrait', 'l', 'landscape']);
	}

	public function isSatisfiedBy($object)
	{
		return $this->spec->isSatisfiedBy(strtolower($object['orientation']));
	}
}