<?php
// This script and data application were generated by AppGini 22.13
// Download AppGini for free from https://bigprof.com/appgini/download/

	include_once(__DIR__ . '/lib.php');
	@include_once(__DIR__ . '/hooks/capacidad_reducida.php');
	include_once(__DIR__ . '/capacidad_reducida_dml.php');

	// mm: can the current member access this page?
	$perm = getTablePermissions('capacidad_reducida');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied']);
		exit;
	}

	$x = new DataList;
	$x->TableName = 'capacidad_reducida';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`capacidad_reducida`.`VcrIdCap`" => "VcrIdCap",
		"`capacidad_reducida`.`VcrCap`" => "VcrCap",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => 1,
		2 => 2,
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`capacidad_reducida`.`VcrIdCap`" => "VcrIdCap",
		"`capacidad_reducida`.`VcrCap`" => "VcrCap",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`capacidad_reducida`.`VcrIdCap`" => "CODIGO DEL TIPO DE CAPACIDAD REDUCIDA:",
		"`capacidad_reducida`.`VcrCap`" => "NOMBRE TIPO CAPACIDAD REDUCIDA",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`capacidad_reducida`.`VcrIdCap`" => "VcrIdCap",
		"`capacidad_reducida`.`VcrCap`" => "VcrCap",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = [];

	$x->QueryFrom = "`capacidad_reducida` ";
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
	$x->ScriptFileName = 'capacidad_reducida_view.php';
	$x->TableTitle = 'capacidad reducida';
	$x->TableIcon = 'table.gif';
	$x->PrimaryKey = '`capacidad_reducida`.`VcrIdCap`';

	$x->ColWidth = [150, 150, ];
	$x->ColCaption = ['CODIGO DEL TIPO DE CAPACIDAD REDUCIDA:', 'NOMBRE TIPO CAPACIDAD REDUCIDA', ];
	$x->ColFieldName = ['VcrIdCap', 'VcrCap', ];
	$x->ColNumber  = [1, 2, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/capacidad_reducida_templateTV.html';
	$x->SelectedTemplate = 'templates/capacidad_reducida_templateTVS.html';
	$x->TemplateDV = 'templates/capacidad_reducida_templateDV.html';
	$x->TemplateDVP = 'templates/capacidad_reducida_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HasCalculatedFields = false;
	$x->AllowConsoleLog = false;
	$x->AllowDVNavigation = true;

	// hook: capacidad_reducida_init
	$render = true;
	if(function_exists('capacidad_reducida_init')) {
		$args = [];
		$render = capacidad_reducida_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: capacidad_reducida_header
	$headerCode = '';
	if(function_exists('capacidad_reducida_header')) {
		$args = [];
		$headerCode = capacidad_reducida_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once(__DIR__ . '/header.php'); 
	} else {
		ob_start();
		include_once(__DIR__ . '/header.php');
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: capacidad_reducida_footer
	$footerCode = '';
	if(function_exists('capacidad_reducida_footer')) {
		$args = [];
		$footerCode = capacidad_reducida_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once(__DIR__ . '/footer.php'); 
	} else {
		ob_start();
		include_once(__DIR__ . '/footer.php');
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
