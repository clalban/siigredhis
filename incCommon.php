<?php

	#########################################################
	/*
	~~~~~~ LIST OF FUNCTIONS ~~~~~~
		get_table_groups() -- returns an associative array (table_group => tables_array)
		getTablePermissions($tn) -- returns an array of permissions allowed for logged member to given table (allowAccess, allowInsert, allowView, allowEdit, allowDelete) -- allowAccess is set to true if any access level is allowed
		get_sql_fields($tn) -- returns the SELECT part of the table view query
		get_sql_from($tn[, true, [, false]]) -- returns the FROM part of the table view query, with full joins (unless third paramaeter is set to true), optionally skipping permissions if true passed as 2nd param.
		get_joined_record($table, $id[, true]) -- returns assoc array of record values for given PK value of given table, with full joins, optionally skipping permissions if true passed as 3rd param.
		get_defaults($table) -- returns assoc array of table fields as array keys and default values (or empty), excluding automatic values as array values
		htmlUserBar() -- returns html code for displaying user login status to be used on top of pages.
		showNotifications($msg, $class) -- returns html code for displaying a notification. If no parameters provided, processes the GET request for possible notifications.
		parseMySQLDate(a, b) -- returns a if valid mysql date, or b if valid mysql date, or today if b is true, or empty if b is false.
		parseCode(code) -- calculates and returns special values to be inserted in automatic fields.
		addFilter(i, filterAnd, filterField, filterOperator, filterValue) -- enforce a filter over data
		clearFilters() -- clear all filters
		loadView($view, $data) -- passes $data to templates/{$view}.php and returns the output
		loadTable($table, $data) -- loads table template, passing $data to it
		br2nl($text) -- replaces all variations of HTML <br> tags with a new line character
		entitiesToUTF8($text) -- convert unicode entities (e.g. &#1234;) to actual UTF8 characters, requires multibyte string PHP extension
		func_get_args_byref() -- returns an array of arguments passed to a function, by reference
		permissions_sql($table, $level) -- returns an array containing the FROM and WHERE additions for applying permissions to an SQL query
		error_message($msg[, $back_url]) -- returns html code for a styled error message .. pass explicit false in second param to suppress back button
		toMySQLDate($formattedDate, $sep = datalist_date_separator, $ord = datalist_date_format)
		reIndex(&$arr) -- returns a copy of the given array, with keys replaced by 1-based numeric indices, and values replaced by original keys
		get_embed($provider, $url[, $width, $height, $retrieve]) -- returns embed code for a given url (supported providers: youtube, googlemap)
		check_record_permission($table, $id, $perm = 'view') -- returns true if current user has the specified permission $perm ('view', 'edit' or 'delete') for the given recors, false otherwise
		NavMenus($options) -- returns the HTML code for the top navigation menus. $options is not implemented currently.
		StyleSheet() -- returns the HTML code for included style sheet files to be placed in the <head> section.
		getUploadDir($dir) -- if dir is empty, returns upload dir configured in defaultLang.php, else returns $dir.
		PrepareUploadedFile($FieldName, $MaxSize, $FileTypes={image file types}, $NoRename=false, $dir="") -- validates and moves uploaded file for given $FieldName into the given $dir (or the default one if empty)
		get_home_links($homeLinks, $default_classes, $tgroup) -- process $homeLinks array and return custom links for homepage. Applies $default_classes to links if links have classes defined, and filters links by $tgroup (using '*' matches all table_group values)
		quick_search_html($search_term, $label, $separate_dv = true) -- returns HTML code for the quick search box.
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	*/

	#########################################################

	function get_table_groups($skip_authentication = false) {
		$tables = getTableList($skip_authentication);
		$all_groups = ['Registro visitas', 'Tablas'];

		$groups = [];
		foreach($all_groups as $grp) {
			foreach($tables as $tn => $td) {
				if($td[3] && $td[3] == $grp) $groups[$grp][] = $tn;
				if(!$td[3]) $groups[0][] = $tn;
			}
		}

		return $groups;
	}

	#########################################################

	function getTablePermissions($tn) {
		static $table_permissions = [];
		if(isset($table_permissions[$tn])) return $table_permissions[$tn];

		$groupID = getLoggedGroupID();
		$memberID = makeSafe(getLoggedMemberID());
		$res_group = sql("SELECT `tableName`, `allowInsert`, `allowView`, `allowEdit`, `allowDelete` FROM `membership_grouppermissions` WHERE `groupID`='{$groupID}'", $eo);
		$res_user  = sql("SELECT `tableName`, `allowInsert`, `allowView`, `allowEdit`, `allowDelete` FROM `membership_userpermissions`  WHERE LCASE(`memberID`)='{$memberID}'", $eo);

		while($row = db_fetch_assoc($res_group)) {
			$table_permissions[$row['tableName']] = [
				1 => intval($row['allowInsert']),
				2 => intval($row['allowView']),
				3 => intval($row['allowEdit']),
				4 => intval($row['allowDelete']),
				'insert' => intval($row['allowInsert']),
				'view' => intval($row['allowView']),
				'edit' => intval($row['allowEdit']),
				'delete' => intval($row['allowDelete'])
			];
		}

		// user-specific permissions, if specified, overwrite his group permissions
		while($row = db_fetch_assoc($res_user)) {
			$table_permissions[$row['tableName']] = [
				1 => intval($row['allowInsert']),
				2 => intval($row['allowView']),
				3 => intval($row['allowEdit']),
				4 => intval($row['allowDelete']),
				'insert' => intval($row['allowInsert']),
				'view' => intval($row['allowView']),
				'edit' => intval($row['allowEdit']),
				'delete' => intval($row['allowDelete'])
			];
		}

		// if user has any type of access, set 'access' flag
		foreach($table_permissions as $t => $p) {
			$table_permissions[$t]['access'] = $table_permissions[$t][0] = false;

			if($p['insert'] || $p['view'] || $p['edit'] || $p['delete']) {
				$table_permissions[$t]['access'] = $table_permissions[$t][0] = true;
			}
		}

		return $table_permissions[$tn];
	}

	#########################################################

	function get_sql_fields($table_name) {
		$sql_fields = [
			'historico_vt' => "`historico_vt`.`VcrId` as 'VcrId', `historico_vt`.`VcrCodHis` as 'VcrCodHis', `historico_vt`.`Vcrano` as 'Vcrano', IF(    CHAR_LENGTH(`servidor_publico1`.`VcrSerPub`), CONCAT_WS('',   `servidor_publico1`.`VcrSerPub`, ' '), '') as 'VcrIdSerP', IF(    CHAR_LENGTH(`solicitudes1`.`VcrSol`), CONCAT_WS('',   `solicitudes1`.`VcrSol`), '') as 'VcrIdSol', `historico_vt`.`VcrRadSol` as 'VcrRadSol', DATE_FORMAT(`historico_vt`.`VcrFecSol`, '%e/%c/%Y %l:%i%p') as 'VcrFecSol', `historico_vt`.`VcrRadRes` as 'VcrRadRes', DATE_FORMAT(`historico_vt`.`VcrFecRad`, '%e/%c/%Y %l:%i%p') as 'VcrFecRad', `historico_vt`.`VcrDiaResp` as 'VcrDiaResp', IF(    CHAR_LENGTH(`tipo_riesgo1`.`VcrNomRie`), CONCAT_WS('',   `tipo_riesgo1`.`VcrNomRie`), '') as 'VcrIdRie', `historico_vt`.`VcrEntSol` as 'VcrEntSol', `historico_vt`.`VcrNomAti` as 'VcrNomAti', `historico_vt`.`VcrNoIde` as 'VcrNoIde', CONCAT_WS('-', LEFT(`historico_vt`.`VcrCel`,3), MID(`historico_vt`.`VcrCel`,4,3), RIGHT(`historico_vt`.`VcrCel`,4)) as 'VcrCel', `historico_vt`.`VcrCodForm` as 'VcrCodForm', if(`historico_vt`.`VcrFecVis`,date_format(`historico_vt`.`VcrFecVis`,'%d/%m/%Y'),'') as 'VcrFecVis', `historico_vt`.`VcrDir` as 'VcrDir', IF(    CHAR_LENGTH(`barrios1`.`VcrBarVer`), CONCAT_WS('',   `barrios1`.`VcrBarVer`), '') as 'VcrIdBarVe', IF(    CHAR_LENGTH(`comunas1`.`VcrCom`), CONCAT_WS('',   `comunas1`.`VcrCom`), '') as 'VcrIdCom', IF(    CHAR_LENGTH(`corregimientos1`.`VcrCorr`), CONCAT_WS('',   `corregimientos1`.`VcrCorr`, ' '), '') as 'VcrIdCorr', `historico_vt`.`VcrLon` as 'VcrLon', `historico_vt`.`VcrLat` as 'VcrLat', IF(    CHAR_LENGTH(`motivo_visita1`.`VcrMotVis`), CONCAT_WS('',   `motivo_visita1`.`VcrMotVis`), '') as 'VcrIdMot', IF(    CHAR_LENGTH(`fenomenos1`.`VcrFen`), CONCAT_WS('',   `fenomenos1`.`VcrFen`), '') as 'VcrIdFen', IF(    CHAR_LENGTH(`caracteristicas_evento1`.`VcrCarFen`), CONCAT_WS('',   `caracteristicas_evento1`.`VcrCarFen`), '') as 'VcrIdCar', `historico_vt`.`VcrAyuHum` as 'VcrAyuHum', `historico_vt`.`VcrPerHer` as 'VcrPerHer', `historico_vt`.`VcrPerFall` as 'VcrPerFall', `historico_vt`.`VcrTraCas` as 'VcrTraCas', `historico_vt`.`VcrCop` as 'VcrCop', `historico_vt`.`VcrEstTra` as 'VcrEstTra', `historico_vt`.`VcrObsHis` as 'VcrObsHis', `historico_vt`.`VcrUbiInf` as 'VcrUbiInf', `historico_vt`.`VcrResInf` as 'VcrResInf', IF(    CHAR_LENGTH(`dependencias1`.`VcrTra`), CONCAT_WS('',   `dependencias1`.`VcrTra`), '') as 'VcrIdTra1', `historico_vt`.`VcrRadTra1` as 'VcrRadTra1', if(`historico_vt`.`VcrFecTra1`,date_format(`historico_vt`.`VcrFecTra1`,'%d/%m/%Y'),'') as 'VcrFecTra1', `historico_vt`.`VcrResTra1` as 'VcrResTra1', IF(    CHAR_LENGTH(`dependencias2`.`VcrTra`), CONCAT_WS('',   `dependencias2`.`VcrTra`), '') as 'VcrIdTra2', `historico_vt`.`VcrRadTra2` as 'VcrRadTra2', if(`historico_vt`.`VcrFecTra2`,date_format(`historico_vt`.`VcrFecTra2`,'%d/%m/%Y'),'') as 'VcrFecTra2', `historico_vt`.`VcrResTra2` as 'VcrResTra2', IF(    CHAR_LENGTH(`dependencias3`.`VcrTra`), CONCAT_WS('',   `dependencias3`.`VcrTra`), '') as 'VcrIdTra3', `historico_vt`.`VcrRadTra3` as 'VcrRadTra3', if(`historico_vt`.`VcrFecTra3`,date_format(`historico_vt`.`VcrFecTra3`,'%d/%m/%Y'),'') as 'VcrFecTra3', `historico_vt`.`VcrResTra3` as 'VcrResTra3', IF(    CHAR_LENGTH(`dependencias4`.`VcrTra`), CONCAT_WS('',   `dependencias4`.`VcrTra`), '') as 'VcrIdTra4', `historico_vt`.`VcrRadTra4` as 'VcrRadTra4', if(`historico_vt`.`VcrFecTra4`,date_format(`historico_vt`.`VcrFecTra4`,'%d/%m/%Y'),'') as 'VcrFecTra4', `historico_vt`.`VcrResTra4` as 'VcrResTra4', IF(    CHAR_LENGTH(`dependencias5`.`VcrTra`), CONCAT_WS('',   `dependencias5`.`VcrTra`), '') as 'VcrIdTra5', `historico_vt`.`VcrRadTra5` as 'VcrRadTra5', if(`historico_vt`.`VcrFecTra5`,date_format(`historico_vt`.`VcrFecTra5`,'%d/%m/%Y'),'') as 'VcrFecTra5', `historico_vt`.`VcrResTra5` as 'VcrResTra5', IF(    CHAR_LENGTH(`dependencias6`.`VcrTra`), CONCAT_WS('',   `dependencias6`.`VcrTra`), '') as 'VcrIdTra6', `historico_vt`.`VcrRadTra6` as 'VcrRadTra6', IF(    CHAR_LENGTH(`dependencias7`.`VcrTra`), CONCAT_WS('',   `dependencias7`.`VcrTra`), '') as 'VcrIdTra7', `historico_vt`.`VcrRadTra7` as 'VcrRadTra7', IF(    CHAR_LENGTH(`dependencias8`.`VcrTra`), CONCAT_WS('',   `dependencias8`.`VcrTra`), '') as 'VcrIdTra8', `historico_vt`.`VcrRadTra8` as 'VcrRadTra8'",
			'tipo_documento' => "`tipo_documento`.`VcrIdTip` as 'VcrIdTip', `tipo_documento`.`VcrTip` as 'VcrTip'",
			'motivo_visita' => "`motivo_visita`.`VcrIdMot` as 'VcrIdMot', `motivo_visita`.`VcrMotVis` as 'VcrMotVis'",
			'barrios' => "`barrios`.`VcrIdBarVe` as 'VcrIdBarVe', `barrios`.`VcrBarVer` as 'VcrBarVer', IF(    CHAR_LENGTH(`comunas1`.`VcrCom`), CONCAT_WS('',   `comunas1`.`VcrCom`), '') as 'VcrIdCom'",
			'comunas' => "`comunas`.`VcrIdCom` as 'VcrIdCom', `comunas`.`VcrCom` as 'VcrCom'",
			'fenomenos' => "`fenomenos`.`VcrIdFen` as 'VcrIdFen', `fenomenos`.`VcrFen` as 'VcrFen'",
			'caracteristicas_evento' => "`caracteristicas_evento`.`VcrIdCar` as 'VcrIdCar', `caracteristicas_evento`.`VcrCarFen` as 'VcrCarFen'",
			'tipo_material' => "`tipo_material`.`VcrIdMat` as 'VcrIdMat', `tipo_material`.`VcrTipMat` as 'VcrTipMat'",
			'lesiones' => "`lesiones`.`VcrIdLes` as 'VcrIdLes', `lesiones`.`VcrLesEst` as 'VcrLesEst'",
			'capacidad_reducida' => "`capacidad_reducida`.`VcrIdCap` as 'VcrIdCap', `capacidad_reducida`.`VcrCap` as 'VcrCap'",
			'servidor_publico' => "`servidor_publico`.`VcrIdSerP` as 'VcrIdSerP', `servidor_publico`.`VcrSerPub` as 'VcrSerPub', `servidor_publico`.`VcrTipSerP` as 'VcrTipSerP', IF(    CHAR_LENGTH(`procesos1`.`VcrNomProc`), CONCAT_WS('',   `procesos1`.`VcrNomProc`), '') as 'VcrIdProc', `servidor_publico`.`VcrCelSerP` as 'VcrCelSerP', `servidor_publico`.`VcrCorrSerP` as 'VcrCorrSerP'",
			'fuente_riesgo' => "`fuente_riesgo`.`VcrIdFte` as 'VcrIdFte', `fuente_riesgo`.`VcrFte` as 'VcrFte'",
			'corregimientos' => "`corregimientos`.`VcrIdCorr` as 'VcrIdCorr', `corregimientos`.`VcrCorr` as 'VcrCorr'",
			'dependencias' => "`dependencias`.`VcrId` as 'VcrId', `dependencias`.`VcrIdTra` as 'VcrIdTra', `dependencias`.`VcrTra` as 'VcrTra'",
			'solicitudes' => "`solicitudes`.`VcrIdSol` as 'VcrIdSol', `solicitudes`.`VcrSol` as 'VcrSol'",
			'municipios' => "`municipios`.`VcrIdExp` as 'VcrIdExp', `municipios`.`VcrExpEn` as 'VcrExpEn'",
			'afectacion' => "`afectacion`.`VcrIdAfe` as 'VcrIdAfe', `afectacion`.`VcrAfe` as 'VcrAfe'",
			'edificacion' => "`edificacion`.`VcrIdEdi` as 'VcrIdEdi', `edificacion`.`VcrEdi` as 'VcrEdi'",
			'tipo_combustible' => "`tipo_combustible`.`VcrIdComb` as 'VcrIdComb', `tipo_combustible`.`VcrComb` as 'VcrComb'",
			'ubicacion' => "`ubicacion`.`VcrIdUbi` as 'VcrIdUbi', `ubicacion`.`VcrUbi` as 'VcrUbi', `ubicacion`.`VcrDesUbi` as 'VcrDesUbi'",
			'tipo_evento' => "`tipo_evento`.`VcrIdEve` as 'VcrIdEve', `tipo_evento`.`VcrTipEve` as 'VcrTipEve'",
			'actividad_economica' => "`actividad_economica`.`VcrIdAct` as 'VcrIdAct', `actividad_economica`.`VcrActEco` as 'VcrActEco'",
			'usuarios' => "`usuarios`.`VcrIdUsu` as 'VcrIdUsu', `usuarios`.`VcrNomUsu` as 'VcrNomUsu', `usuarios`.`VcrIdenUsu` as 'VcrIdenUsu'",
			'procesos' => "`procesos`.`VcrIdProc` as 'VcrIdProc', `procesos`.`VcrNomProc` as 'VcrNomProc'",
			'tipo_riesgo' => "`tipo_riesgo`.`VcrIdRie` as 'VcrIdRie', `tipo_riesgo`.`VcrNomRie` as 'VcrNomRie'",
		];

		if(isset($sql_fields[$table_name])) return $sql_fields[$table_name];

		return false;
	}

	#########################################################

	function get_sql_from($table_name, $skip_permissions = false, $skip_joins = false, $lower_permissions = false) {
		$sql_from = [
			'historico_vt' => "`historico_vt` LEFT JOIN `servidor_publico` as servidor_publico1 ON `servidor_publico1`.`VcrIdSerP`=`historico_vt`.`VcrIdSerP` LEFT JOIN `solicitudes` as solicitudes1 ON `solicitudes1`.`VcrIdSol`=`historico_vt`.`VcrIdSol` LEFT JOIN `tipo_riesgo` as tipo_riesgo1 ON `tipo_riesgo1`.`VcrIdRie`=`historico_vt`.`VcrIdRie` LEFT JOIN `barrios` as barrios1 ON `barrios1`.`VcrIdBarVe`=`historico_vt`.`VcrIdBarVe` LEFT JOIN `comunas` as comunas1 ON `comunas1`.`VcrIdCom`=`historico_vt`.`VcrIdCom` LEFT JOIN `corregimientos` as corregimientos1 ON `corregimientos1`.`VcrIdCorr`=`historico_vt`.`VcrIdCorr` LEFT JOIN `motivo_visita` as motivo_visita1 ON `motivo_visita1`.`VcrIdMot`=`historico_vt`.`VcrIdMot` LEFT JOIN `fenomenos` as fenomenos1 ON `fenomenos1`.`VcrIdFen`=`historico_vt`.`VcrIdFen` LEFT JOIN `caracteristicas_evento` as caracteristicas_evento1 ON `caracteristicas_evento1`.`VcrIdCar`=`historico_vt`.`VcrIdCar` LEFT JOIN `dependencias` as dependencias1 ON `dependencias1`.`VcrId`=`historico_vt`.`VcrIdTra1` LEFT JOIN `dependencias` as dependencias2 ON `dependencias2`.`VcrId`=`historico_vt`.`VcrIdTra2` LEFT JOIN `dependencias` as dependencias3 ON `dependencias3`.`VcrId`=`historico_vt`.`VcrIdTra3` LEFT JOIN `dependencias` as dependencias4 ON `dependencias4`.`VcrId`=`historico_vt`.`VcrIdTra4` LEFT JOIN `dependencias` as dependencias5 ON `dependencias5`.`VcrId`=`historico_vt`.`VcrIdTra5` LEFT JOIN `dependencias` as dependencias6 ON `dependencias6`.`VcrId`=`historico_vt`.`VcrIdTra6` LEFT JOIN `dependencias` as dependencias7 ON `dependencias7`.`VcrId`=`historico_vt`.`VcrIdTra7` LEFT JOIN `dependencias` as dependencias8 ON `dependencias8`.`VcrId`=`historico_vt`.`VcrIdTra8` ",
			'tipo_documento' => "`tipo_documento` ",
			'motivo_visita' => "`motivo_visita` ",
			'barrios' => "`barrios` LEFT JOIN `comunas` as comunas1 ON `comunas1`.`VcrIdCom`=`barrios`.`VcrIdCom` ",
			'comunas' => "`comunas` ",
			'fenomenos' => "`fenomenos` ",
			'caracteristicas_evento' => "`caracteristicas_evento` ",
			'tipo_material' => "`tipo_material` ",
			'lesiones' => "`lesiones` ",
			'capacidad_reducida' => "`capacidad_reducida` ",
			'servidor_publico' => "`servidor_publico` LEFT JOIN `procesos` as procesos1 ON `procesos1`.`VcrIdProc`=`servidor_publico`.`VcrIdProc` ",
			'fuente_riesgo' => "`fuente_riesgo` ",
			'corregimientos' => "`corregimientos` ",
			'dependencias' => "`dependencias` ",
			'solicitudes' => "`solicitudes` ",
			'municipios' => "`municipios` ",
			'afectacion' => "`afectacion` ",
			'edificacion' => "`edificacion` ",
			'tipo_combustible' => "`tipo_combustible` ",
			'ubicacion' => "`ubicacion` ",
			'tipo_evento' => "`tipo_evento` ",
			'actividad_economica' => "`actividad_economica` ",
			'usuarios' => "`usuarios` ",
			'procesos' => "`procesos` ",
			'tipo_riesgo' => "`tipo_riesgo` ",
		];

		$pkey = [
			'historico_vt' => 'VcrId',
			'tipo_documento' => 'VcrIdTip',
			'motivo_visita' => 'VcrIdMot',
			'barrios' => 'VcrIdBarVe',
			'comunas' => 'VcrIdCom',
			'fenomenos' => 'VcrIdFen',
			'caracteristicas_evento' => 'VcrIdCar',
			'tipo_material' => 'VcrIdMat',
			'lesiones' => 'VcrIdLes',
			'capacidad_reducida' => 'VcrIdCap',
			'servidor_publico' => 'VcrIdSerP',
			'fuente_riesgo' => 'VcrIdFte',
			'corregimientos' => 'VcrIdCorr',
			'dependencias' => 'VcrId',
			'solicitudes' => 'VcrIdSol',
			'municipios' => 'VcrIdExp',
			'afectacion' => 'VcrIdAfe',
			'edificacion' => 'VcrIdEdi',
			'tipo_combustible' => 'VcrIdComb',
			'ubicacion' => 'VcrIdUbi',
			'tipo_evento' => 'VcrIdEve',
			'actividad_economica' => 'VcrIdAct',
			'usuarios' => 'VcrIdUsu',
			'procesos' => 'VcrIdProc',
			'tipo_riesgo' => 'VcrIdRie',
		];

		if(!isset($sql_from[$table_name])) return false;

		$from = ($skip_joins ? "`{$table_name}`" : $sql_from[$table_name]);

		if($skip_permissions) return $from . ' WHERE 1=1';

		// mm: build the query based on current member's permissions
		// allowing lower permissions if $lower_permissions set to 'user' or 'group'
		$perm = getTablePermissions($table_name);
		if($perm['view'] == 1 || ($perm['view'] > 1 && $lower_permissions == 'user')) { // view owner only
			$from .= ", `membership_userrecords` WHERE `{$table_name}`.`{$pkey[$table_name]}`=`membership_userrecords`.`pkValue` AND `membership_userrecords`.`tableName`='{$table_name}' AND LCASE(`membership_userrecords`.`memberID`)='" . getLoggedMemberID() . "'";
		} elseif($perm['view'] == 2 || ($perm['view'] > 2 && $lower_permissions == 'group')) { // view group only
			$from .= ", `membership_userrecords` WHERE `{$table_name}`.`{$pkey[$table_name]}`=`membership_userrecords`.`pkValue` AND `membership_userrecords`.`tableName`='{$table_name}' AND `membership_userrecords`.`groupID`='" . getLoggedGroupID() . "'";
		} elseif($perm['view'] == 3) { // view all
			$from .= ' WHERE 1=1';
		} else { // view none
			return false;
		}

		return $from;
	}

	#########################################################

	function get_joined_record($table, $id, $skip_permissions = false) {
		$sql_fields = get_sql_fields($table);
		$sql_from = get_sql_from($table, $skip_permissions);

		if(!$sql_fields || !$sql_from) return false;

		$pk = getPKFieldName($table);
		if(!$pk) return false;

		$safe_id = makeSafe($id, false);
		$sql = "SELECT {$sql_fields} FROM {$sql_from} AND `{$table}`.`{$pk}`='{$safe_id}'";
		$eo = ['silentErrors' => true];
		$res = sql($sql, $eo);
		if($row = db_fetch_assoc($res)) return $row;

		return false;
	}

	#########################################################

	function get_defaults($table) {
		/* array of tables and their fields, with default values (or empty), excluding automatic values */
		$defaults = [
			'historico_vt' => [
				'VcrId' => '',
				'VcrCodHis' => '',
				'Vcrano' => '',
				'VcrIdSerP' => '',
				'VcrIdSol' => '',
				'VcrRadSol' => '',
				'VcrFecSol' => '',
				'VcrRadRes' => '',
				'VcrFecRad' => '',
				'VcrDiaResp' => '',
				'VcrIdRie' => '',
				'VcrEntSol' => '',
				'VcrNomAti' => '',
				'VcrNoIde' => '',
				'VcrCel' => '',
				'VcrCodForm' => '',
				'VcrFecVis' => '',
				'VcrDir' => '',
				'VcrIdBarVe' => '',
				'VcrIdCom' => '',
				'VcrIdCorr' => '',
				'VcrLon' => '',
				'VcrLat' => '',
				'VcrIdMot' => '',
				'VcrIdFen' => '',
				'VcrIdCar' => '',
				'VcrAyuHum' => '',
				'VcrPerHer' => '',
				'VcrPerFall' => '',
				'VcrTraCas' => '',
				'VcrCop' => '',
				'VcrEstTra' => '',
				'VcrObsHis' => '',
				'VcrUbiInf' => '',
				'VcrResInf' => '',
				'VcrIdTra1' => '',
				'VcrRadTra1' => '',
				'VcrFecTra1' => '',
				'VcrResTra1' => '',
				'VcrIdTra2' => '',
				'VcrRadTra2' => '',
				'VcrFecTra2' => '',
				'VcrResTra2' => '',
				'VcrIdTra3' => '',
				'VcrRadTra3' => '',
				'VcrFecTra3' => '',
				'VcrResTra3' => '',
				'VcrIdTra4' => '',
				'VcrRadTra4' => '',
				'VcrFecTra4' => '',
				'VcrResTra4' => '',
				'VcrIdTra5' => '',
				'VcrRadTra5' => '',
				'VcrFecTra5' => '',
				'VcrResTra5' => '',
				'VcrIdTra6' => '',
				'VcrRadTra6' => '',
				'VcrIdTra7' => '',
				'VcrRadTra7' => '',
				'VcrIdTra8' => '',
				'VcrRadTra8' => '',
			],
			'tipo_documento' => [
				'VcrIdTip' => '',
				'VcrTip' => '',
			],
			'motivo_visita' => [
				'VcrIdMot' => '',
				'VcrMotVis' => '',
			],
			'barrios' => [
				'VcrIdBarVe' => '',
				'VcrBarVer' => '',
				'VcrIdCom' => '',
			],
			'comunas' => [
				'VcrIdCom' => '',
				'VcrCom' => '',
			],
			'fenomenos' => [
				'VcrIdFen' => '',
				'VcrFen' => '',
			],
			'caracteristicas_evento' => [
				'VcrIdCar' => '',
				'VcrCarFen' => '',
			],
			'tipo_material' => [
				'VcrIdMat' => '',
				'VcrTipMat' => '',
			],
			'lesiones' => [
				'VcrIdLes' => '',
				'VcrLesEst' => '',
			],
			'capacidad_reducida' => [
				'VcrIdCap' => '',
				'VcrCap' => '',
			],
			'servidor_publico' => [
				'VcrIdSerP' => '',
				'VcrSerPub' => '',
				'VcrTipSerP' => '',
				'VcrIdProc' => '',
				'VcrCelSerP' => '',
				'VcrCorrSerP' => '',
			],
			'fuente_riesgo' => [
				'VcrIdFte' => '',
				'VcrFte' => '',
			],
			'corregimientos' => [
				'VcrIdCorr' => '',
				'VcrCorr' => '',
			],
			'dependencias' => [
				'VcrId' => '',
				'VcrIdTra' => '',
				'VcrTra' => '',
			],
			'solicitudes' => [
				'VcrIdSol' => '',
				'VcrSol' => '',
			],
			'municipios' => [
				'VcrIdExp' => '',
				'VcrExpEn' => '',
			],
			'afectacion' => [
				'VcrIdAfe' => '',
				'VcrAfe' => '',
			],
			'edificacion' => [
				'VcrIdEdi' => '',
				'VcrEdi' => '',
			],
			'tipo_combustible' => [
				'VcrIdComb' => '',
				'VcrComb' => '',
			],
			'ubicacion' => [
				'VcrIdUbi' => '',
				'VcrUbi' => '',
				'VcrDesUbi' => '',
			],
			'tipo_evento' => [
				'VcrIdEve' => '',
				'VcrTipEve' => '',
			],
			'actividad_economica' => [
				'VcrIdAct' => '',
				'VcrActEco' => '',
			],
			'usuarios' => [
				'VcrIdUsu' => '',
				'VcrNomUsu' => '',
				'VcrIdenUsu' => '',
			],
			'procesos' => [
				'VcrIdProc' => '',
				'VcrNomProc' => '',
			],
			'tipo_riesgo' => [
				'VcrIdRie' => '',
				'VcrNomRie' => '',
			],
		];

		return isset($defaults[$table]) ? $defaults[$table] : [];
	}

	#########################################################

	function htmlUserBar() {
		global $Translation;
		if(!defined('PREPEND_PATH')) define('PREPEND_PATH', '');

		$mi = getMemberInfo();
		$adminConfig = config('adminConfig');
		$home_page = (basename($_SERVER['PHP_SELF']) == 'index.php');
		ob_start();

		?>
		<nav class="navbar navbar-default navbar-fixed-top hidden-print" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- application title is obtained from the name besides the yellow database icon in AppGini, use underscores for spaces -->
				<a class="navbar-brand" href="<?php echo PREPEND_PATH; ?>index.php"><i class="glyphicon glyphicon-home"></i> <?php echo APP_TITLE; ?></a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav"><?php echo ($home_page ? '' : NavMenus()); ?></ul>

				<?php if(userCanImport()){ ?>
					<ul class="nav navbar-nav">
						<a href="<?php echo PREPEND_PATH; ?>import-csv.php" class="btn btn-default navbar-btn hidden-xs btn-import-csv" title="<?php echo html_attr($Translation['import csv file']); ?>"><i class="glyphicon glyphicon-th"></i> <?php echo $Translation['import CSV']; ?></a>
						<a href="<?php echo PREPEND_PATH; ?>import-csv.php" class="btn btn-default navbar-btn visible-xs btn-lg btn-import-csv" title="<?php echo html_attr($Translation['import csv file']); ?>"><i class="glyphicon glyphicon-th"></i> <?php echo $Translation['import CSV']; ?></a>
					</ul>
				<?php } ?>

				<?php if(getLoggedAdmin() !== false) { ?>
					<ul class="nav navbar-nav">
						<a href="<?php echo PREPEND_PATH; ?>admin/pageHome.php" class="btn btn-danger navbar-btn hidden-xs" title="<?php echo html_attr($Translation['admin area']); ?>"><i class="glyphicon glyphicon-cog"></i> <?php echo $Translation['admin area']; ?></a>
						<a href="<?php echo PREPEND_PATH; ?>admin/pageHome.php" class="btn btn-danger navbar-btn visible-xs btn-lg" title="<?php echo html_attr($Translation['admin area']); ?>"><i class="glyphicon glyphicon-cog"></i> <?php echo $Translation['admin area']; ?></a>
					</ul>
				<?php } ?>

				<?php if(!Request::val('signIn') && !Request::val('loginFailed')) { ?>
					<?php if(!$mi['username'] || $mi['username'] == $adminConfig['anonymousMember']) { ?>
						<p class="navbar-text navbar-right hidden-xs">&nbsp;</p>
						<a href="<?php echo PREPEND_PATH; ?>index.php?signIn=1" class="btn btn-success navbar-btn navbar-right hidden-xs"><?php echo $Translation['sign in']; ?></a>
						<p class="navbar-text navbar-right hidden-xs">
							<?php echo $Translation['not signed in']; ?>
						</p>
						<a href="<?php echo PREPEND_PATH; ?>index.php?signIn=1" class="btn btn-success btn-block btn-lg navbar-btn visible-xs">
							<?php echo $Translation['not signed in']; ?>
							<i class="glyphicon glyphicon-chevron-right"></i> 
							<?php echo $Translation['sign in']; ?>
						</a>
					<?php } else { ?>
						<ul class="nav navbar-nav navbar-right hidden-xs">
							<!-- logged user profile menu -->
							<li class="dropdown" title="<?php echo html_attr("{$Translation['signed as']} {$mi['username']}"); ?>">
								<a href="#" class="dropdown-toggle profile-menu-icon" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i></a>
								<ul class="dropdown-menu profile-menu">
									<li class="user-profile-menu-item" title="<?php echo html_attr("{$Translation['Your info']}"); ?>">
										<a href="<?php echo PREPEND_PATH; ?>membership_profile.php"><i class="glyphicon glyphicon-user"></i> <span class="username"><?php echo $mi['username']; ?></span></a>
									</li>
									<li class="keyboard-shortcuts-menu-item" title="<?php echo html_attr("{$Translation['keyboard shortcuts']}"); ?>" class="hidden-xs">
										<a href="#" class="help-shortcuts-launcher">
											<img src="<?php echo PREPEND_PATH; ?>resources/images/keyboard.png">
											<?php echo html_attr($Translation['keyboard shortcuts']); ?>
										</a>
									</li>
									<li class="sign-out-menu-item" title="<?php echo html_attr("{$Translation['sign out']}"); ?>">
										<a href="<?php echo PREPEND_PATH; ?>index.php?signOut=1"><i class="glyphicon glyphicon-log-out"></i> <?php echo $Translation['sign out']; ?></a>
									</li>
								</ul>
							</li>
						</ul>
						<ul class="nav navbar-nav visible-xs">
							<a class="btn navbar-btn btn-default btn-lg visible-xs" href="<?php echo PREPEND_PATH; ?>index.php?signOut=1"><i class="glyphicon glyphicon-log-out"></i> <?php echo $Translation['sign out']; ?></a>
							<p class="navbar-text text-center signed-in-as">
								<?php echo $Translation['signed as']; ?> <strong><a href="<?php echo PREPEND_PATH; ?>membership_profile.php" class="navbar-link username"><?php echo $mi['username']; ?></a></strong>
							</p>
						</ul>
						<script>
							/* periodically check if user is still signed in */
							setInterval(function() {
								$j.ajax({
									url: '<?php echo PREPEND_PATH; ?>ajax_check_login.php',
									success: function(username) {
										if(!username.length) window.location = '<?php echo PREPEND_PATH; ?>index.php?signIn=1';
									}
								});
							}, 60000);
						</script>
					<?php } ?>
				<?php } ?>
			</div>
		</nav>
		<?php

		return ob_get_clean();
	}

	#########################################################

	function showNotifications($msg = '', $class = '', $fadeout = true) {
		global $Translation;
		if($error_message = strip_tags(Request::val('error_message')))
			$error_message = '<div class="text-bold">' . $error_message . '</div>';

		if(!$msg) { // if no msg, use url to detect message to display
			if(Request::val('record-added-ok')) {
				$msg = $Translation['new record saved'];
				$class = 'alert-success';
			} elseif(Request::val('record-added-error')) {
				$msg = $Translation['Couldn\'t save the new record'] . $error_message;
				$class = 'alert-danger';
				$fadeout = false;
			} elseif(Request::val('record-updated-ok')) {
				$msg = $Translation['record updated'];
				$class = 'alert-success';
			} elseif(Request::val('record-updated-error')) {
				$msg = $Translation['Couldn\'t save changes to the record'] . $error_message;
				$class = 'alert-danger';
				$fadeout = false;
			} elseif(Request::val('record-deleted-ok')) {
				$msg = $Translation['The record has been deleted successfully'];
				$class = 'alert-success';
			} elseif(Request::val('record-deleted-error')) {
				$msg = $Translation['Couldn\'t delete this record'] . $error_message;
				$class = 'alert-danger';
				$fadeout = false;
			} else {
				return '';
			}
		}
		$id = 'notification-' . rand();

		ob_start();
		// notification template
		?>
		<div id="%%ID%%" class="alert alert-dismissable %%CLASS%%" style="opacity: 1; padding-top: 6px; padding-bottom: 6px; animation: fadeIn 1.5s ease-out; z-index: 100; position: relative;">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			%%MSG%%
		</div>
		<script>
			$j(function() {
				var autoDismiss = <?php echo $fadeout ? 'true' : 'false'; ?>,
					embedded = !$j('nav').length,
					messageDelay = 10, fadeDelay = 1.5;

				if(!autoDismiss) {
					if(embedded)
						$j('#%%ID%%').before('<div style="height: 2rem;"></div>');
					else
						$j('#%%ID%%').css({ margin: '0 0 1rem' });

					return;
				}

				// below code runs only in case of autoDismiss

				if(embedded)
					$j('#%%ID%%').css({ margin: '1rem 0 -1rem' });
				else
					$j('#%%ID%%').css({ margin: '-15px 0 -20px' });

				setTimeout(function() {
					$j('#%%ID%%').css({    animation: 'fadeOut ' + fadeDelay + 's ease-out' });
				}, messageDelay * 1000);

				setTimeout(function() {
					$j('#%%ID%%').css({    visibility: 'hidden' });
				}, (messageDelay + fadeDelay) * 1000);
			})
		</script>
		<style>
			@keyframes fadeIn {
				0%   { opacity: 0; }
				100% { opacity: 1; }
			}
			@keyframes fadeOut {
				0%   { opacity: 1; }
				100% { opacity: 0; }
			}
		</style>

		<?php
		$out = ob_get_clean();

		$out = str_replace('%%ID%%', $id, $out);
		$out = str_replace('%%MSG%%', $msg, $out);
		$out = str_replace('%%CLASS%%', $class, $out);

		return $out;
	}

	#########################################################

	function validMySQLDate($date) {
		$date = trim($date);

		try {
			$dtObj = new DateTime($date);
		} catch(Exception $e) {
			return false;
		}

		$parts = explode('-', $date);
		return (
			count($parts) == 3
			// see https://dev.mysql.com/doc/refman/8.0/en/datetime.html
			&& intval($parts[0]) >= 1000
			&& intval($parts[0]) <= 9999
			&& intval($parts[1]) >= 1
			&& intval($parts[1]) <= 12
			&& intval($parts[2]) >= 1
			&& intval($parts[2]) <= 31
		);
	}

	#########################################################

	function parseMySQLDate($date, $altDate) {
		// is $date valid?
		if(validMySQLDate($date)) return trim($date);

		if($date != '--' && validMySQLDate($altDate)) return trim($altDate);

		if($date != '--' && $altDate && is_numeric($altDate))
			return @date('Y-m-d', @time() + ($altDate >= 1 ? $altDate - 1 : $altDate) * 86400);

		return '';
	}

	#########################################################

	function parseCode($code, $isInsert = true, $rawData = false) {
		$mi = Authentication::getUser();

		if($isInsert) {
			$arrCodes = [
				'<%%creatorusername%%>' => $mi['username'],
				'<%%creatorgroupid%%>' => $mi['groupId'],
				'<%%creatorip%%>' => $_SERVER['REMOTE_ADDR'],
				'<%%creatorgroup%%>' => $mi['group'],

				'<%%creationdate%%>' => ($rawData ? date('Y-m-d') : date(app_datetime_format('phps'))),
				'<%%creationtime%%>' => ($rawData ? date('H:i:s') : date(app_datetime_format('phps', 't'))),
				'<%%creationdatetime%%>' => ($rawData ? date('Y-m-d H:i:s') : date(app_datetime_format('phps', 'dt'))),
				'<%%creationtimestamp%%>' => ($rawData ? date('Y-m-d H:i:s') : time()),
			];
		} else {
			$arrCodes = [
				'<%%editorusername%%>' => $mi['username'],
				'<%%editorgroupid%%>' => $mi['groupId'],
				'<%%editorip%%>' => $_SERVER['REMOTE_ADDR'],
				'<%%editorgroup%%>' => $mi['group'],

				'<%%editingdate%%>' => ($rawData ? date('Y-m-d') : date(app_datetime_format('phps'))),
				'<%%editingtime%%>' => ($rawData ? date('H:i:s') : date(app_datetime_format('phps', 't'))),
				'<%%editingdatetime%%>' => ($rawData ? date('Y-m-d H:i:s') : date(app_datetime_format('phps', 'dt'))),
				'<%%editingtimestamp%%>' => ($rawData ? date('Y-m-d H:i:s') : time()),
			];
		}

		$pc = str_ireplace(array_keys($arrCodes), array_values($arrCodes), $code);

		return $pc;
	}

	#########################################################

	function addFilter($index, $filterAnd, $filterField, $filterOperator, $filterValue) {
		// validate input
		if($index < 1 || $index > 80 || !is_int($index)) return false;
		if($filterAnd != 'or')   $filterAnd = 'and';
		$filterField = intval($filterField);

		/* backward compatibility */
		if(in_array($filterOperator, FILTER_OPERATORS)) {
			$filterOperator = array_search($filterOperator, FILTER_OPERATORS);
		}

		if(!in_array($filterOperator, array_keys(FILTER_OPERATORS))) {
			$filterOperator = 'like';
		}

		if(!$filterField) {
			$filterOperator = '';
			$filterValue = '';
		}

		$_REQUEST['FilterAnd'][$index] = $filterAnd;
		$_REQUEST['FilterField'][$index] = $filterField;
		$_REQUEST['FilterOperator'][$index] = $filterOperator;
		$_REQUEST['FilterValue'][$index] = $filterValue;

		return true;
	}

	#########################################################

	function clearFilters() {
		for($i=1; $i<=80; $i++) {
			addFilter($i, '', 0, '', '');
		}
	}

	#########################################################

	/**
	* Loads a given view from the templates folder, passing the given data to it
	* @param $view the name of a php file (without extension) to be loaded from the 'templates' folder
	* @param $the_data_to_pass_to_the_view (optional) associative array containing the data to pass to the view
	* @return the output of the parsed view as a string
	*/
	function loadView($view, $the_data_to_pass_to_the_view = false) {
		global $Translation;

		$view = __DIR__ . "/templates/$view.php";
		if(!is_file($view)) return false;

		if(is_array($the_data_to_pass_to_the_view)) {
			foreach($the_data_to_pass_to_the_view as $data_k => $data_v)
				$$data_k = $data_v;
		}
		unset($the_data_to_pass_to_the_view, $data_k, $data_v);

		ob_start();
		@include($view);
		return ob_get_clean();
	}

	#########################################################

	/**
	* Loads a table template from the templates folder, passing the given data to it
	* @param $table_name the name of the table whose template is to be loaded from the 'templates' folder
	* @param $the_data_to_pass_to_the_table associative array containing the data to pass to the table template
	* @return the output of the parsed table template as a string
	*/
	function loadTable($table_name, $the_data_to_pass_to_the_table = []) {
		$dont_load_header = $the_data_to_pass_to_the_table['dont_load_header'];
		$dont_load_footer = $the_data_to_pass_to_the_table['dont_load_footer'];

		$header = $table = $footer = '';

		if(!$dont_load_header) {
			// try to load tablename-header
			if(!($header = loadView("{$table_name}-header", $the_data_to_pass_to_the_table))) {
				$header = loadView('table-common-header', $the_data_to_pass_to_the_table);
			}
		}

		$table = loadView($table_name, $the_data_to_pass_to_the_table);

		if(!$dont_load_footer) {
			// try to load tablename-footer
			if(!($footer = loadView("{$table_name}-footer", $the_data_to_pass_to_the_table))) {
				$footer = loadView('table-common-footer', $the_data_to_pass_to_the_table);
			}
		}

		return "{$header}{$table}{$footer}";
	}

	#########################################################

	function br2nl($text) {
		return  preg_replace('/\<br(\s*)?\/?\>/i', "\n", $text);
	}

	#########################################################

	function entitiesToUTF8($input) {
		return preg_replace_callback('/(&#[0-9]+;)/', '_toUTF8', $input);
	}

	function _toUTF8($m) {
		if(function_exists('mb_convert_encoding')) {
			return mb_convert_encoding($m[1], "UTF-8", "HTML-ENTITIES");
		} else {
			return $m[1];
		}
	}

	#########################################################

	function func_get_args_byref() {
		if(!function_exists('debug_backtrace')) return false;

		$trace = debug_backtrace();
		return $trace[1]['args'];
	}

	#########################################################

	function permissions_sql($table, $level = 'all') {
		if(!in_array($level, ['user', 'group'])) { $level = 'all'; }
		$perm = getTablePermissions($table);
		$from = '';
		$where = '';
		$pk = getPKFieldName($table);

		if($perm['view'] == 1 || ($perm['view'] > 1 && $level == 'user')) { // view owner only
			$from = 'membership_userrecords';
			$where = "(`$table`.`$pk`=membership_userrecords.pkValue and membership_userrecords.tableName='$table' and lcase(membership_userrecords.memberID)='" . getLoggedMemberID() . "')";
		} elseif($perm['view'] == 2 || ($perm['view'] > 2 && $level == 'group')) { // view group only
			$from = 'membership_userrecords';
			$where = "(`$table`.`$pk`=membership_userrecords.pkValue and membership_userrecords.tableName='$table' and membership_userrecords.groupID='" . getLoggedGroupID() . "')";
		} elseif($perm['view'] == 3) { // view all
			// no further action
		} elseif($perm['view'] == 0) { // view none
			return false;
		}

		return ['where' => $where, 'from' => $from, 0 => $where, 1 => $from];
	}

	#########################################################

	function error_message($msg, $back_url = '', $full_page = true) {
		global $Translation;

		ob_start();

		if($full_page) include(__DIR__ . '/header.php');

		echo '<div class="panel panel-danger">';
			echo '<div class="panel-heading"><h3 class="panel-title">' . $Translation['error:'] . '</h3></div>';
			echo '<div class="panel-body"><p class="text-danger">' . $msg . '</p>';
			if($back_url !== false) { // explicitly passing false suppresses the back link completely
				echo '<div class="text-center">';
				if($back_url) {
					echo '<a href="' . $back_url . '" class="btn btn-danger btn-lg vspacer-lg"><i class="glyphicon glyphicon-chevron-left"></i> ' . $Translation['< back'] . '</a>';
				} else {
					echo '<a href="#" class="btn btn-danger btn-lg vspacer-lg" onclick="history.go(-1); return false;"><i class="glyphicon glyphicon-chevron-left"></i> ' . $Translation['< back'] . '</a>';
				}
				echo '</div>';
			}
			echo '</div>';
		echo '</div>';

		if($full_page) include(__DIR__ . '/footer.php');

		return ob_get_clean();
	}

	#########################################################

	function toMySQLDate($formattedDate, $sep = datalist_date_separator, $ord = datalist_date_format) {
		// extract date elements
		$de=explode($sep, $formattedDate);
		$mySQLDate=intval($de[strpos($ord, 'Y')]).'-'.intval($de[strpos($ord, 'm')]).'-'.intval($de[strpos($ord, 'd')]);
		return $mySQLDate;
	}

	#########################################################

	function reIndex(&$arr) {
		$i=1;
		foreach($arr as $n=>$v) {
			$arr2[$i]=$n;
			$i++;
		}
		return $arr2;
	}

	#########################################################

	function get_embed($provider, $url, $max_width = '', $max_height = '', $retrieve = 'html') {
		global $Translation;
		if(!$url) return '';

		$providers = [
			'youtube' => ['oembed' => 'https://www.youtube.com/oembed?'],
			'googlemap' => ['oembed' => '', 'regex' => '/^http.*\.google\..*maps/i'],
		];

		if(!isset($providers[$provider])) {
			return '<div class="text-danger">' . $Translation['invalid provider'] . '</div>';
		}

		if(isset($providers[$provider]['regex']) && !preg_match($providers[$provider]['regex'], $url)) {
			return '<div class="text-danger">' . $Translation['invalid url'] . '</div>';
		}

		if($providers[$provider]['oembed']) {
			$oembed = $providers[$provider]['oembed'] . 'url=' . urlencode($url) . "&amp;maxwidth={$max_width}&amp;maxheight={$max_height}&amp;format=json";
			$data_json = request_cache($oembed);

			$data = json_decode($data_json, true);
			if($data === null) {
				/* an error was returned rather than a json string */
				if($retrieve == 'html') return "<div class=\"text-danger\">{$data_json}\n<!-- {$oembed} --></div>";
				return '';
			}

			return (isset($data[$retrieve]) ? $data[$retrieve] : $data['html']);
		}

		/* special cases (where there is no oEmbed provider) */
		if($provider == 'googlemap') return get_embed_googlemap($url, $max_width, $max_height, $retrieve);

		return '<div class="text-danger">Invalid provider!</div>';
	}

	#########################################################

	function get_embed_googlemap($url, $max_width = '', $max_height = '', $retrieve = 'html') {
		global $Translation;
		$url_parts = parse_url($url);
		$coords_regex = '/-?\d+(\.\d+)?[,+]-?\d+(\.\d+)?(,\d{1,2}z)?/'; /* https://stackoverflow.com/questions/2660201 */

		if(preg_match($coords_regex, $url_parts['path'] . '?' . $url_parts['query'], $m)) {
			list($lat, $long, $zoom) = explode(',', $m[0]);
			$zoom = intval($zoom);
			if(!$zoom) $zoom = 10; /* default zoom */
			if(!$max_height) $max_height = 360;
			if(!$max_width) $max_width = 480;

			$api_key = config('adminConfig')['googleAPIKey'];
			$embed_url = "https://www.google.com/maps/embed/v1/view?key={$api_key}&amp;center={$lat},{$long}&amp;zoom={$zoom}&amp;maptype=roadmap";
			$thumbnail_url = "https://maps.googleapis.com/maps/api/staticmap?key={$api_key}&amp;center={$lat},{$long}&amp;zoom={$zoom}&amp;maptype=roadmap&amp;size={$max_width}x{$max_height}";

			if($retrieve == 'html') {
				return "<iframe width=\"{$max_width}\" height=\"{$max_height}\" frameborder=\"0\" style=\"border:0\" src=\"{$embed_url}\"></iframe>";
			} else {
				return $thumbnail_url;
			}
		} else {
			return '<div class="text-danger">' . $Translation['cant retrieve coordinates from url'] . '</div>';
		}
	}

	#########################################################

	function request_cache($request, $force_fetch = false) {
		$max_cache_lifetime = 7 * 86400; /* max cache lifetime in seconds before refreshing from source */

		/* membership_cache table exists? if not, create it */
		static $cache_table_exists = false;
		if(!$cache_table_exists && !$force_fetch) {
			$te = sqlValue("show tables like 'membership_cache'");
			if(!$te) {
				if(!sql("CREATE TABLE `membership_cache` (`request` VARCHAR(100) NOT NULL, `request_ts` INT, `response` TEXT NOT NULL, PRIMARY KEY (`request`))", $eo)) {
					/* table can't be created, so force fetching request */
					return request_cache($request, true);
				}
			}
			$cache_table_exists = true;
		}

		/* retrieve response from cache if exists */
		if(!$force_fetch) {
			$res = sql("select response, request_ts from membership_cache where request='" . md5($request) . "'", $eo);
			if(!$row = db_fetch_array($res)) return request_cache($request, true);

			$response = $row[0];
			$response_ts = $row[1];
			if($response_ts < time() - $max_cache_lifetime) return request_cache($request, true);
		}

		/* if no response in cache, issue a request */
		if(!$response || $force_fetch) {
			$response = @file_get_contents($request);
			if($response === false) {
				$error = error_get_last();
				$error_message = preg_replace('/.*: (.*)/', '$1', $error['message']);
				return $error_message;
			} elseif($cache_table_exists) {
				/* store response in cache */
				$ts = time();
				sql("replace into membership_cache set request='" . md5($request) . "', request_ts='{$ts}', response='" . makeSafe($response, false) . "'", $eo);
			}
		}

		return $response;
	}

	#########################################################

	function check_record_permission($table, $id, $perm = 'view') {
		if($perm != 'edit' && $perm != 'delete') $perm = 'view';

		$perms = getTablePermissions($table);
		if(!$perms[$perm]) return false;

		$safe_id = makeSafe($id);
		$safe_table = makeSafe($table);

		if($perms[$perm] == 1) { // own records only
			$username = getLoggedMemberID();
			$owner = sqlValue("select memberID from membership_userrecords where tableName='{$safe_table}' and pkValue='{$safe_id}'");
			if($owner == $username) return true;
		} elseif($perms[$perm] == 2) { // group records
			$group_id = getLoggedGroupID();
			$owner_group_id = sqlValue("select groupID from membership_userrecords where tableName='{$safe_table}' and pkValue='{$safe_id}'");
			if($owner_group_id == $group_id) return true;
		} elseif($perms[$perm] == 3) { // all records
			return true;
		}

		return false;
	}

	#########################################################

	function NavMenus($options = []) {
		if(!defined('PREPEND_PATH')) define('PREPEND_PATH', '');
		global $Translation;
		$prepend_path = PREPEND_PATH;

		/* default options */
		if(empty($options)) {
			$options = ['tabs' => 7];
		}

		$table_group_name = array_keys(get_table_groups()); /* 0 => group1, 1 => group2 .. */
		/* if only one group named 'None', set to translation of 'select a table' */
		if((count($table_group_name) == 1 && $table_group_name[0] == 'None') || count($table_group_name) < 1) $table_group_name[0] = $Translation['select a table'];
		$table_group_index = array_flip($table_group_name); /* group1 => 0, group2 => 1 .. */
		$menu = array_fill(0, count($table_group_name), '');

		$t = time();
		$arrTables = getTableList();
		if(is_array($arrTables)) {
			foreach($arrTables as $tn => $tc) {
				/* ---- list of tables where hide link in nav menu is set ---- */
				$tChkHL = array_search($tn, []);

				/* ---- list of tables where filter first is set ---- */
				$tChkFF = array_search($tn, []);
				if($tChkFF !== false && $tChkFF !== null) {
					$searchFirst = '&Filter_x=1';
				} else {
					$searchFirst = '';
				}

				/* when no groups defined, $table_group_index['None'] is NULL, so $menu_index is still set to 0 */
				$menu_index = intval($table_group_index[$tc[3]]);
				if(!$tChkHL && $tChkHL !== 0) $menu[$menu_index] .= "<li><a href=\"{$prepend_path}{$tn}_view.php?t={$t}{$searchFirst}\"><img src=\"{$prepend_path}" . ($tc[2] ? $tc[2] : 'blank.gif') . "\" height=\"32\"> {$tc[0]}</a></li>";
			}
		}

		// custom nav links, as defined in "hooks/links-navmenu.php" 
		global $navLinks;
		if(is_array($navLinks)) {
			$memberInfo = getMemberInfo();
			$links_added = [];
			foreach($navLinks as $link) {
				if(!isset($link['url']) || !isset($link['title'])) continue;
				if(getLoggedAdmin() !== false || @in_array($memberInfo['group'], $link['groups']) || @in_array('*', $link['groups'])) {
					$menu_index = intval($link['table_group']);
					if(!$links_added[$menu_index]) $menu[$menu_index] .= '<li class="divider"></li>';

					/* add prepend_path to custom links if they aren't absolute links */
					if(!preg_match('/^(http|\/\/)/i', $link['url'])) $link['url'] = $prepend_path . $link['url'];
					if(!preg_match('/^(http|\/\/)/i', $link['icon']) && $link['icon']) $link['icon'] = $prepend_path . $link['icon'];

					$menu[$menu_index] .= "<li><a href=\"{$link['url']}\"><img src=\"" . ($link['icon'] ? $link['icon'] : "{$prepend_path}blank.gif") . "\" height=\"32\"> {$link['title']}</a></li>";
					$links_added[$menu_index]++;
				}
			}
		}

		$menu_wrapper = '';
		for($i = 0; $i < count($menu); $i++) {
			$menu_wrapper .= <<<EOT
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">{$table_group_name[$i]} <b class="caret"></b></a>
					<ul class="dropdown-menu" role="menu">{$menu[$i]}</ul>
				</li>
EOT;
		}

		return $menu_wrapper;
	}

	#########################################################

	function StyleSheet() {
		if(!defined('PREPEND_PATH')) define('PREPEND_PATH', '');
		$prepend_path = PREPEND_PATH;
		$appVersion = (defined('APP_VERSION') ? APP_VERSION : rand());

		$css_links = <<<EOT

			<link rel="stylesheet" href="{$prepend_path}resources/initializr/css/bootstrap.css">
			<link rel="stylesheet" href="{$prepend_path}resources/lightbox/css/lightbox.css" media="screen">
			<link rel="stylesheet" href="{$prepend_path}resources/select2/select2.css" media="screen">
			<link rel="stylesheet" href="{$prepend_path}resources/timepicker/bootstrap-timepicker.min.css" media="screen">
			<link rel="stylesheet" href="{$prepend_path}dynamic.css?{$appVersion}">
EOT;

		return $css_links;
	}

	#########################################################

	function PrepareUploadedFile($FieldName, $MaxSize, $FileTypes = 'jpg|jpeg|gif|png|webp', $NoRename = false, $dir = '') {
		global $Translation;
		$f = $_FILES[$FieldName];
		if($f['error'] == 4 || !$f['name']) return '';

		$dir = getUploadDir($dir);

		/* get php.ini upload_max_filesize in bytes */
		$php_upload_size_limit = toBytes(ini_get('upload_max_filesize'));
		$MaxSize = min($MaxSize, $php_upload_size_limit);

		if($f['size'] > $MaxSize || $f['error']) {
			echo error_message(str_replace(['<MaxSize>', '{MaxSize}'], intval($MaxSize / 1024), $Translation['file too large']));
			exit;
		}
		if(!preg_match('/\.(' . $FileTypes . ')$/i', $f['name'], $ft)) {
			echo error_message(str_replace(['<FileTypes>', '{FileTypes}'], str_replace('|', ', ', $FileTypes), $Translation['invalid file type']));
			exit;
		}

		$name = str_replace(' ', '_', $f['name']);
		if(!$NoRename) $name = substr(md5(microtime() . rand(0, 100000)), -17) . $ft[0];

		if(!file_exists($dir)) @mkdir($dir, 0777);

		if(!@move_uploaded_file($f['tmp_name'], $dir . $name)) {
			echo error_message("Couldn't save the uploaded file. Try chmoding the upload folder '{$dir}' to 777.");
			exit;
		}

		@chmod($dir . $name, 0666);
		return $name;
	}

	#########################################################

	function get_home_links($homeLinks, $default_classes, $tgroup = '') {
		if(!is_array($homeLinks) || !count($homeLinks)) return '';

		$memberInfo = getMemberInfo();

		ob_start();
		foreach($homeLinks as $link) {
			if(!isset($link['url']) || !isset($link['title'])) continue;
			if($tgroup != $link['table_group'] && $tgroup != '*') continue;

			/* fall-back classes if none defined */
			if(!$link['grid_column_classes']) $link['grid_column_classes'] = $default_classes['grid_column'];
			if(!$link['panel_classes']) $link['panel_classes'] = $default_classes['panel'];
			if(!$link['link_classes']) $link['link_classes'] = $default_classes['link'];

			if(getLoggedAdmin() !== false || @in_array($memberInfo['group'], $link['groups']) || @in_array('*', $link['groups'])) {
				?>
				<div class="col-xs-12 <?php echo $link['grid_column_classes']; ?>">
					<div class="panel <?php echo $link['panel_classes']; ?>">
						<div class="panel-body">
							<a class="btn btn-block btn-lg <?php echo $link['link_classes']; ?>" title="<?php echo preg_replace("/&amp;(#[0-9]+|[a-z]+);/i", "&$1;", html_attr(strip_tags($link['description']))); ?>" href="<?php echo $link['url']; ?>"><?php echo ($link['icon'] ? '<img src="' . $link['icon'] . '">' : ''); ?><strong><?php echo $link['title']; ?></strong></a>
							<div class="panel-body-description"><?php echo $link['description']; ?></div>
						</div>
					</div>
				</div>
				<?php
			}
		}

		return ob_get_clean();
	}

	#########################################################

	function quick_search_html($search_term, $label, $separate_dv = true) {
		global $Translation;

		$safe_search = html_attr($search_term);
		$safe_label = html_attr($label);
		$safe_clear_label = html_attr($Translation['Reset Filters']);

		if($separate_dv) {
			$reset_selection = "document.myform.SelectedID.value = '';";
		} else {
			$reset_selection = "document.myform.writeAttribute('novalidate', 'novalidate');";
		}
		$reset_selection .= ' document.myform.NoDV.value=1; return true;';

		$html = <<<EOT
		<div class="input-group" id="quick-search">
			<input type="text" id="SearchString" name="SearchString" value="{$safe_search}" class="form-control" placeholder="{$safe_label}">
			<span class="input-group-btn">
				<button name="Search_x" value="1" id="Search" type="submit" onClick="{$reset_selection}" class="btn btn-default" title="{$safe_label}"><i class="glyphicon glyphicon-search"></i></button>
				<button name="ClearQuickSearch" value="1" id="ClearQuickSearch" type="submit" onClick="\$j('#SearchString').val(''); {$reset_selection}" class="btn btn-default" title="{$safe_clear_label}"><i class="glyphicon glyphicon-remove-circle"></i></button>
			</span>
		</div>
EOT;
		return $html;
	}

	#########################################################

