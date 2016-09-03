<?php

class TouristsGuide 
{
	protected $maxNumberOfCities;
	protected $cities;
	
	public function __construct($maxNumberOfCities)
	{
		$this->maxNumberOfCities = $maxNumberOfCities;
		$this->cities = [];
	}
	
	public static function convertToFahrenheit($degrees)
	{
		return $degrees * 9 / 5 + 32;
	}
	
	public function isFahrenheit(City $city, $isFahrenheit)
	{
		if ($isFahrenheit) {
			$minTemp = self::convertToFahrenheit($city->climateData->minTempInCelsius);
			$maxTemp = self::convertToFahrenheit($city->climateData->maxTempInCelsius);
			
			return sprintf("City: %s\n- min temperature is %d°F\n- max temperature is %d°F\n",
					$city->name,
					$minTemp,
					$maxTemp
				);
		} else {
			$minTemp = $city->climateData->minTempInCelsius;
			$maxTemp = $city->climateData->maxTempInCelsius;
			
			return sprintf("City: %s\n- min temperature is %d°C\n- max temperature is %d°C\n",
					$city->name,
					$minTemp,
					$maxTemp
				);
		}
	}
	
	public function getBest(ITripAdvisor $advisor)
	{	
		$best = 0;
		
		foreach ($this->cities as $key => $value) {
			if ($best < $advisor->rate($value)) {
				$best = $advisor->rate($value);
				$city = $value;
			}
		}
		
		return $city;
	}
	
	public function addCity(City $city, $isFahrenheit)
	{
		if ($this->maxNumberOfCities >= count($this->cities) + 1) {
			$this->cities[] = $city;
			echo $this->isFahrenheit($city, $isFahrenheit);
		}
	}
}