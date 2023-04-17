<?php
	// check this file's MD5 to make sure it wasn't called before
	$tenantId = Authentication::tenantIdPadded();
	$setupHash = __DIR__ . "/setup{$tenantId}.md5";

	$prevMD5 = @file_get_contents($setupHash);
	$thisMD5 = md5_file(__FILE__);

	// check if this setup file already run
	if($thisMD5 != $prevMD5) {
		// set up tables
		setupTable(
			'historico_vt', " 
			CREATE TABLE IF NOT EXISTS `historico_vt` ( 
				`VcrId` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`VcrId`),
				`VcrCodHis` INT NULL,
				`Vcrano` YEAR NULL,
				`VcrIdSerP` INT NOT NULL,
				`VcrIdSol` VARCHAR(12) NOT NULL,
				`VcrRadSol` VARCHAR(20) NULL,
				`VcrFecSol` DATE NULL,
				`VcrRadRes` BIGINT(20) NULL,
				`VcrFecRad` DATE NULL,
				`VcrDiaResp` INT NULL,
				`VcrIdRie` INT UNSIGNED NULL,
				`VcrEntSol` VARCHAR(70) NULL,
				`VcrNomAti` VARCHAR(50) NULL,
				`VcrNoIde` VARCHAR(10) NULL,
				`VcrCel` INT NULL,
				`VcrCodForm` VARCHAR(20) NULL,
				`VcrFecVis` DATE NULL,
				`VcrDir` VARCHAR(70) NULL,
				`VcrIdBarVe` VARCHAR(10) NULL,
				`VcrIdCom` VARCHAR(12) NULL,
				`VcrIdCorr` VARCHAR(12) NULL,
				`VcrLon` VARCHAR(12) NULL,
				`VcrLat` VARCHAR(12) NULL,
				`VcrIdMot` VARCHAR(12) NOT NULL,
				`VcrIdFen` VARCHAR(12) NOT NULL,
				`VcrIdCar` VARCHAR(12) NOT NULL,
				`VcrAyuHum` VARCHAR(2) NOT NULL,
				`VcrPerHer` VARCHAR(3) NULL,
				`VcrPerFall` VARCHAR(3) NULL,
				`VcrTraCas` VARCHAR(2) NULL,
				`VcrCop` VARCHAR(70) NULL,
				`VcrEstTra` LONGTEXT NULL,
				`VcrObsHis` LONGBLOB NULL,
				`VcrUbiInf` LONGTEXT NULL,
				`VcrResInf` LONGTEXT NULL,
				`VcrIdTra1` INT UNSIGNED NULL,
				`VcrRadTra1` VARCHAR(30) NULL,
				`VcrFecTra1` DATE NULL,
				`VcrResTra1` LONGTEXT NULL,
				`VcrIdTra2` INT UNSIGNED NULL,
				`VcrRadTra2` VARCHAR(30) NULL,
				`VcrFecTra2` DATE NULL,
				`VcrResTra2` LONGTEXT NULL,
				`VcrIdTra3` INT UNSIGNED NULL,
				`VcrRadTra3` VARCHAR(40) NULL,
				`VcrFecTra3` DATE NULL,
				`VcrResTra3` VARCHAR(40) NULL,
				`VcrIdTra4` INT UNSIGNED NULL,
				`VcrRadTra4` VARCHAR(30) NULL,
				`VcrFecTra4` DATE NULL,
				`VcrResTra4` LONGTEXT NULL,
				`VcrIdTra5` INT UNSIGNED NULL,
				`VcrRadTra5` VARCHAR(30) NULL,
				`VcrFecTra5` DATE NULL,
				`VcrResTra5` LONGTEXT NULL,
				`VcrIdTra6` INT UNSIGNED NULL,
				`VcrRadTra6` VARCHAR(30) NULL,
				`VcrIdTra7` INT UNSIGNED NULL,
				`VcrRadTra7` VARCHAR(30) NULL,
				`VcrIdTra8` INT UNSIGNED NULL,
				`VcrRadTra8` VARCHAR(30) NULL
			) CHARSET utf8mb4", [
				" ALTER TABLE `historico_vt` CHANGE `VcrLon` `VcrLon` VARCHAR(40) NULL ",
				" ALTER TABLE `historico_vt` CHANGE `VcrLon` `VcrLon` VARCHAR(12) NULL ",
				" ALTER TABLE `historico_vt` CHANGE `VcrLat` `VcrLat` VARCHAR(40) NULL ",
				" ALTER TABLE `historico_vt` CHANGE `VcrLat` `VcrLat` VARCHAR(12) NULL ",
			]
		);
		setupIndexes('historico_vt', ['VcrIdSerP','VcrIdSol','VcrIdRie','VcrIdBarVe','VcrIdCom','VcrIdCorr','VcrIdMot','VcrIdFen','VcrIdCar','VcrIdTra1','VcrIdTra2','VcrIdTra3','VcrIdTra4','VcrIdTra5','VcrIdTra6','VcrIdTra7','VcrIdTra8',]);

		setupTable(
			'tipo_documento', " 
			CREATE TABLE IF NOT EXISTS `tipo_documento` ( 
				`VcrIdTip` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`VcrIdTip`),
				`VcrTip` VARCHAR(30) NULL
			) CHARSET utf8mb4"
		);

		setupTable(
			'motivo_visita', " 
			CREATE TABLE IF NOT EXISTS `motivo_visita` ( 
				`VcrIdMot` VARCHAR(12) NOT NULL,
				PRIMARY KEY (`VcrIdMot`),
				`VcrMotVis` VARCHAR(20) NULL
			) CHARSET utf8mb4"
		);

		setupTable(
			'barrios', " 
			CREATE TABLE IF NOT EXISTS `barrios` ( 
				`VcrIdBarVe` VARCHAR(10) NOT NULL,
				PRIMARY KEY (`VcrIdBarVe`),
				`VcrBarVer` VARCHAR(40) NULL,
				`VcrIdCom` VARCHAR(12) NULL
			) CHARSET utf8mb4"
		);
		setupIndexes('barrios', ['VcrIdCom',]);

		setupTable(
			'comunas', " 
			CREATE TABLE IF NOT EXISTS `comunas` ( 
				`VcrIdCom` VARCHAR(12) NOT NULL,
				PRIMARY KEY (`VcrIdCom`),
				`VcrCom` VARCHAR(20) NULL
			) CHARSET utf8mb4"
		);

		setupTable(
			'fenomenos', " 
			CREATE TABLE IF NOT EXISTS `fenomenos` ( 
				`VcrIdFen` VARCHAR(12) NOT NULL,
				PRIMARY KEY (`VcrIdFen`),
				`VcrFen` VARCHAR(30) NULL
			) CHARSET utf8mb4"
		);

		setupTable(
			'caracteristicas_evento', " 
			CREATE TABLE IF NOT EXISTS `caracteristicas_evento` ( 
				`VcrIdCar` VARCHAR(12) NOT NULL,
				PRIMARY KEY (`VcrIdCar`),
				`VcrCarFen` VARCHAR(60) NULL
			) CHARSET utf8mb4"
		);

		setupTable(
			'tipo_material', " 
			CREATE TABLE IF NOT EXISTS `tipo_material` ( 
				`VcrIdMat` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`VcrIdMat`),
				`VcrTipMat` VARCHAR(40) NULL
			) CHARSET utf8mb4"
		);

		setupTable(
			'lesiones', " 
			CREATE TABLE IF NOT EXISTS `lesiones` ( 
				`VcrIdLes` VARCHAR(12) NOT NULL,
				PRIMARY KEY (`VcrIdLes`),
				`VcrLesEst` VARCHAR(40) NULL
			) CHARSET utf8mb4"
		);

		setupTable(
			'capacidad_reducida', " 
			CREATE TABLE IF NOT EXISTS `capacidad_reducida` ( 
				`VcrIdCap` VARCHAR(12) NOT NULL,
				PRIMARY KEY (`VcrIdCap`),
				`VcrCap` VARCHAR(40) NULL
			) CHARSET utf8mb4"
		);

		setupTable(
			'servidor_publico', " 
			CREATE TABLE IF NOT EXISTS `servidor_publico` ( 
				`VcrIdSerP` INT NOT NULL,
				PRIMARY KEY (`VcrIdSerP`),
				`VcrSerPub` VARCHAR(70) NULL,
				`VcrTipSerP` VARCHAR(15) NULL,
				`VcrIdProc` INT NULL,
				`VcrCelSerP` VARCHAR(40) NULL,
				`VcrCorrSerP` VARCHAR(40) NULL
			) CHARSET utf8mb4"
		);
		setupIndexes('servidor_publico', ['VcrIdProc',]);

		setupTable(
			'fuente_riesgo', " 
			CREATE TABLE IF NOT EXISTS `fuente_riesgo` ( 
				`VcrIdFte` VARCHAR(12) NOT NULL,
				PRIMARY KEY (`VcrIdFte`),
				`VcrFte` VARCHAR(40) NULL
			) CHARSET utf8mb4"
		);

		setupTable(
			'corregimientos', " 
			CREATE TABLE IF NOT EXISTS `corregimientos` ( 
				`VcrIdCorr` VARCHAR(12) NOT NULL,
				PRIMARY KEY (`VcrIdCorr`),
				`VcrCorr` VARCHAR(40) NULL
			) CHARSET utf8mb4"
		);

		setupTable(
			'dependencias', " 
			CREATE TABLE IF NOT EXISTS `dependencias` ( 
				`VcrId` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`VcrId`),
				`VcrIdTra` VARCHAR(12) NULL,
				`VcrTra` VARCHAR(70) NULL
			) CHARSET utf8mb4"
		);

		setupTable(
			'solicitudes', " 
			CREATE TABLE IF NOT EXISTS `solicitudes` ( 
				`VcrIdSol` VARCHAR(12) NOT NULL,
				PRIMARY KEY (`VcrIdSol`),
				`VcrSol` VARCHAR(40) NULL
			) CHARSET utf8mb4"
		);

		setupTable(
			'municipios', " 
			CREATE TABLE IF NOT EXISTS `municipios` ( 
				`VcrIdExp` VARCHAR(12) NOT NULL,
				PRIMARY KEY (`VcrIdExp`),
				`VcrExpEn` VARCHAR(70) NULL
			) CHARSET utf8mb4"
		);

		setupTable(
			'afectacion', " 
			CREATE TABLE IF NOT EXISTS `afectacion` ( 
				`VcrIdAfe` VARCHAR(12) NOT NULL,
				PRIMARY KEY (`VcrIdAfe`),
				`VcrAfe` VARCHAR(40) NULL
			) CHARSET utf8mb4"
		);

		setupTable(
			'edificacion', " 
			CREATE TABLE IF NOT EXISTS `edificacion` ( 
				`VcrIdEdi` VARCHAR(12) NOT NULL,
				PRIMARY KEY (`VcrIdEdi`),
				`VcrEdi` VARCHAR(40) NULL
			) CHARSET utf8mb4"
		);

		setupTable(
			'tipo_combustible', " 
			CREATE TABLE IF NOT EXISTS `tipo_combustible` ( 
				`VcrIdComb` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`VcrIdComb`),
				`VcrComb` VARCHAR(40) NULL
			) CHARSET utf8mb4"
		);

		setupTable(
			'ubicacion', " 
			CREATE TABLE IF NOT EXISTS `ubicacion` ( 
				`VcrIdUbi` BIGINT NOT NULL,
				PRIMARY KEY (`VcrIdUbi`),
				`VcrUbi` VARCHAR(40) NULL,
				`VcrDesUbi` LONGTEXT NULL
			) CHARSET utf8mb4"
		);

		setupTable(
			'tipo_evento', " 
			CREATE TABLE IF NOT EXISTS `tipo_evento` ( 
				`VcrIdEve` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`VcrIdEve`),
				`VcrTipEve` VARCHAR(40) NULL
			) CHARSET utf8mb4"
		);

		setupTable(
			'actividad_economica', " 
			CREATE TABLE IF NOT EXISTS `actividad_economica` ( 
				`VcrIdAct` VARCHAR(10) NOT NULL,
				PRIMARY KEY (`VcrIdAct`),
				`VcrActEco` LONGTEXT NULL
			) CHARSET utf8mb4"
		);

		setupTable(
			'usuarios', " 
			CREATE TABLE IF NOT EXISTS `usuarios` ( 
				`VcrIdUsu` INT(11) NOT NULL,
				PRIMARY KEY (`VcrIdUsu`),
				`VcrNomUsu` VARCHAR(40) NULL,
				`VcrIdenUsu` VARCHAR(11) NULL
			) CHARSET utf8mb4"
		);

		setupTable(
			'procesos', " 
			CREATE TABLE IF NOT EXISTS `procesos` ( 
				`VcrIdProc` INT NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`VcrIdProc`),
				`VcrNomProc` VARCHAR(80) NULL
			) CHARSET utf8mb4"
		);

		setupTable(
			'tipo_riesgo', " 
			CREATE TABLE IF NOT EXISTS `tipo_riesgo` ( 
				`VcrIdRie` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`VcrIdRie`),
				`VcrNomRie` VARCHAR(40) NULL
			) CHARSET utf8mb4"
		);



		// save MD5
		@file_put_contents($setupHash, $thisMD5);
	}


	function setupIndexes($tableName, $arrFields) {
		if(!is_array($arrFields) || !count($arrFields)) return false;

		foreach($arrFields as $fieldName) {
			if(!$res = @db_query("SHOW COLUMNS FROM `$tableName` like '$fieldName'")) continue;
			if(!$row = @db_fetch_assoc($res)) continue;
			if($row['Key']) continue;

			@db_query("ALTER TABLE `$tableName` ADD INDEX `$fieldName` (`$fieldName`)");
		}
	}


	function setupTable($tableName, $createSQL = '', $arrAlter = '') {
		global $Translation;
		$oldTableName = '';
		ob_start();

		echo '<div style="padding: 5px; border-bottom:solid 1px silver; font-family: verdana, arial; font-size: 10px;">';

		// is there a table rename query?
		if(is_array($arrAlter)) {
			$matches = [];
			if(preg_match("/ALTER TABLE `(.*)` RENAME `$tableName`/i", $arrAlter[0], $matches)) {
				$oldTableName = $matches[1];
			}
		}

		if($res = @db_query("SELECT COUNT(1) FROM `$tableName`")) { // table already exists
			if($row = @db_fetch_array($res)) {
				echo str_replace(['<TableName>', '<NumRecords>'], [$tableName, $row[0]], $Translation['table exists']);
				if(is_array($arrAlter)) {
					echo '<br>';
					foreach($arrAlter as $alter) {
						if($alter != '') {
							echo "$alter ... ";
							if(!@db_query($alter)) {
								echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
								echo '<div class="text-danger">' . $Translation['mysql said'] . ' ' . db_error(db_link()) . '</div>';
							} else {
								echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
							}
						}
					}
				} else {
					echo $Translation['table uptodate'];
				}
			} else {
				echo str_replace('<TableName>', $tableName, $Translation['couldnt count']);
			}
		} else { // given tableName doesn't exist

			if($oldTableName != '') { // if we have a table rename query
				if($ro = @db_query("SELECT COUNT(1) FROM `$oldTableName`")) { // if old table exists, rename it.
					$renameQuery = array_shift($arrAlter); // get and remove rename query

					echo "$renameQuery ... ";
					if(!@db_query($renameQuery)) {
						echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
						echo '<div class="text-danger">' . $Translation['mysql said'] . ' ' . db_error(db_link()) . '</div>';
					} else {
						echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
					}

					if(is_array($arrAlter)) setupTable($tableName, $createSQL, false, $arrAlter); // execute Alter queries on renamed table ...
				} else { // if old tableName doesn't exist (nor the new one since we're here), then just create the table.
					setupTable($tableName, $createSQL, false); // no Alter queries passed ...
				}
			} else { // tableName doesn't exist and no rename, so just create the table
				echo str_replace("<TableName>", $tableName, $Translation["creating table"]);
				if(!@db_query($createSQL)) {
					echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
					echo '<div class="text-danger">' . $Translation['mysql said'] . db_error(db_link()) . '</div>';
				} else {
					echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
				}
			}

			// set Admin group permissions for newly created table if membership_grouppermissions exists
			if($ro = @db_query("SELECT COUNT(1) FROM `membership_grouppermissions`")) {
				// get Admins group id
				$ro = @db_query("SELECT `groupID` FROM `membership_groups` WHERE `name`='Admins'");
				if($ro) {
					$adminGroupID = intval(db_fetch_row($ro)[0]);
					if($adminGroupID) @db_query("INSERT IGNORE INTO `membership_grouppermissions` SET
						`groupID`='$adminGroupID',
						`tableName`='$tableName',
						`allowInsert`=1, `allowView`=1, `allowEdit`=1, `allowDelete`=1
					");
				}
			}
		}

		echo '</div>';

		$out = ob_get_clean();
		if(defined('APPGINI_SETUP') && APPGINI_SETUP) echo $out;
	}
