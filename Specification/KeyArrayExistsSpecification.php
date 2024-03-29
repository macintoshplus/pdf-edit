<?php
/**
 * This file is part of Pdf-Edit Library
 * @author Macintoshplus <jb@nahan.fr>
 * @licence MIT
 */


namespace Jbnahan\PdfEdit\Specification;

class KeyArrayExistsSpecification extends CompositeSpecification
{
	private $key;

	public function __construct($key)
	{
		$this->key = $key;
	}

	public function isSatisfiedBy($object)
	{
		if (!is_array($object)) {
			return false;
		}
		return array_key_exists($this->key, $object);
	}
}