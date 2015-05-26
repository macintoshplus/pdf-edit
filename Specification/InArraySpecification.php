<?php

namespace Jbnahan\PdfEdit\Specification;

class InArraySpecification extends CompositeSpecification
{
	private $values;

	public function __construct(array $values)
	{
		$this->values = $values;
	}

	public function isSatisfiedBy($object)
	{
		if (!is_array($object)) {
			return false;
		}
		return in_array($object, $this->values);
	}
}