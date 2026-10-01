<?php
// Configure these values in the hosting environment. Never commit passwords.
define('DB_HOST', getenv('DB_HOST') ?: 'mysql-jojoapp.alwaysdata.net');
define('DB_NAME', getenv('DB_NAME') ?: 'jojoapp_estudiantes');
define('DB_USER', getenv('DB_USER') ?: 'jojoapp');
define('DB_PASS', getenv('DB_PASS') ?: '3108787231Jc.');
define('DB_CHARSET', 'utf8mb4');

function getDB() {
    static $pdo = null;
    if ($pdo === null) {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (PDOException $e) {
            http_response_code(500);
            error_log('Database connection failed: ' . $e->getMessage());
            echo json_encode(['status' => 'error', 'message' => 'No fue posible conectar con la base de datos.']);
            exit;
        }
    }
    return $pdo;
}
