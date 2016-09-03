<?php

trait GetPropertyTrait
{
	public function __get($property) {
		if (property_exists($this, $property)) {
			return $this->$property;
		}
	}
}