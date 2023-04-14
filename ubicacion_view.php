<?php
// This script and data application were generated by AppGini 22.13
// Download AppGini for free from https://bigprof.com/appgini/download/

	include_once(__DIR__ . '/lib.php');
	@include_once(__DIR__ . '/hooks/ubicacion.php');
	include_once(__DIR__ . '/ubicacion_dml.php');

	// mm: can the current member access this page?
	$perm = getTablePermissions('ubicacion');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied']);
		exit;
	}

	$x = new DataList;
	$x->TableName = 'ubicacion';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`ubicacion`.`VcrIdUbi`" => "VcrIdUbi",
		"`ubicacion`.`VcrUbi`" => "VcrUbi",
		"`ubicacion`.`VcrDesUbi`" => "VcrDesUbi",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`ubicacion`.`VcrIdUbi`',
		2 => 2,
		3 => 3,
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`ubicacion`.`VcrIdUbi`" => "VcrIdUbi",
		"`ubicacion`.`VcrUbi`" => "VcrUbi",
		"`ubicacion`.`VcrDesUbi`" => "VcrDesUbi",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`ubicacion`.`VcrIdUbi`" => "CODIGO TIPO UBICACION ",
		"`ubicacion`.`VcrUbi`" => "TIPO DE UBICACION:",
		"`ubicacion`.`VcrDesUbi`" => "DESCRIPCION TIPO UBICACION ",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`ubicacion`.`VcrIdUbi`" => "VcrIdUbi",
		"`ubicacion`.`VcrUbi`" => "VcrUbi",
		"`ubicacion`.`VcrDesUbi`" => "VcrDesUbi",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = [];

	$x->QueryFrom = "`ubicacion` ";
	$x->QueryWhere = '';
	$x->QueryOrder = '';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm['view'] == 0 ? 1 : 0);
	$x->AllowDelete = $perm['delete'];
	$x->AllowMassDelete = (getLoggedAdmin() !== false);
	$x->AllowInsert = $perm['insert'];
	$x->AllowUpdate = $perm['edit'];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = (getLoggedAdmin() !== false);
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowPrintingDV = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation['quick search'];
	$x->ScriptFileName = 'ubicacion_view.php';
	$x->TableTitle = 'Ubicacion';
	$x->TableIcon = 'table.gif';
	$x->PrimaryKey = '`ubicacion`.`VcrIdUbi`';

	$x->ColWidth = [150, 150, 150, ];
	$x->ColCaption = ['CODIGO TIPO UBICACION ', 'TIPO DE UBICACION:', 'DESCRIPCION TIPO UBICACION ', ];
	$x->ColFieldName = ['VcrIdUbi', 'VcrUbi', 'VcrDesUbi', ];
	$x->ColNumber  = [1, 2, 3, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/ubicacion_templateTV.html';
	$x->SelectedTemplate = 'templates/ubicacion_templateTVS.html';
	$x->TemplateDV = 'templates/ubicacion_templateDV.html';
	$x->TemplateDVP = 'templates/ubicacion_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HasCalculatedFields = false;
	$x->AllowConsoleLog = false;
	$x->AllowDVNavigation = true;

	// hook: ubicacion_init
	$render = true;
	if(function_exists('ubicacion_init')) {
		$args = [];
		$render = ubicacion_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: ubicacion_header
	$headerCode = '';
	if(function_exists('ubicacion_header')) {
		$args = [];
		$headerCode = ubicacion_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once(__DIR__ . '/header.php'); 
	} else {
		ob_start();
		include_once(__DIR__ . '/header.php');
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: ubicacion_footer
	$footerCode = '';
	if(function_exists('ubicacion_footer')) {
		$args = [];
		$footerCode = ubicacion_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once(__DIR__ . '/footer.php'); 
	} else {
		ob_start();
		include_once(__DIR__ . '/footer.php');
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
