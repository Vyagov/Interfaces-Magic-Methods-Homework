<?php

class MajorCity extends City implements IGetProperty
{
	protected $numberOfResidents;

	use GetPropertyTrait;
	
	public function __construct($name, $countryCode, $developmentIndex, $climateData, $numberOfResidents)
	{
		parent::__construct($name, $countryCode, $developmentIndex, $climateData);
		$this->numberOfResidents = $numberOfResidents;
	}

	public function __toString()
	{
		return parent::__toString() . sprintf("Number of residents: %d\n",
				$this->numberOfResidents
			);
	}
	
}