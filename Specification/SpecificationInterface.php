<?php

namespace Jbnahan\PdfEdit\Specification;

class SpecificationInterface
{
	public function isSatisfiedBy($object);

	public function and(SpecificationInterface $other);
	public function or(SpecificationInterface $other);
	public function not();
}