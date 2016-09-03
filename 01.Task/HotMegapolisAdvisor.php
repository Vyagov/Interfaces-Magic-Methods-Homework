<?php

class HotMegapolisAdvisor implements ITripAdvisor
{
	public function rate(City $city)
	{
		$rate = $city->climateData->maxTempInCelsius;
		
		if ($city instanceof MajorCity) {
			$rate *= 1.5;
		}
		
		return $rate;
	}
}
