<?php

class City implements IGetProperty
{
	protected $name;
	protected $countryCode;
	protected $developmentIndex;
	protected $climateData;
	
	use GetPropertyTrait;
	
	public function __construct($name, $countryCode, $developmentIndex, ClimateInfo $climateData)
	{
		$this->name = $name;
		$this->climateData = $climateData;
		
		if (preg_match('/^([A-Z]{3})$/', $countryCode)) {
			$this->countryCode = $countryCode;
		} else {
			throw new Exception('Invalide country code!');
		}
		
		if ($developmentIndex >= 0 && $developmentIndex <= 1) {
			$this->developmentIndex = $developmentIndex;
		} else {
			throw new Exception('Invalide development index!');
		}
	}
	
	public function __set($property, $value)
	{
		if (property_exists($this, $property)) {
			$this->$property = $value;
		}
	}
	
	public function __toString()
	{
		return sprintf("City: %s\nCountry code: %s\nDevelopment index: %01.3f\nClimate data: %s\n",
				$this->name,
				$this->countryCode,
				$this->developmentIndex,
				$this->climateData
			);
	}
}