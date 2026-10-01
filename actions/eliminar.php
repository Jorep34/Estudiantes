<?php
header('Content-Type: application/json; charset=utf-8');
require_once '../config/database.php';

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
    echo json_encode(['status' => 'error', 'message' => 'Error al eliminar: ' . $e->getMessage()]);
}
