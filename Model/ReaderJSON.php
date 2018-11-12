<?php
	/**
	 * This class read the JSON file and returns the requires values
	 * @author: Lucas Almeida Salvador
	 */
	class ReaderJSON
	{
		function readQuantumEfficiency($CCDType, $FilterColor)
		{
			$arquivo = file_get_contents('../static/Quantum.json');
			$json = json_decode($arquivo);

			return $json->QuantumEfficiency->$CCDType->$FilterColor;
		}
		function readCCDvalues($ccdMode, $attribute)
		{
			$arquivo = file_get_contents('../static/ccd.json');
			$json = json_decode($arquivo);
			return $json->{$ccdMode}->{$attribute};
		}
		function readFilter($filter, $attribute)
		{
			$arquivo = file_get_contents('../static/filter.json');
			$json = json_decode($arquivo);
			return  $json->$filter->$attribute;
		}
		function readMsky($filter, $attribute, $phase)
		{
			$arquivo = file_get_contents('../static/filter.json');
			$json = json_decode($arquivo);
			return $json->$filter->$attribute->$phase;
		}
	}
?>