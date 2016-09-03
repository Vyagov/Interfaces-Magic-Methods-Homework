<?php

class ClimateInfo implements IGetProperty
{
	protected $minTempInCelsius;
	protected $maxTempInCelsius;
	
	use GetPropertyTrait;
	
	public function __construct($minTempInCelsius, $maxTempInCelsius)
	{
		$this->minTempInCelsius = $minTempInCelsius;
		$this->maxTempInCelsius = $maxTempInCelsius;
	}
	
	public function __toString()
	{
		return sprintf("\n- Min temperature is %d°C\n- Max temperature is %d°C",
				$this->minTempInCelsius,
				$this->maxTempInCelsius
			);
	}
}