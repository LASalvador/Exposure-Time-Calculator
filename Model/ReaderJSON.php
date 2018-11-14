<?php
	/**
	 * This class read the JSON file and returns the requires values
	 * @author: Lucas Almeida Salvador
	 */
	class ReaderJSON
	{
		/**
		* It Reads the Quantum Efficiency value
		* @param String $CCDType Type of CCD
		* @param String $FilterColor Filter selected
		*/
		function readQuantumEfficiency($CCDType, $FilterColor)
		{
			$arquivo = file_get_contents('../static/Quantum.json');
			$json = json_decode($arquivo);

			return $json->QuantumEfficiency->$CCDType->$FilterColor;
		}
		/**
		* It reads the CCD values as gain, readout Noise etc.
		* @param int $ccdMode Operation Mode of CCD
		* @param String $attribute attribute required
		*/
		function readCCDvalues($ccdMode, $attribute)
		{
			$arquivo = file_get_contents('../static/ccd.json');
			$json = json_decode($arquivo);
			return $json->{$ccdMode}->{$attribute};
		}
		/**
		* It reads the Filter values as effective wavelength, flux zero etc
		* @param String $filter filter selected
		* @param String $attribute attribute selected
		*/
		function readFilter($filter, $attribute)
		{
			$arquivo = file_get_contents('../static/filter.json');
			$json = json_decode($arquivo);
			return  $json->$filter->$attribute;
		}
		/**
		* It reads Magnitude Sky values
		* @param String $filter filter selected
		* @param String $attribute attribute selected
		* @param String $phase moon phase selected
		*/
		function readMsky($filter, $attribute, $phase)
		{
			$arquivo = file_get_contents('../static/filter.json');
			$json = json_decode($arquivo);
			return $json->$filter->$attribute->$phase;
		}
	}
?>