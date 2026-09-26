<?php

$pdo = new PDO("sqlite:database.sqlite");

$pdo->exec("CREATE TABLE IF NOT EXISTS checks (id INTEGER PRIMARY KEY AUTOINCREMENT, 
    url TEXT NOT NULL, 
    status_code INTEGER, 
    response_time INTEGER,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP)
");

return $pdo;