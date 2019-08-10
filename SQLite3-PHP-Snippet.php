<?
	/*
		SQLite3-PHP-Snippet
		https://github.com/RDmitriev/SQLite3-PHP-Snippet
	*/
	
	// datatypes
	// NULL, INTEGER, REAL, TEXT, BLOB
	
	// path
	$db = dirname(__FILE__) . '/db.sqlite';
	
	// check install
	if(file_exists($db)) die('Install complete');
	
	// create or open db
	$db = new SQLite3($db);
?>