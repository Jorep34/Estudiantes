<?php
header('Content-Type: application/json; charset=utf-8');
require_once dirname(__DIR__, 2) . '/config/database.php';

$id = isset($_POST['id']) && !empty($_POST['id']) ? intval($_POST['id']) : null;
$nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
$edad = isset($_POST['edad']) ? intval($_POST['edad']) : 0;
$email = isset($_POST['email']) ? trim($_POST['email']) : null;
$carrera = isset($_POST['carrera']) ? trim($_POST['carrera']) : null;

if (empty($nombre)) {
    echo json_encode(['status' => 'error', 'message' => 'El nombre es obligatorio.']);
    exit;
}

if ($edad <= 0 || $edad > 120) {
    echo json_encode(['status' => 'error', 'message' => 'Ingrese una edad válida (1 - 120 años).']);
    exit;
}

try {
    $db = getDB();
    if ($id) {
        // Actualizar
        $stmt = $db->prepare("UPDATE estudiantes SET nombre = ?, edad = ?, email = ?, carrera = ? WHERE id = ?");
        $stmt->execute([$nombre, $edad, $email, $carrera, $id]);
        echo json_encode(['status' => 'success', 'message' => 'Estudiante actualizado con éxito.']);
    } else {
        // Insertar
        $stmt = $db->prepare("INSERT INTO estudiantes (nombre, edad, email, carrera) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nombre, $edad, $email, $carrera]);
        echo json_encode(['status' => 'success', 'message' => 'Estudiante registrado con éxito.']);
    }
} catch (Exception $e) {
    error_log('Could not save student: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'No fue posible guardar el estudiante.']);
}
