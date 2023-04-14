<?php
	define('PREPEND_PATH', '');
	include_once(__DIR__ . '/lib.php');

	// accept a record as an assoc array, return transformed row ready to insert to table
	$transformFunctions = [
		'historico_vt' => function($data, $options = []) {
			if(isset($data['VcrIdSerP'])) $data['VcrIdSerP'] = pkGivenLookupText($data['VcrIdSerP'], 'historico_vt', 'VcrIdSerP');
			if(isset($data['VcrIdSol'])) $data['VcrIdSol'] = pkGivenLookupText($data['VcrIdSol'], 'historico_vt', 'VcrIdSol');
			if(isset($data['VcrFecSol'])) $data['VcrFecSol'] = guessMySQLDateTime($data['VcrFecSol']);
			if(isset($data['VcrFecRad'])) $data['VcrFecRad'] = guessMySQLDateTime($data['VcrFecRad']);
			if(isset($data['VcrIdRie'])) $data['VcrIdRie'] = pkGivenLookupText($data['VcrIdRie'], 'historico_vt', 'VcrIdRie');
			if(isset($data['VcrCel'])) $data['VcrCel'] = str_replace('-', '', $data['VcrCel']);
			if(isset($data['VcrFecVis'])) $data['VcrFecVis'] = guessMySQLDateTime($data['VcrFecVis']);
			if(isset($data['VcrIdBarVe'])) $data['VcrIdBarVe'] = pkGivenLookupText($data['VcrIdBarVe'], 'historico_vt', 'VcrIdBarVe');
			if(isset($data['VcrIdCom'])) $data['VcrIdCom'] = pkGivenLookupText($data['VcrIdCom'], 'historico_vt', 'VcrIdCom');
			if(isset($data['VcrIdCorr'])) $data['VcrIdCorr'] = pkGivenLookupText($data['VcrIdCorr'], 'historico_vt', 'VcrIdCorr');
			if(isset($data['VcrIdMot'])) $data['VcrIdMot'] = pkGivenLookupText($data['VcrIdMot'], 'historico_vt', 'VcrIdMot');
			if(isset($data['VcrIdFen'])) $data['VcrIdFen'] = pkGivenLookupText($data['VcrIdFen'], 'historico_vt', 'VcrIdFen');
			if(isset($data['VcrIdCar'])) $data['VcrIdCar'] = pkGivenLookupText($data['VcrIdCar'], 'historico_vt', 'VcrIdCar');
			if(isset($data['VcrIdTra1'])) $data['VcrIdTra1'] = pkGivenLookupText($data['VcrIdTra1'], 'historico_vt', 'VcrIdTra1');
			if(isset($data['VcrFecTra1'])) $data['VcrFecTra1'] = guessMySQLDateTime($data['VcrFecTra1']);
			if(isset($data['VcrIdTra2'])) $data['VcrIdTra2'] = pkGivenLookupText($data['VcrIdTra2'], 'historico_vt', 'VcrIdTra2');
			if(isset($data['VcrFecTra2'])) $data['VcrFecTra2'] = guessMySQLDateTime($data['VcrFecTra2']);
			if(isset($data['VcrIdTra3'])) $data['VcrIdTra3'] = pkGivenLookupText($data['VcrIdTra3'], 'historico_vt', 'VcrIdTra3');
			if(isset($data['VcrFecTra3'])) $data['VcrFecTra3'] = guessMySQLDateTime($data['VcrFecTra3']);
			if(isset($data['VcrIdTra4'])) $data['VcrIdTra4'] = pkGivenLookupText($data['VcrIdTra4'], 'historico_vt', 'VcrIdTra4');
			if(isset($data['VcrFecTra4'])) $data['VcrFecTra4'] = guessMySQLDateTime($data['VcrFecTra4']);
			if(isset($data['VcrIdTra5'])) $data['VcrIdTra5'] = pkGivenLookupText($data['VcrIdTra5'], 'historico_vt', 'VcrIdTra5');
			if(isset($data['VcrFecTra5'])) $data['VcrFecTra5'] = guessMySQLDateTime($data['VcrFecTra5']);
			if(isset($data['VcrIdTra6'])) $data['VcrIdTra6'] = pkGivenLookupText($data['VcrIdTra6'], 'historico_vt', 'VcrIdTra6');
			if(isset($data['VcrIdTra7'])) $data['VcrIdTra7'] = pkGivenLookupText($data['VcrIdTra7'], 'historico_vt', 'VcrIdTra7');
			if(isset($data['VcrIdTra8'])) $data['VcrIdTra8'] = pkGivenLookupText($data['VcrIdTra8'], 'historico_vt', 'VcrIdTra8');

			return $data;
		},
		'tipo_documento' => function($data, $options = []) {

			return $data;
		},
		'motivo_visita' => function($data, $options = []) {

			return $data;
		},
		'barrios' => function($data, $options = []) {
			if(isset($data['VcrIdCom'])) $data['VcrIdCom'] = pkGivenLookupText($data['VcrIdCom'], 'barrios', 'VcrIdCom');

			return $data;
		},
		'comunas' => function($data, $options = []) {

			return $data;
		},
		'fenomenos' => function($data, $options = []) {

			return $data;
		},
		'caracteristicas_evento' => function($data, $options = []) {

			return $data;
		},
		'tipo_material' => function($data, $options = []) {

			return $data;
		},
		'lesiones' => function($data, $options = []) {

			return $data;
		},
		'capacidad_reducida' => function($data, $options = []) {

			return $data;
		},
		'servidor_publico' => function($data, $options = []) {
			if(isset($data['VcrIdProc'])) $data['VcrIdProc'] = pkGivenLookupText($data['VcrIdProc'], 'servidor_publico', 'VcrIdProc');

			return $data;
		},
		'fuente_riesgo' => function($data, $options = []) {

			return $data;
		},
		'corregimientos' => function($data, $options = []) {

			return $data;
		},
		'dependencias' => function($data, $options = []) {

			return $data;
		},
		'solicitudes' => function($data, $options = []) {

			return $data;
		},
		'municipios' => function($data, $options = []) {

			return $data;
		},
		'afectacion' => function($data, $options = []) {

			return $data;
		},
		'edificacion' => function($data, $options = []) {

			return $data;
		},
		'tipo_combustible' => function($data, $options = []) {

			return $data;
		},
		'ubicacion' => function($data, $options = []) {

			return $data;
		},
		'tipo_evento' => function($data, $options = []) {

			return $data;
		},
		'actividad_economica' => function($data, $options = []) {

			return $data;
		},
		'usuarios' => function($data, $options = []) {

			return $data;
		},
		'procesos' => function($data, $options = []) {

			return $data;
		},
		'tipo_riesgo' => function($data, $options = []) {

			return $data;
		},
	];

	// accept a record as an assoc array, return a boolean indicating whether to import or skip record
	$filterFunctions = [
		'historico_vt' => function($data, $options = []) { return true; },
		'tipo_documento' => function($data, $options = []) { return true; },
		'motivo_visita' => function($data, $options = []) { return true; },
		'barrios' => function($data, $options = []) { return true; },
		'comunas' => function($data, $options = []) { return true; },
		'fenomenos' => function($data, $options = []) { return true; },
		'caracteristicas_evento' => function($data, $options = []) { return true; },
		'tipo_material' => function($data, $options = []) { return true; },
		'lesiones' => function($data, $options = []) { return true; },
		'capacidad_reducida' => function($data, $options = []) { return true; },
		'servidor_publico' => function($data, $options = []) { return true; },
		'fuente_riesgo' => function($data, $options = []) { return true; },
		'corregimientos' => function($data, $options = []) { return true; },
		'dependencias' => function($data, $options = []) { return true; },
		'solicitudes' => function($data, $options = []) { return true; },
		'municipios' => function($data, $options = []) { return true; },
		'afectacion' => function($data, $options = []) { return true; },
		'edificacion' => function($data, $options = []) { return true; },
		'tipo_combustible' => function($data, $options = []) { return true; },
		'ubicacion' => function($data, $options = []) { return true; },
		'tipo_evento' => function($data, $options = []) { return true; },
		'actividad_economica' => function($data, $options = []) { return true; },
		'usuarios' => function($data, $options = []) { return true; },
		'procesos' => function($data, $options = []) { return true; },
		'tipo_riesgo' => function($data, $options = []) { return true; },
	];

	/*
	Hook file for overwriting/amending $transformFunctions and $filterFunctions:
	hooks/import-csv.php
	If found, it's included below

	The way this works is by either completely overwriting any of the above 2 arrays,
	or, more commonly, overwriting a single function, for example:
		$transformFunctions['tablename'] = function($data, $options = []) {
			// new definition here
			// then you must return transformed data
			return $data;
		};

	Another scenario is transforming a specific field and leaving other fields to the default
	transformation. One possible way of doing this is to store the original transformation function
	in GLOBALS array, calling it inside the custom transformation function, then modifying the
	specific field:
		$GLOBALS['originalTransformationFunction'] = $transformFunctions['tablename'];
		$transformFunctions['tablename'] = function($data, $options = []) {
			$data = call_user_func_array($GLOBALS['originalTransformationFunction'], [$data, $options]);
			$data['fieldname'] = 'transformed value';
			return $data;
		};
	*/

	@include(__DIR__ . '/hooks/import-csv.php');

	$ui = new CSVImportUI($transformFunctions, $filterFunctions);
