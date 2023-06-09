<?php
// This script and data application were generated by AppGini 22.13
// Download AppGini for free from https://bigprof.com/appgini/download/

	include_once(__DIR__ . '/lib.php');
	@include_once(__DIR__ . '/hooks/historico_vt.php');
	include_once(__DIR__ . '/historico_vt_dml.php');

	// mm: can the current member access this page?
	$perm = getTablePermissions('historico_vt');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied']);
		exit;
	}

	$x = new DataList;
	$x->TableName = 'historico_vt';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`historico_vt`.`VcrId`" => "VcrId",
		"`historico_vt`.`VcrCodHis`" => "VcrCodHis",
		"`historico_vt`.`Vcrano`" => "Vcrano",
		"IF(    CHAR_LENGTH(`servidor_publico1`.`VcrSerPub`), CONCAT_WS('',   `servidor_publico1`.`VcrSerPub`, ' '), '') /* FUNCIONARIO / CONTRATISTA: */" => "VcrIdSerP",
		"IF(    CHAR_LENGTH(`solicitudes1`.`VcrSol`), CONCAT_WS('',   `solicitudes1`.`VcrSol`), '') /* TIPO SOLICITUD: */" => "VcrIdSol",
		"`historico_vt`.`VcrRadSol`" => "VcrRadSol",
		"DATE_FORMAT(`historico_vt`.`VcrFecSol`, '%e/%c/%Y %l:%i%p')" => "VcrFecSol",
		"`historico_vt`.`VcrRadRes`" => "VcrRadRes",
		"DATE_FORMAT(`historico_vt`.`VcrFecRad`, '%e/%c/%Y %l:%i%p')" => "VcrFecRad",
		"`historico_vt`.`VcrDiaResp`" => "VcrDiaResp",
		"IF(    CHAR_LENGTH(`tipo_riesgo1`.`VcrNomRie`), CONCAT_WS('',   `tipo_riesgo1`.`VcrNomRie`), '') /* NIVEL DE RIESGO */" => "VcrIdRie",
		"`historico_vt`.`VcrEntSol`" => "VcrEntSol",
		"`historico_vt`.`VcrNomAti`" => "VcrNomAti",
		"`historico_vt`.`VcrNoIde`" => "VcrNoIde",
		"CONCAT_WS('-', LEFT(`historico_vt`.`VcrCel`,3), MID(`historico_vt`.`VcrCel`,4,3), RIGHT(`historico_vt`.`VcrCel`,4))" => "VcrCel",
		"`historico_vt`.`VcrCodForm`" => "VcrCodForm",
		"if(`historico_vt`.`VcrFecVis`,date_format(`historico_vt`.`VcrFecVis`,'%d/%m/%Y'),'')" => "VcrFecVis",
		"`historico_vt`.`VcrDir`" => "VcrDir",
		"IF(    CHAR_LENGTH(`barrios1`.`VcrBarVer`), CONCAT_WS('',   `barrios1`.`VcrBarVer`), '') /* BARRIO: */" => "VcrIdBarVe",
		"IF(    CHAR_LENGTH(`comunas1`.`VcrCom`), CONCAT_WS('',   `comunas1`.`VcrCom`), '') /* COMUNA/LOCALIDAD: */" => "VcrIdCom",
		"IF(    CHAR_LENGTH(`corregimientos1`.`VcrCorr`), CONCAT_WS('',   `corregimientos1`.`VcrCorr`, ' '), '') /* VEREDA/CORREGIMIENTO: */" => "VcrIdCorr",
		"`historico_vt`.`VcrLon`" => "VcrLon",
		"`historico_vt`.`VcrLat`" => "VcrLat",
		"IF(    CHAR_LENGTH(`motivo_visita1`.`VcrMotVis`), CONCAT_WS('',   `motivo_visita1`.`VcrMotVis`), '') /* MOTIVO VISITA: */" => "VcrIdMot",
		"IF(    CHAR_LENGTH(`fenomenos1`.`VcrFen`), CONCAT_WS('',   `fenomenos1`.`VcrFen`), '') /* TIPO DE FEN&#211;MENO: */" => "VcrIdFen",
		"IF(    CHAR_LENGTH(`caracteristicas_evento1`.`VcrCarFen`), CONCAT_WS('',   `caracteristicas_evento1`.`VcrCarFen`), '') /* CARACTER&#205;STICAS DEL EVENTO: */" => "VcrIdCar",
		"`historico_vt`.`VcrAyuHum`" => "VcrAyuHum",
		"`historico_vt`.`VcrPerHer`" => "VcrPerHer",
		"`historico_vt`.`VcrPerFall`" => "VcrPerFall",
		"`historico_vt`.`VcrTraCas`" => "VcrTraCas",
		"`historico_vt`.`VcrCop`" => "VcrCop",
		"`historico_vt`.`VcrEstTra`" => "VcrEstTra",
		"`historico_vt`.`VcrObsHis`" => "VcrObsHis",
		"`historico_vt`.`VcrUbiInf`" => "VcrUbiInf",
		"`historico_vt`.`VcrResInf`" => "VcrResInf",
		"IF(    CHAR_LENGTH(`dependencias1`.`VcrTra`), CONCAT_WS('',   `dependencias1`.`VcrTra`), '') /* TRASLADO A ORGANISMO O ENTIDAD No.1: */" => "VcrIdTra1",
		"`historico_vt`.`VcrRadTra1`" => "VcrRadTra1",
		"if(`historico_vt`.`VcrFecTra1`,date_format(`historico_vt`.`VcrFecTra1`,'%d/%m/%Y'),'')" => "VcrFecTra1",
		"`historico_vt`.`VcrResTra1`" => "VcrResTra1",
		"IF(    CHAR_LENGTH(`dependencias2`.`VcrTra`), CONCAT_WS('',   `dependencias2`.`VcrTra`), '') /* TRASLADO A ORGANISMO O ENTIDAD No.2: */" => "VcrIdTra2",
		"`historico_vt`.`VcrRadTra2`" => "VcrRadTra2",
		"if(`historico_vt`.`VcrFecTra2`,date_format(`historico_vt`.`VcrFecTra2`,'%d/%m/%Y'),'')" => "VcrFecTra2",
		"`historico_vt`.`VcrResTra2`" => "VcrResTra2",
		"IF(    CHAR_LENGTH(`dependencias3`.`VcrTra`), CONCAT_WS('',   `dependencias3`.`VcrTra`), '') /* TRASLADO A ORGANISMO O ENTIDAD No.3: */" => "VcrIdTra3",
		"`historico_vt`.`VcrRadTra3`" => "VcrRadTra3",
		"if(`historico_vt`.`VcrFecTra3`,date_format(`historico_vt`.`VcrFecTra3`,'%d/%m/%Y'),'')" => "VcrFecTra3",
		"`historico_vt`.`VcrResTra3`" => "VcrResTra3",
		"IF(    CHAR_LENGTH(`dependencias4`.`VcrTra`), CONCAT_WS('',   `dependencias4`.`VcrTra`), '') /* TRASLADO A ORGANISMO O ENTIDAD No.4: */" => "VcrIdTra4",
		"`historico_vt`.`VcrRadTra4`" => "VcrRadTra4",
		"if(`historico_vt`.`VcrFecTra4`,date_format(`historico_vt`.`VcrFecTra4`,'%d/%m/%Y'),'')" => "VcrFecTra4",
		"`historico_vt`.`VcrResTra4`" => "VcrResTra4",
		"IF(    CHAR_LENGTH(`dependencias5`.`VcrTra`), CONCAT_WS('',   `dependencias5`.`VcrTra`), '') /* TRASLADO A ORGANISMO O ENTIDAD No.5: */" => "VcrIdTra5",
		"`historico_vt`.`VcrRadTra5`" => "VcrRadTra5",
		"if(`historico_vt`.`VcrFecTra5`,date_format(`historico_vt`.`VcrFecTra5`,'%d/%m/%Y'),'')" => "VcrFecTra5",
		"`historico_vt`.`VcrResTra5`" => "VcrResTra5",
		"IF(    CHAR_LENGTH(`dependencias6`.`VcrTra`), CONCAT_WS('',   `dependencias6`.`VcrTra`), '') /* TRASLADO A ORGANISMO O ENTIDAD No.6: */" => "VcrIdTra6",
		"`historico_vt`.`VcrRadTra6`" => "VcrRadTra6",
		"IF(    CHAR_LENGTH(`dependencias7`.`VcrTra`), CONCAT_WS('',   `dependencias7`.`VcrTra`), '') /* TRASLADO A ORGANISMO O ENTIDAD No.7: */" => "VcrIdTra7",
		"`historico_vt`.`VcrRadTra7`" => "VcrRadTra7",
		"IF(    CHAR_LENGTH(`dependencias8`.`VcrTra`), CONCAT_WS('',   `dependencias8`.`VcrTra`), '') /* TRASLADO A ORGANISMO O ENTIDAD No.8: */" => "VcrIdTra8",
		"`historico_vt`.`VcrRadTra8`" => "VcrRadTra8",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`historico_vt`.`VcrId`',
		2 => '`historico_vt`.`VcrCodHis`',
		3 => '`historico_vt`.`Vcrano`',
		4 => 4,
		5 => '`solicitudes1`.`VcrSol`',
		6 => 6,
		7 => '`historico_vt`.`VcrFecSol`',
		8 => '`historico_vt`.`VcrRadRes`',
		9 => '`historico_vt`.`VcrFecRad`',
		10 => '`historico_vt`.`VcrDiaResp`',
		11 => '`tipo_riesgo1`.`VcrNomRie`',
		12 => 12,
		13 => 13,
		14 => 14,
		15 => '`historico_vt`.`VcrCel`',
		16 => 16,
		17 => '`historico_vt`.`VcrFecVis`',
		18 => 18,
		19 => '`barrios1`.`VcrBarVer`',
		20 => '`comunas1`.`VcrCom`',
		21 => 21,
		22 => 22,
		23 => 23,
		24 => '`motivo_visita1`.`VcrMotVis`',
		25 => '`fenomenos1`.`VcrFen`',
		26 => '`caracteristicas_evento1`.`VcrCarFen`',
		27 => 27,
		28 => 28,
		29 => 29,
		30 => 30,
		31 => 31,
		32 => 32,
		33 => 33,
		34 => 34,
		35 => 35,
		36 => '`dependencias1`.`VcrTra`',
		37 => 37,
		38 => '`historico_vt`.`VcrFecTra1`',
		39 => 39,
		40 => '`dependencias2`.`VcrTra`',
		41 => 41,
		42 => '`historico_vt`.`VcrFecTra2`',
		43 => 43,
		44 => '`dependencias3`.`VcrTra`',
		45 => 45,
		46 => '`historico_vt`.`VcrFecTra3`',
		47 => 47,
		48 => '`dependencias4`.`VcrTra`',
		49 => 49,
		50 => '`historico_vt`.`VcrFecTra4`',
		51 => 51,
		52 => '`dependencias5`.`VcrTra`',
		53 => 53,
		54 => '`historico_vt`.`VcrFecTra5`',
		55 => 55,
		56 => '`dependencias6`.`VcrTra`',
		57 => 57,
		58 => '`dependencias7`.`VcrTra`',
		59 => 59,
		60 => '`dependencias8`.`VcrTra`',
		61 => 61,
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`historico_vt`.`VcrId`" => "VcrId",
		"`historico_vt`.`VcrCodHis`" => "VcrCodHis",
		"`historico_vt`.`Vcrano`" => "Vcrano",
		"IF(    CHAR_LENGTH(`servidor_publico1`.`VcrSerPub`), CONCAT_WS('',   `servidor_publico1`.`VcrSerPub`, ' '), '') /* FUNCIONARIO / CONTRATISTA: */" => "VcrIdSerP",
		"IF(    CHAR_LENGTH(`solicitudes1`.`VcrSol`), CONCAT_WS('',   `solicitudes1`.`VcrSol`), '') /* TIPO SOLICITUD: */" => "VcrIdSol",
		"`historico_vt`.`VcrRadSol`" => "VcrRadSol",
		"DATE_FORMAT(`historico_vt`.`VcrFecSol`, '%e/%c/%Y %l:%i%p')" => "VcrFecSol",
		"`historico_vt`.`VcrRadRes`" => "VcrRadRes",
		"DATE_FORMAT(`historico_vt`.`VcrFecRad`, '%e/%c/%Y %l:%i%p')" => "VcrFecRad",
		"`historico_vt`.`VcrDiaResp`" => "VcrDiaResp",
		"IF(    CHAR_LENGTH(`tipo_riesgo1`.`VcrNomRie`), CONCAT_WS('',   `tipo_riesgo1`.`VcrNomRie`), '') /* NIVEL DE RIESGO */" => "VcrIdRie",
		"`historico_vt`.`VcrEntSol`" => "VcrEntSol",
		"`historico_vt`.`VcrNomAti`" => "VcrNomAti",
		"`historico_vt`.`VcrNoIde`" => "VcrNoIde",
		"CONCAT_WS('-', LEFT(`historico_vt`.`VcrCel`,3), MID(`historico_vt`.`VcrCel`,4,3), RIGHT(`historico_vt`.`VcrCel`,4))" => "VcrCel",
		"`historico_vt`.`VcrCodForm`" => "VcrCodForm",
		"if(`historico_vt`.`VcrFecVis`,date_format(`historico_vt`.`VcrFecVis`,'%d/%m/%Y'),'')" => "VcrFecVis",
		"`historico_vt`.`VcrDir`" => "VcrDir",
		"IF(    CHAR_LENGTH(`barrios1`.`VcrBarVer`), CONCAT_WS('',   `barrios1`.`VcrBarVer`), '') /* BARRIO: */" => "VcrIdBarVe",
		"IF(    CHAR_LENGTH(`comunas1`.`VcrCom`), CONCAT_WS('',   `comunas1`.`VcrCom`), '') /* COMUNA/LOCALIDAD: */" => "VcrIdCom",
		"IF(    CHAR_LENGTH(`corregimientos1`.`VcrCorr`), CONCAT_WS('',   `corregimientos1`.`VcrCorr`, ' '), '') /* VEREDA/CORREGIMIENTO: */" => "VcrIdCorr",
		"`historico_vt`.`VcrLon`" => "VcrLon",
		"`historico_vt`.`VcrLat`" => "VcrLat",
		"IF(    CHAR_LENGTH(`motivo_visita1`.`VcrMotVis`), CONCAT_WS('',   `motivo_visita1`.`VcrMotVis`), '') /* MOTIVO VISITA: */" => "VcrIdMot",
		"IF(    CHAR_LENGTH(`fenomenos1`.`VcrFen`), CONCAT_WS('',   `fenomenos1`.`VcrFen`), '') /* TIPO DE FEN&#211;MENO: */" => "VcrIdFen",
		"IF(    CHAR_LENGTH(`caracteristicas_evento1`.`VcrCarFen`), CONCAT_WS('',   `caracteristicas_evento1`.`VcrCarFen`), '') /* CARACTER&#205;STICAS DEL EVENTO: */" => "VcrIdCar",
		"`historico_vt`.`VcrAyuHum`" => "VcrAyuHum",
		"`historico_vt`.`VcrPerHer`" => "VcrPerHer",
		"`historico_vt`.`VcrPerFall`" => "VcrPerFall",
		"`historico_vt`.`VcrTraCas`" => "VcrTraCas",
		"`historico_vt`.`VcrCop`" => "VcrCop",
		"`historico_vt`.`VcrEstTra`" => "VcrEstTra",
		"`historico_vt`.`VcrObsHis`" => "VcrObsHis",
		"`historico_vt`.`VcrUbiInf`" => "VcrUbiInf",
		"`historico_vt`.`VcrResInf`" => "VcrResInf",
		"IF(    CHAR_LENGTH(`dependencias1`.`VcrTra`), CONCAT_WS('',   `dependencias1`.`VcrTra`), '') /* TRASLADO A ORGANISMO O ENTIDAD No.1: */" => "VcrIdTra1",
		"`historico_vt`.`VcrRadTra1`" => "VcrRadTra1",
		"if(`historico_vt`.`VcrFecTra1`,date_format(`historico_vt`.`VcrFecTra1`,'%d/%m/%Y'),'')" => "VcrFecTra1",
		"`historico_vt`.`VcrResTra1`" => "VcrResTra1",
		"IF(    CHAR_LENGTH(`dependencias2`.`VcrTra`), CONCAT_WS('',   `dependencias2`.`VcrTra`), '') /* TRASLADO A ORGANISMO O ENTIDAD No.2: */" => "VcrIdTra2",
		"`historico_vt`.`VcrRadTra2`" => "VcrRadTra2",
		"if(`historico_vt`.`VcrFecTra2`,date_format(`historico_vt`.`VcrFecTra2`,'%d/%m/%Y'),'')" => "VcrFecTra2",
		"`historico_vt`.`VcrResTra2`" => "VcrResTra2",
		"IF(    CHAR_LENGTH(`dependencias3`.`VcrTra`), CONCAT_WS('',   `dependencias3`.`VcrTra`), '') /* TRASLADO A ORGANISMO O ENTIDAD No.3: */" => "VcrIdTra3",
		"`historico_vt`.`VcrRadTra3`" => "VcrRadTra3",
		"if(`historico_vt`.`VcrFecTra3`,date_format(`historico_vt`.`VcrFecTra3`,'%d/%m/%Y'),'')" => "VcrFecTra3",
		"`historico_vt`.`VcrResTra3`" => "VcrResTra3",
		"IF(    CHAR_LENGTH(`dependencias4`.`VcrTra`), CONCAT_WS('',   `dependencias4`.`VcrTra`), '') /* TRASLADO A ORGANISMO O ENTIDAD No.4: */" => "VcrIdTra4",
		"`historico_vt`.`VcrRadTra4`" => "VcrRadTra4",
		"if(`historico_vt`.`VcrFecTra4`,date_format(`historico_vt`.`VcrFecTra4`,'%d/%m/%Y'),'')" => "VcrFecTra4",
		"`historico_vt`.`VcrResTra4`" => "VcrResTra4",
		"IF(    CHAR_LENGTH(`dependencias5`.`VcrTra`), CONCAT_WS('',   `dependencias5`.`VcrTra`), '') /* TRASLADO A ORGANISMO O ENTIDAD No.5: */" => "VcrIdTra5",
		"`historico_vt`.`VcrRadTra5`" => "VcrRadTra5",
		"if(`historico_vt`.`VcrFecTra5`,date_format(`historico_vt`.`VcrFecTra5`,'%d/%m/%Y'),'')" => "VcrFecTra5",
		"`historico_vt`.`VcrResTra5`" => "VcrResTra5",
		"IF(    CHAR_LENGTH(`dependencias6`.`VcrTra`), CONCAT_WS('',   `dependencias6`.`VcrTra`), '') /* TRASLADO A ORGANISMO O ENTIDAD No.6: */" => "VcrIdTra6",
		"`historico_vt`.`VcrRadTra6`" => "VcrRadTra6",
		"IF(    CHAR_LENGTH(`dependencias7`.`VcrTra`), CONCAT_WS('',   `dependencias7`.`VcrTra`), '') /* TRASLADO A ORGANISMO O ENTIDAD No.7: */" => "VcrIdTra7",
		"`historico_vt`.`VcrRadTra7`" => "VcrRadTra7",
		"IF(    CHAR_LENGTH(`dependencias8`.`VcrTra`), CONCAT_WS('',   `dependencias8`.`VcrTra`), '') /* TRASLADO A ORGANISMO O ENTIDAD No.8: */" => "VcrIdTra8",
		"`historico_vt`.`VcrRadTra8`" => "VcrRadTra8",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`historico_vt`.`VcrId`" => "ID HISTORICO ",
		"`historico_vt`.`VcrCodHis`" => "CONSECUTIVO:",
		"`historico_vt`.`Vcrano`" => "A&#209;O",
		"IF(    CHAR_LENGTH(`servidor_publico1`.`VcrSerPub`), CONCAT_WS('',   `servidor_publico1`.`VcrSerPub`, ' '), '') /* FUNCIONARIO / CONTRATISTA: */" => "FUNCIONARIO / CONTRATISTA:",
		"IF(    CHAR_LENGTH(`solicitudes1`.`VcrSol`), CONCAT_WS('',   `solicitudes1`.`VcrSol`), '') /* TIPO SOLICITUD: */" => "TIPO SOLICITUD:",
		"`historico_vt`.`VcrRadSol`" => "No. RADICADO SOLICITUD:",
		"`historico_vt`.`VcrFecSol`" => "FECHA SOLICITUD:",
		"`historico_vt`.`VcrRadRes`" => "NUMERO RADICADO RESPUESTA",
		"`historico_vt`.`VcrFecRad`" => "FECHA RADICADO",
		"`historico_vt`.`VcrDiaResp`" => "DIAS HABILES RESPUESTA",
		"IF(    CHAR_LENGTH(`tipo_riesgo1`.`VcrNomRie`), CONCAT_WS('',   `tipo_riesgo1`.`VcrNomRie`), '') /* NIVEL DE RIESGO */" => "NIVEL DE RIESGO",
		"`historico_vt`.`VcrEntSol`" => "CIUDADANO O ENTIDAD SOLICITANTE",
		"`historico_vt`.`VcrNomAti`" => "NOMBRE PERSONA ATIENDE VISITA:",
		"`historico_vt`.`VcrNoIde`" => "N&#218;MERO IDENTIFICACI&#211;N:",
		"`historico_vt`.`VcrCel`" => "CELULAR PERSONA QUE ATIENDE VISITA:",
		"`historico_vt`.`VcrCodForm`" => "CODIGO DEL FORMULARIO",
		"`historico_vt`.`VcrFecVis`" => "FECHA VISITA DE VERIFICACION",
		"`historico_vt`.`VcrDir`" => "DIRECCION:",
		"IF(    CHAR_LENGTH(`barrios1`.`VcrBarVer`), CONCAT_WS('',   `barrios1`.`VcrBarVer`), '') /* BARRIO: */" => "BARRIO:",
		"IF(    CHAR_LENGTH(`comunas1`.`VcrCom`), CONCAT_WS('',   `comunas1`.`VcrCom`), '') /* COMUNA/LOCALIDAD: */" => "COMUNA/LOCALIDAD:",
		"IF(    CHAR_LENGTH(`corregimientos1`.`VcrCorr`), CONCAT_WS('',   `corregimientos1`.`VcrCorr`, ' '), '') /* VEREDA/CORREGIMIENTO: */" => "VEREDA/CORREGIMIENTO:",
		"`historico_vt`.`VcrLon`" => "LONGITUD:",
		"`historico_vt`.`VcrLat`" => "LATITUD:",
		"IF(    CHAR_LENGTH(`motivo_visita1`.`VcrMotVis`), CONCAT_WS('',   `motivo_visita1`.`VcrMotVis`), '') /* MOTIVO VISITA: */" => "MOTIVO VISITA:",
		"IF(    CHAR_LENGTH(`fenomenos1`.`VcrFen`), CONCAT_WS('',   `fenomenos1`.`VcrFen`), '') /* TIPO DE FEN&#211;MENO: */" => "TIPO DE FEN&#211;MENO:",
		"IF(    CHAR_LENGTH(`caracteristicas_evento1`.`VcrCarFen`), CONCAT_WS('',   `caracteristicas_evento1`.`VcrCarFen`), '') /* CARACTER&#205;STICAS DEL EVENTO: */" => "CARACTER&#205;STICAS DEL EVENTO:",
		"`historico_vt`.`VcrAyuHum`" => "AYUDA HUMANITARIA:",
		"`historico_vt`.`VcrPerHer`" => "PERSONAS HERIDAS",
		"`historico_vt`.`VcrPerFall`" => "PERSONAS FALLECIDAS",
		"`historico_vt`.`VcrTraCas`" => "TRASLADO CASO:",
		"`historico_vt`.`VcrCop`" => "COPIA:",
		"`historico_vt`.`VcrEstTra`" => "ESTADO DEL TRAMITE:",
		"`historico_vt`.`VcrObsHis`" => "OBSERVACIONES:",
		"`historico_vt`.`VcrUbiInf`" => "UBICACION DE LA DOCUMENTACI&#211;N:",
		"`historico_vt`.`VcrResInf`" => "RESPUESTA DEL INFORME:",
		"IF(    CHAR_LENGTH(`dependencias1`.`VcrTra`), CONCAT_WS('',   `dependencias1`.`VcrTra`), '') /* TRASLADO A ORGANISMO O ENTIDAD No.1: */" => "TRASLADO A ORGANISMO O ENTIDAD No.1:",
		"`historico_vt`.`VcrRadTra1`" => "NO. RADICADO DEL TRASLADO No. 1:",
		"`historico_vt`.`VcrFecTra1`" => "FECHA DEL TRASLADO No. 1:",
		"`historico_vt`.`VcrResTra1`" => "RESPUESTA DEL TRASLADO 1:",
		"IF(    CHAR_LENGTH(`dependencias2`.`VcrTra`), CONCAT_WS('',   `dependencias2`.`VcrTra`), '') /* TRASLADO A ORGANISMO O ENTIDAD No.2: */" => "TRASLADO A ORGANISMO O ENTIDAD No.2:",
		"`historico_vt`.`VcrRadTra2`" => "NO. RADICADO DEL TRASLADO No. 2:",
		"`historico_vt`.`VcrFecTra2`" => "FECHA DEL TRASLADO No.2:",
		"`historico_vt`.`VcrResTra2`" => "RESPUESTA DEL TRASLADO 2:",
		"IF(    CHAR_LENGTH(`dependencias3`.`VcrTra`), CONCAT_WS('',   `dependencias3`.`VcrTra`), '') /* TRASLADO A ORGANISMO O ENTIDAD No.3: */" => "TRASLADO A ORGANISMO O ENTIDAD No.3:",
		"`historico_vt`.`VcrRadTra3`" => "NO. RADICADO DEL TRASLADO No. 3:",
		"`historico_vt`.`VcrFecTra3`" => "FECHA DEL TRASLADO No.3:",
		"`historico_vt`.`VcrResTra3`" => "RESPUESTA DEL TRASLADO 3:",
		"IF(    CHAR_LENGTH(`dependencias4`.`VcrTra`), CONCAT_WS('',   `dependencias4`.`VcrTra`), '') /* TRASLADO A ORGANISMO O ENTIDAD No.4: */" => "TRASLADO A ORGANISMO O ENTIDAD No.4:",
		"`historico_vt`.`VcrRadTra4`" => "NO. RADICADO DEL TRASLADO No. 4:",
		"`historico_vt`.`VcrFecTra4`" => "FECHA DEL TRASLADO No.4:",
		"`historico_vt`.`VcrResTra4`" => "RESPUESTA DEL TRASLADO 4:",
		"IF(    CHAR_LENGTH(`dependencias5`.`VcrTra`), CONCAT_WS('',   `dependencias5`.`VcrTra`), '') /* TRASLADO A ORGANISMO O ENTIDAD No.5: */" => "TRASLADO A ORGANISMO O ENTIDAD No.5:",
		"`historico_vt`.`VcrRadTra5`" => "NO. RADICADO DEL TRASLADO No.5:",
		"`historico_vt`.`VcrFecTra5`" => "FECHA DEL TRASLADO No.5:",
		"`historico_vt`.`VcrResTra5`" => "RESPUESTA DEL TRASLADO 5:",
		"IF(    CHAR_LENGTH(`dependencias6`.`VcrTra`), CONCAT_WS('',   `dependencias6`.`VcrTra`), '') /* TRASLADO A ORGANISMO O ENTIDAD No.6: */" => "TRASLADO A ORGANISMO O ENTIDAD No.6:",
		"`historico_vt`.`VcrRadTra6`" => "NO. RADICADO DEL TRASLADO No.6:",
		"IF(    CHAR_LENGTH(`dependencias7`.`VcrTra`), CONCAT_WS('',   `dependencias7`.`VcrTra`), '') /* TRASLADO A ORGANISMO O ENTIDAD No.7: */" => "TRASLADO A ORGANISMO O ENTIDAD No.7:",
		"`historico_vt`.`VcrRadTra7`" => "NO. RADICADO DEL TRASLADO No.7:",
		"IF(    CHAR_LENGTH(`dependencias8`.`VcrTra`), CONCAT_WS('',   `dependencias8`.`VcrTra`), '') /* TRASLADO A ORGANISMO O ENTIDAD No.8: */" => "TRASLADO A ORGANISMO O ENTIDAD No.8:",
		"`historico_vt`.`VcrRadTra8`" => "NO. RADICADO DEL TRASLADO No.8:",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`historico_vt`.`VcrId`" => "VcrId",
		"`historico_vt`.`VcrCodHis`" => "VcrCodHis",
		"`historico_vt`.`Vcrano`" => "Vcrano",
		"IF(    CHAR_LENGTH(`servidor_publico1`.`VcrSerPub`), CONCAT_WS('',   `servidor_publico1`.`VcrSerPub`, ' '), '') /* FUNCIONARIO / CONTRATISTA: */" => "VcrIdSerP",
		"IF(    CHAR_LENGTH(`solicitudes1`.`VcrSol`), CONCAT_WS('',   `solicitudes1`.`VcrSol`), '') /* TIPO SOLICITUD: */" => "VcrIdSol",
		"`historico_vt`.`VcrRadSol`" => "VcrRadSol",
		"DATE_FORMAT(`historico_vt`.`VcrFecSol`, '%e/%c/%Y %l:%i%p')" => "VcrFecSol",
		"`historico_vt`.`VcrRadRes`" => "VcrRadRes",
		"DATE_FORMAT(`historico_vt`.`VcrFecRad`, '%e/%c/%Y %l:%i%p')" => "VcrFecRad",
		"`historico_vt`.`VcrDiaResp`" => "VcrDiaResp",
		"IF(    CHAR_LENGTH(`tipo_riesgo1`.`VcrNomRie`), CONCAT_WS('',   `tipo_riesgo1`.`VcrNomRie`), '') /* NIVEL DE RIESGO */" => "VcrIdRie",
		"`historico_vt`.`VcrEntSol`" => "VcrEntSol",
		"`historico_vt`.`VcrNomAti`" => "VcrNomAti",
		"`historico_vt`.`VcrNoIde`" => "VcrNoIde",
		"CONCAT_WS('-', LEFT(`historico_vt`.`VcrCel`,3), MID(`historico_vt`.`VcrCel`,4,3), RIGHT(`historico_vt`.`VcrCel`,4))" => "VcrCel",
		"`historico_vt`.`VcrCodForm`" => "VcrCodForm",
		"if(`historico_vt`.`VcrFecVis`,date_format(`historico_vt`.`VcrFecVis`,'%d/%m/%Y'),'')" => "VcrFecVis",
		"`historico_vt`.`VcrDir`" => "VcrDir",
		"IF(    CHAR_LENGTH(`barrios1`.`VcrBarVer`), CONCAT_WS('',   `barrios1`.`VcrBarVer`), '') /* BARRIO: */" => "VcrIdBarVe",
		"IF(    CHAR_LENGTH(`comunas1`.`VcrCom`), CONCAT_WS('',   `comunas1`.`VcrCom`), '') /* COMUNA/LOCALIDAD: */" => "VcrIdCom",
		"IF(    CHAR_LENGTH(`corregimientos1`.`VcrCorr`), CONCAT_WS('',   `corregimientos1`.`VcrCorr`, ' '), '') /* VEREDA/CORREGIMIENTO: */" => "VcrIdCorr",
		"`historico_vt`.`VcrLon`" => "VcrLon",
		"`historico_vt`.`VcrLat`" => "VcrLat",
		"IF(    CHAR_LENGTH(`motivo_visita1`.`VcrMotVis`), CONCAT_WS('',   `motivo_visita1`.`VcrMotVis`), '') /* MOTIVO VISITA: */" => "VcrIdMot",
		"IF(    CHAR_LENGTH(`fenomenos1`.`VcrFen`), CONCAT_WS('',   `fenomenos1`.`VcrFen`), '') /* TIPO DE FEN&#211;MENO: */" => "VcrIdFen",
		"IF(    CHAR_LENGTH(`caracteristicas_evento1`.`VcrCarFen`), CONCAT_WS('',   `caracteristicas_evento1`.`VcrCarFen`), '') /* CARACTER&#205;STICAS DEL EVENTO: */" => "VcrIdCar",
		"`historico_vt`.`VcrAyuHum`" => "VcrAyuHum",
		"`historico_vt`.`VcrPerHer`" => "VcrPerHer",
		"`historico_vt`.`VcrPerFall`" => "VcrPerFall",
		"`historico_vt`.`VcrTraCas`" => "VcrTraCas",
		"`historico_vt`.`VcrCop`" => "VcrCop",
		"`historico_vt`.`VcrEstTra`" => "VcrEstTra",
		"`historico_vt`.`VcrObsHis`" => "VcrObsHis",
		"`historico_vt`.`VcrUbiInf`" => "VcrUbiInf",
		"`historico_vt`.`VcrResInf`" => "VcrResInf",
		"IF(    CHAR_LENGTH(`dependencias1`.`VcrTra`), CONCAT_WS('',   `dependencias1`.`VcrTra`), '') /* TRASLADO A ORGANISMO O ENTIDAD No.1: */" => "VcrIdTra1",
		"`historico_vt`.`VcrRadTra1`" => "VcrRadTra1",
		"if(`historico_vt`.`VcrFecTra1`,date_format(`historico_vt`.`VcrFecTra1`,'%d/%m/%Y'),'')" => "VcrFecTra1",
		"`historico_vt`.`VcrResTra1`" => "VcrResTra1",
		"IF(    CHAR_LENGTH(`dependencias2`.`VcrTra`), CONCAT_WS('',   `dependencias2`.`VcrTra`), '') /* TRASLADO A ORGANISMO O ENTIDAD No.2: */" => "VcrIdTra2",
		"`historico_vt`.`VcrRadTra2`" => "VcrRadTra2",
		"if(`historico_vt`.`VcrFecTra2`,date_format(`historico_vt`.`VcrFecTra2`,'%d/%m/%Y'),'')" => "VcrFecTra2",
		"`historico_vt`.`VcrResTra2`" => "VcrResTra2",
		"IF(    CHAR_LENGTH(`dependencias3`.`VcrTra`), CONCAT_WS('',   `dependencias3`.`VcrTra`), '') /* TRASLADO A ORGANISMO O ENTIDAD No.3: */" => "VcrIdTra3",
		"`historico_vt`.`VcrRadTra3`" => "VcrRadTra3",
		"if(`historico_vt`.`VcrFecTra3`,date_format(`historico_vt`.`VcrFecTra3`,'%d/%m/%Y'),'')" => "VcrFecTra3",
		"`historico_vt`.`VcrResTra3`" => "VcrResTra3",
		"IF(    CHAR_LENGTH(`dependencias4`.`VcrTra`), CONCAT_WS('',   `dependencias4`.`VcrTra`), '') /* TRASLADO A ORGANISMO O ENTIDAD No.4: */" => "VcrIdTra4",
		"`historico_vt`.`VcrRadTra4`" => "VcrRadTra4",
		"if(`historico_vt`.`VcrFecTra4`,date_format(`historico_vt`.`VcrFecTra4`,'%d/%m/%Y'),'')" => "VcrFecTra4",
		"`historico_vt`.`VcrResTra4`" => "VcrResTra4",
		"IF(    CHAR_LENGTH(`dependencias5`.`VcrTra`), CONCAT_WS('',   `dependencias5`.`VcrTra`), '') /* TRASLADO A ORGANISMO O ENTIDAD No.5: */" => "VcrIdTra5",
		"`historico_vt`.`VcrRadTra5`" => "VcrRadTra5",
		"if(`historico_vt`.`VcrFecTra5`,date_format(`historico_vt`.`VcrFecTra5`,'%d/%m/%Y'),'')" => "VcrFecTra5",
		"`historico_vt`.`VcrResTra5`" => "VcrResTra5",
		"IF(    CHAR_LENGTH(`dependencias6`.`VcrTra`), CONCAT_WS('',   `dependencias6`.`VcrTra`), '') /* TRASLADO A ORGANISMO O ENTIDAD No.6: */" => "VcrIdTra6",
		"`historico_vt`.`VcrRadTra6`" => "VcrRadTra6",
		"IF(    CHAR_LENGTH(`dependencias7`.`VcrTra`), CONCAT_WS('',   `dependencias7`.`VcrTra`), '') /* TRASLADO A ORGANISMO O ENTIDAD No.7: */" => "VcrIdTra7",
		"`historico_vt`.`VcrRadTra7`" => "VcrRadTra7",
		"IF(    CHAR_LENGTH(`dependencias8`.`VcrTra`), CONCAT_WS('',   `dependencias8`.`VcrTra`), '') /* TRASLADO A ORGANISMO O ENTIDAD No.8: */" => "VcrIdTra8",
		"`historico_vt`.`VcrRadTra8`" => "VcrRadTra8",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = ['VcrIdSerP' => 'FUNCIONARIO / CONTRATISTA:', 'VcrIdSol' => 'TIPO SOLICITUD:', 'VcrIdRie' => 'NIVEL DE RIESGO', 'VcrIdBarVe' => 'BARRIO:', 'VcrIdCom' => 'COMUNA/LOCALIDAD:', 'VcrIdCorr' => 'VEREDA/CORREGIMIENTO:', 'VcrIdMot' => 'MOTIVO VISITA:', 'VcrIdFen' => 'TIPO DE FEN&#211;MENO:', 'VcrIdCar' => 'CARACTER&#205;STICAS DEL EVENTO:', 'VcrIdTra1' => 'TRASLADO A ORGANISMO O ENTIDAD No.1:', 'VcrIdTra2' => 'TRASLADO A ORGANISMO O ENTIDAD No.2:', 'VcrIdTra3' => 'TRASLADO A ORGANISMO O ENTIDAD No.3:', 'VcrIdTra4' => 'TRASLADO A ORGANISMO O ENTIDAD No.4:', 'VcrIdTra5' => 'TRASLADO A ORGANISMO O ENTIDAD No.5:', 'VcrIdTra6' => 'TRASLADO A ORGANISMO O ENTIDAD No.6:', 'VcrIdTra7' => 'TRASLADO A ORGANISMO O ENTIDAD No.7:', 'VcrIdTra8' => 'TRASLADO A ORGANISMO O ENTIDAD No.8:', ];

	$x->QueryFrom = "`historico_vt` LEFT JOIN `servidor_publico` as servidor_publico1 ON `servidor_publico1`.`VcrIdSerP`=`historico_vt`.`VcrIdSerP` LEFT JOIN `solicitudes` as solicitudes1 ON `solicitudes1`.`VcrIdSol`=`historico_vt`.`VcrIdSol` LEFT JOIN `tipo_riesgo` as tipo_riesgo1 ON `tipo_riesgo1`.`VcrIdRie`=`historico_vt`.`VcrIdRie` LEFT JOIN `barrios` as barrios1 ON `barrios1`.`VcrIdBarVe`=`historico_vt`.`VcrIdBarVe` LEFT JOIN `comunas` as comunas1 ON `comunas1`.`VcrIdCom`=`historico_vt`.`VcrIdCom` LEFT JOIN `corregimientos` as corregimientos1 ON `corregimientos1`.`VcrIdCorr`=`historico_vt`.`VcrIdCorr` LEFT JOIN `motivo_visita` as motivo_visita1 ON `motivo_visita1`.`VcrIdMot`=`historico_vt`.`VcrIdMot` LEFT JOIN `fenomenos` as fenomenos1 ON `fenomenos1`.`VcrIdFen`=`historico_vt`.`VcrIdFen` LEFT JOIN `caracteristicas_evento` as caracteristicas_evento1 ON `caracteristicas_evento1`.`VcrIdCar`=`historico_vt`.`VcrIdCar` LEFT JOIN `dependencias` as dependencias1 ON `dependencias1`.`VcrId`=`historico_vt`.`VcrIdTra1` LEFT JOIN `dependencias` as dependencias2 ON `dependencias2`.`VcrId`=`historico_vt`.`VcrIdTra2` LEFT JOIN `dependencias` as dependencias3 ON `dependencias3`.`VcrId`=`historico_vt`.`VcrIdTra3` LEFT JOIN `dependencias` as dependencias4 ON `dependencias4`.`VcrId`=`historico_vt`.`VcrIdTra4` LEFT JOIN `dependencias` as dependencias5 ON `dependencias5`.`VcrId`=`historico_vt`.`VcrIdTra5` LEFT JOIN `dependencias` as dependencias6 ON `dependencias6`.`VcrId`=`historico_vt`.`VcrIdTra6` LEFT JOIN `dependencias` as dependencias7 ON `dependencias7`.`VcrId`=`historico_vt`.`VcrIdTra7` LEFT JOIN `dependencias` as dependencias8 ON `dependencias8`.`VcrId`=`historico_vt`.`VcrIdTra8` ";
	$x->QueryWhere = '';
	$x->QueryOrder = '';

	$x->AllowSelection = 0;
	$x->HideTableView = ($perm['view'] == 0 ? 1 : 0);
	$x->AllowDelete = $perm['delete'];
	$x->AllowMassDelete = (getLoggedAdmin() !== false);
	$x->AllowInsert = $perm['insert'];
	$x->AllowUpdate = $perm['edit'];
	$x->SeparateDV = 0;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = (getLoggedAdmin() !== false);
	$x->AllowSorting = (getLoggedAdmin() !== false);
	$x->AllowNavigation = 1;
	$x->AllowPrinting = (getLoggedAdmin() !== false);
	$x->AllowPrintingDV = (getLoggedAdmin() !== false);
	$x->AllowCSV = (getLoggedAdmin() !== false);
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation['quick search'];
	$x->ScriptFileName = 'historico_vt_view.php';
	$x->TableTitle = 'HISTORICO VISITAS TECNICAS';
	$x->TableIcon = 'table.gif';
	$x->PrimaryKey = '`historico_vt`.`VcrId`';

	$x->ColWidth = [150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, ];
	$x->ColCaption = ['ID HISTORICO ', 'CONSECUTIVO:', 'A&#209;O', 'FUNCIONARIO / CONTRATISTA:', 'TIPO SOLICITUD:', 'No. RADICADO SOLICITUD:', 'FECHA SOLICITUD:', 'NUMERO RADICADO RESPUESTA', 'FECHA RADICADO', 'DIAS HABILES RESPUESTA', 'NIVEL DE RIESGO', 'CIUDADANO O ENTIDAD SOLICITANTE', 'NOMBRE PERSONA ATIENDE VISITA:', 'N&#218;MERO IDENTIFICACI&#211;N:', 'CELULAR PERSONA QUE ATIENDE VISITA:', 'CODIGO DEL FORMULARIO', 'FECHA VISITA DE VERIFICACION', 'DIRECCION:', 'BARRIO:', 'COMUNA/LOCALIDAD:', 'VEREDA/CORREGIMIENTO:', 'LONGITUD:', 'LATITUD:', 'MOTIVO VISITA:', 'TIPO DE FEN&#211;MENO:', 'CARACTER&#205;STICAS DEL EVENTO:', 'AYUDA HUMANITARIA:', 'PERSONAS HERIDAS', 'PERSONAS FALLECIDAS', 'TRASLADO CASO:', 'COPIA:', 'ESTADO DEL TRAMITE:', 'OBSERVACIONES:', 'UBICACION DE LA DOCUMENTACI&#211;N:', 'RESPUESTA DEL INFORME:', 'TRASLADO A ORGANISMO O ENTIDAD No.1:', 'NO. RADICADO DEL TRASLADO No. 1:', 'FECHA DEL TRASLADO No. 1:', 'RESPUESTA DEL TRASLADO 1:', 'TRASLADO A ORGANISMO O ENTIDAD No.2:', 'NO. RADICADO DEL TRASLADO No. 2:', 'FECHA DEL TRASLADO No.2:', 'RESPUESTA DEL TRASLADO 2:', 'TRASLADO A ORGANISMO O ENTIDAD No.3:', 'NO. RADICADO DEL TRASLADO No. 3:', 'FECHA DEL TRASLADO No.3:', 'RESPUESTA DEL TRASLADO 3:', 'TRASLADO A ORGANISMO O ENTIDAD No.4:', 'NO. RADICADO DEL TRASLADO No. 4:', 'FECHA DEL TRASLADO No.4:', 'RESPUESTA DEL TRASLADO 4:', 'TRASLADO A ORGANISMO O ENTIDAD No.5:', 'NO. RADICADO DEL TRASLADO No.5:', 'FECHA DEL TRASLADO No.5:', 'RESPUESTA DEL TRASLADO 5:', 'TRASLADO A ORGANISMO O ENTIDAD No.6:', 'NO. RADICADO DEL TRASLADO No.6:', 'TRASLADO A ORGANISMO O ENTIDAD No.7:', 'NO. RADICADO DEL TRASLADO No.7:', 'TRASLADO A ORGANISMO O ENTIDAD No.8:', 'NO. RADICADO DEL TRASLADO No.8:', ];
	$x->ColFieldName = ['VcrId', 'VcrCodHis', 'Vcrano', 'VcrIdSerP', 'VcrIdSol', 'VcrRadSol', 'VcrFecSol', 'VcrRadRes', 'VcrFecRad', 'VcrDiaResp', 'VcrIdRie', 'VcrEntSol', 'VcrNomAti', 'VcrNoIde', 'VcrCel', 'VcrCodForm', 'VcrFecVis', 'VcrDir', 'VcrIdBarVe', 'VcrIdCom', 'VcrIdCorr', 'VcrLon', 'VcrLat', 'VcrIdMot', 'VcrIdFen', 'VcrIdCar', 'VcrAyuHum', 'VcrPerHer', 'VcrPerFall', 'VcrTraCas', 'VcrCop', 'VcrEstTra', 'VcrObsHis', 'VcrUbiInf', 'VcrResInf', 'VcrIdTra1', 'VcrRadTra1', 'VcrFecTra1', 'VcrResTra1', 'VcrIdTra2', 'VcrRadTra2', 'VcrFecTra2', 'VcrResTra2', 'VcrIdTra3', 'VcrRadTra3', 'VcrFecTra3', 'VcrResTra3', 'VcrIdTra4', 'VcrRadTra4', 'VcrFecTra4', 'VcrResTra4', 'VcrIdTra5', 'VcrRadTra5', 'VcrFecTra5', 'VcrResTra5', 'VcrIdTra6', 'VcrRadTra6', 'VcrIdTra7', 'VcrRadTra7', 'VcrIdTra8', 'VcrRadTra8', ];
	$x->ColNumber  = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/historico_vt_templateTV.html';
	$x->SelectedTemplate = 'templates/historico_vt_templateTVS.html';
	$x->TemplateDV = 'templates/historico_vt_templateDV.html';
	$x->TemplateDVP = 'templates/historico_vt_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HasCalculatedFields = false;
	$x->AllowConsoleLog = false;
	$x->AllowDVNavigation = true;

	// hook: historico_vt_init
	$render = true;
	if(function_exists('historico_vt_init')) {
		$args = [];
		$render = historico_vt_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: historico_vt_header
	$headerCode = '';
	if(function_exists('historico_vt_header')) {
		$args = [];
		$headerCode = historico_vt_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once(__DIR__ . '/header.php'); 
	} else {
		ob_start();
		include_once(__DIR__ . '/header.php');
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: historico_vt_footer
	$footerCode = '';
	if(function_exists('historico_vt_footer')) {
		$args = [];
		$footerCode = historico_vt_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once(__DIR__ . '/footer.php'); 
	} else {
		ob_start();
		include_once(__DIR__ . '/footer.php');
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
