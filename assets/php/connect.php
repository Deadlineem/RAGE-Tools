<?php
// ============================================================
// Credentials
// ============================================================
define('DB_HOST', 'localhost');
define('DB_USER', 'your_username');
define('DB_PASS', 'your_password');
define('DB_CHARSET', 'utf8mb4');


// ============================================================
// Native databases (unchanged behavior)
// ============================================================
$databases = [
	'rdr' => [
        'name'  => 'rdr_nativedb',
        'table' => 'rdr_natives',
    ],
    'rdr3' => [
        'name'  => 'rdr3_nativedb',
        'table' => 'rdr3_natives',
    ],
	'gta4' => [
        'name'  => 'gta4_nativedb',
        'table' => 'gta4_natives',
    ],
    'gta5' => [
        'name'  => 'gta5_nativedb',
        'table' => 'gta5_natives',
    ],
    'mp3' => [
        'name'  => 'mp3_nativedb',
        'table' => 'mp3_natives',
    ],
	'mncla' => [
        'name'  => 'mncla_nativedb',
        'table' => 'mncla_natives',
    ],
];

// ------------------------------------------------------------
// Detect which native DB to use based on the current script
// ------------------------------------------------------------
function getCurrentDB() {
    $script = basename($_SERVER['PHP_SELF'], '.php');

    $scriptMap = [
        'rdr3' => 'rdr3',
        'rdr'  => 'rdr',
        'gta4' => 'gta4',
        'mp3'  => 'mp3',
        'gta5'  => 'gta5',
		'mncla'  => 'mncla',
    ];

    foreach ($scriptMap as $scriptName => $dbKey) {
        if (strpos($script, $scriptName) !== false) {
            return $dbKey;
        }
    }

    return 'rdr3';
}

// ------------------------------------------------------------
// Get a native DB connection with table selection
// ------------------------------------------------------------
function getDBConnection($dbKey = null) {
    global $databases;

    if ($dbKey === null) {
        $dbKey = getCurrentDB();
    }

    if (!isset($databases[$dbKey])) {
        throw new Exception("Database configuration not found for: " . $dbKey);
    }

    $dbName = $databases[$dbKey]['name'];

    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . $dbName . ";charset=" . DB_CHARSET;
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        $pdo->tableName = $databases[$dbKey]['table'];
        $pdo->dbKey     = $dbKey;
        return $pdo;
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
}

// ------------------------------------------------------------
// Helpers
// ------------------------------------------------------------
function getTableName($pdo = null) {
    global $pdo;

    if ($pdo === null) {
        $pdo = getDBConnection();
    }

    return $pdo->tableName ?? 'rdr3_natives';
}

function getDBWithTable() {
    $pdo = getDBConnection();
    return [
        'pdo'   => $pdo,
        'table' => $pdo->tableName,
        'dbKey' => $pdo->dbKey,
    ];
}

function switchDatabase($dbKey) {
    global $pdo;
    $pdo = getDBConnection($dbKey);
    return $pdo;
}

// ============================================================
// Global connections
// ============================================================
// $pdo      -> native DB (rdr3 or gta5, auto-detected)
// $auth_pdo -> RageTools website DB (users, sessions, comments, etc.)
try {
    $pdo      = getDBConnection();
} catch (Exception $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>