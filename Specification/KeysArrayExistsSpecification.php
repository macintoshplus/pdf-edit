<?php
/**
 * This file is part of Pdf-Edit Library
 * @author Macintoshplus <jb@nahan.fr>
 * @licence MIT
 */


namespace Jbnahan\PdfEdit\Specification;

class KeysArrayExistsSpecification extends CompositeSpecification
{
	private $keys;

	public function __construct(array $keys)
	{
		$this->keys = $keys;
	}

	public function isSatisfiedBy($object)
	{
		if (!is_array($object)) {
			return false;
		}
		foreach ($this->keys as $key) {
			if (!array_key_exists($key, $object)) {
				return false;
			}
		}
		return true;
	}
}