<?php
require_once '../config/database.php';

try {
    $db = getDB();
    $stmt = $db->query("SELECT id, nombre, edad, email, carrera, fecha_registro FROM estudiantes ORDER BY id ASC");
    $estudiantes = $stmt->fetchAll();

    // Configurar cabeceras para descarga de archivo Excel CSV con compatibilidad UTF-8 BOM
    $filename = "estudiantes_" . date('Y-m-d_H-i') . ".csv";
    
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    
    $output = fopen('php://output', 'w');
    
    // Escribir UTF-8 BOM para abrir correctamente en Microsoft Excel
    fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
    
    // Encabezados de la tabla Excel
    fputcsv($output, ['ID', 'Nombre Completo', 'Edad', 'Correo Electrónico', 'Carrera', 'Fecha de Registro'], ';');
    
    foreach ($estudiantes as $e) {
        fputcsv($output, [
            $e['id'],
            $e['nombre'],
            $e['edad'],
            $e['email'] ?? '',
            $e['carrera'] ?? '',
            $e['fecha_registro']
        ], ';');
    }
    
    fclose($output);
    exit;
} catch (Exception $e) {
    die("Error al generar el archivo Excel: " . $e->getMessage());
}
