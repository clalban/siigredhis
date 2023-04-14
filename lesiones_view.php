<?php
// This script and data application were generated by AppGini 22.13
// Download AppGini for free from https://bigprof.com/appgini/download/

	include_once(__DIR__ . '/lib.php');
	@include_once(__DIR__ . '/hooks/lesiones.php');
	include_once(__DIR__ . '/lesiones_dml.php');

	// mm: can the current member access this page?
	$perm = getTablePermissions('lesiones');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied']);
		exit;
	}

	$x = new DataList;
	$x->TableName = 'lesiones';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`lesiones`.`VcrIdLes`" => "VcrIdLes",
		"`lesiones`.`VcrLesEst`" => "VcrLesEst",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => 1,
		2 => 2,
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`lesiones`.`VcrIdLes`" => "VcrIdLes",
		"`lesiones`.`VcrLesEst`" => "VcrLesEst",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`lesiones`.`VcrIdLes`" => "CODIGO DEL TIPO DE LESION",
		"`lesiones`.`VcrLesEst`" => "NOMBRE DEL TIPO DE LESION:",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`lesiones`.`VcrIdLes`" => "VcrIdLes",
		"`lesiones`.`VcrLesEst`" => "VcrLesEst",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = [];

	$x->QueryFrom = "`lesiones` ";
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
	$x->ScriptFileName = 'lesiones_view.php';
	$x->TableTitle = 'Lesiones';
	$x->TableIcon = 'table.gif';
	$x->PrimaryKey = '`lesiones`.`VcrIdLes`';

	$x->ColWidth = [150, 150, ];
	$x->ColCaption = ['CODIGO DEL TIPO DE LESION', 'NOMBRE DEL TIPO DE LESION:', ];
	$x->ColFieldName = ['VcrIdLes', 'VcrLesEst', ];
	$x->ColNumber  = [1, 2, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/lesiones_templateTV.html';
	$x->SelectedTemplate = 'templates/lesiones_templateTVS.html';
	$x->TemplateDV = 'templates/lesiones_templateDV.html';
	$x->TemplateDVP = 'templates/lesiones_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HasCalculatedFields = false;
	$x->AllowConsoleLog = false;
	$x->AllowDVNavigation = true;

	// hook: lesiones_init
	$render = true;
	if(function_exists('lesiones_init')) {
		$args = [];
		$render = lesiones_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: lesiones_header
	$headerCode = '';
	if(function_exists('lesiones_header')) {
		$args = [];
		$headerCode = lesiones_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once(__DIR__ . '/header.php'); 
	} else {
		ob_start();
		include_once(__DIR__ . '/header.php');
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: lesiones_footer
	$footerCode = '';
	if(function_exists('lesiones_footer')) {
		$args = [];
		$footerCode = lesiones_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once(__DIR__ . '/footer.php'); 
	} else {
		ob_start();
		include_once(__DIR__ . '/footer.php');
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}