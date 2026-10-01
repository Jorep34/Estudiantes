<?php
header('Content-Type: application/json; charset=utf-8');
require_once dirname(__DIR__, 2) . '/config/database.php';

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;

if ($id <= 0) {
    echo json_encode(['status' => 'error', 'message' => 'ID inválido.']);
    exit;
}

try {
    $db = getDB();
    $stmt = $db->prepare("DELETE FROM estudiantes WHERE id = ?");
    $stmt->execute([$id]);
    echo json_encode(['status' => 'success', 'message' => 'Estudiante eliminado con éxito.']);
} catch (Exception $e) {
    error_log('Could not delete student: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'No fue posible eliminar el estudiante.']);
}
