<?php
header('Content-Type: application/json; charset=utf-8');
require_once '../config/database.php';

try {
    $db = getDB();
    $stmt = $db->query("SELECT * FROM estudiantes ORDER BY id DESC");
    $estudiantes = $stmt->fetchAll();
    echo json_encode(['status' => 'success', 'data' => $estudiantes]);
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Error al obtener estudiantes: ' . $e->getMessage()]);
}
