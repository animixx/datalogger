<?php

//$nmea1 = '$GPRMC,021959.00,A,3300.57698,S,07132.42912,W,0.309,,281114,,,A*72';
//$nmea2 = '$GPGGA,021948.00,3300.57785,S,07132.42933,W,1,07,1.49,17.7,M,28.9,M,,*6C';



function isValidNmea ($data)
{
	if ($data['type'] == 'GPRMC' && $data['status'] == 'V')
	{
		return False;          // Invalid GPRMC
	}
	if ($data['type'] == 'GPGGA' && $data['latitude'] == '')
	{
		return False;          // Invalid GPGGA
	}
	return True;
}


function parse_gprmc ($parts) 
{
        $data['type']      = 'GPRMC';
	$data['utc_time']  = $parts[1];
	$data['status']    = $parts[2];
	$data['latitude']  = $parts[3];
	$data['ns']        = $parts[4];
	$data['longitude'] = $parts[5];
	$data['ew']        = $parts[6];
	$data['speed']     = $parts[7];
	$data['course']    = $parts[8];
	$data['date']      = $parts[9];
	$data['magnetic_variation'] = $parts[10];
	$data['mode']               = $parts[11];
        $data['checksum']           = $parts[12];
	return $data;
}


function parse_gpgga($parts) 
{
	$data['type']             = 'GPGGA';
	$data['utc_time']         = $parts[1];
	$data['latitude']         = $parts[2];
	$data['ns']               = $parts[3];
	$data['longitude']        = $parts[4];
	$data['ew']               = $parts[5];
	$data['fix']              = $parts[6];
	$data['satellites']       = $parts[7];
	$data['hdop']             = $parts[8];
	$data['altitude']         = $parts[9];
	$data['alt_units']        = $parts[10];
	$data['geoid_separation'] = $parts[11];
	$data['sep_units']        = $parts[12];
	$data['age_of_diff_corr'] = $parts[13];
	//$data['diff_ref_station_id'] = $parts[14];
	$data['checksum']         = $parts[14]; 
	return $data;
}


function nmea_parse ($line) 
{
	$parts = explode(',', $line);
	switch ($parts[0]) {
		case '$GPRMC':
			$result = parse_gprmc($parts);
			break;

		case '$GPGGA':
			$result = parse_gpgga($parts);
			break;

		default:
			$result = 'FAIL';
			break;
	}
	return $result;
}


// var_dump(nmea_parse($nmea2));
/*$data = nmea_parse($nmea2);
foreach ($data as $field=>$value) {
	echo $field." = ".$value."\n";
}*/
?>
