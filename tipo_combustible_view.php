<?php
// This script and data application were generated by AppGini 22.13
// Download AppGini for free from https://bigprof.com/appgini/download/

	include_once(__DIR__ . '/lib.php');
	@include_once(__DIR__ . '/hooks/tipo_combustible.php');
	include_once(__DIR__ . '/tipo_combustible_dml.php');

	// mm: can the current member access this page?
	$perm = getTablePermissions('tipo_combustible');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied']);
		exit;
	}

	$x = new DataList;
	$x->TableName = 'tipo_combustible';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`tipo_combustible`.`VcrIdComb`" => "VcrIdComb",
		"`tipo_combustible`.`VcrComb`" => "VcrComb",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`tipo_combustible`.`VcrIdComb`',
		2 => 2,
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`tipo_combustible`.`VcrIdComb`" => "VcrIdComb",
		"`tipo_combustible`.`VcrComb`" => "VcrComb",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`tipo_combustible`.`VcrIdComb`" => "Id",
		"`tipo_combustible`.`VcrComb`" => "NOMBRE TIPO COMBUSTIBLE",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`tipo_combustible`.`VcrIdComb`" => "VcrIdComb",
		"`tipo_combustible`.`VcrComb`" => "VcrComb",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = [];

	$x->QueryFrom = "`tipo_combustible` ";
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
	$x->ScriptFileName = 'tipo_combustible_view.php';
	$x->TableTitle = 'Tipo combustible';
	$x->TableIcon = 'table.gif';
	$x->PrimaryKey = '`tipo_combustible`.`VcrIdComb`';

	$x->ColWidth = [150, ];
	$x->ColCaption = ['NOMBRE TIPO COMBUSTIBLE', ];
	$x->ColFieldName = ['VcrComb', ];
	$x->ColNumber  = [2, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/tipo_combustible_templateTV.html';
	$x->SelectedTemplate = 'templates/tipo_combustible_templateTVS.html';
	$x->TemplateDV = 'templates/tipo_combustible_templateDV.html';
	$x->TemplateDVP = 'templates/tipo_combustible_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HasCalculatedFields = false;
	$x->AllowConsoleLog = false;
	$x->AllowDVNavigation = true;

	// hook: tipo_combustible_init
	$render = true;
	if(function_exists('tipo_combustible_init')) {
		$args = [];
		$render = tipo_combustible_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: tipo_combustible_header
	$headerCode = '';
	if(function_exists('tipo_combustible_header')) {
		$args = [];
		$headerCode = tipo_combustible_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once(__DIR__ . '/header.php'); 
	} else {
		ob_start();
		include_once(__DIR__ . '/header.php');
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: tipo_combustible_footer
	$footerCode = '';
	if(function_exists('tipo_combustible_footer')) {
		$args = [];
		$footerCode = tipo_combustible_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once(__DIR__ . '/footer.php'); 
	} else {
		ob_start();
		include_once(__DIR__ . '/footer.php');
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
