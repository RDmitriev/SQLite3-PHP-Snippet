<?
	/*
		SQLite3-PHP-Snippet
		https://github.com/RDmitriev/SQLite3-PHP-Snippet
	*/
	
	// datatypes
	// NULL, INTEGER, REAL, TEXT, BLOB
	
	// path
	$db = $_SERVER['DOCUMENT_ROOT'] . '/db.sqlite';
	
	// check install
	if(file_exists($db)) die('Install complete');
	
	// create or open db
	$db = new SQLite3($db);
	
	// create table
	$db->query('CREATE TABLE "users" (
		"id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
		"email" TEXT,
		"hash" TEXT,
		"group" INTEGER,
		date TEXT DEFAULT CURRENT_TIMESTAMP
	)');
	
	// insert
	$result = $db->query('INSERT INTO "users" (
		"email",
		"hash",
		"group"
	) VALUES (
		"admin@admin.com",
		"' . password_hash("password", PASSWORD_DEFAULT) . '",
		"1"
	)');
	
	// last insert id
	$lastid = $db->lastInsertRowid();
	
	// update
	$db2->query('UPDATE "users" SET
		"email" = "admin@admin.com"
	WHERE 
		"id" = "' . $lastid . '"
	');
	
	// select single
	$result = $db->querySingle('SELECT *
		FROM "users"
		WHERE "email" = "' . $_POST['email'] . '"
	', true);
	
	// select multiple
	$result = $db->query('SELECT * FROM "users" LIMIT 999999');
	while($row = $result->fetchArray(SQLITE3_ASSOC)){
		var_dump($row);
	}
	
	//delete
	$db->query('DELETE FROM "users" WHERE "id" = ' . $lastid);
?>