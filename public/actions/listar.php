<?php
header('Content-Type: application/json; charset=utf-8');
require_once dirname(__DIR__, 2) . '/config/database.php';

try {
    $db = getDB();
    $stmt = $db->query("SELECT * FROM estudiantes ORDER BY id DESC");
    $estudiantes = $stmt->fetchAll();
    echo json_encode(['status' => 'success', 'data' => $estudiantes]);
} catch (Exception $e) {
    error_log('Could not list students: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'No fue posible cargar los estudiantes.']);
}
