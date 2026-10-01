<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Registro de Estudiantes</title>
    <!-- Bootstrap 5 CSS & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            <i class="fa-solid fa-user-graduate me-2"></i>Sistema de Estudiantes
        </a>
        <span class="navbar-text text-white-50">
            jojoapp_estudiantes | Alwaysdata
        </span>
    </div>
</nav>

<div class="container pb-5">
    <div class="row g-4">
        <!-- Formulario de Registro / Edición -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title mb-0 text-primary" id="formTitle">
                        <i class="fa-solid fa-user-plus me-2"></i>Registrar Estudiante
                    </h5>
                </div>
                <div class="card-body">
                    <form id="studentForm">
                        <input type="hidden" id="student_id" name="id" value="">
                        
                        <div class="mb-3">
                            <label for="nombre" class="form-label font-weight-bold">Nombre Completo <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej: Juan Pérez" required>
                        </div>

                        <div class="mb-3">
                            <label for="edad" class="form-label">Edad <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="edad" name="edad" min="1" max="120" placeholder="Ej: 22" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="estudiante@correo.com">
                        </div>

                        <div class="mb-3">
                            <label for="carrera" class="form-label">Carrera / Programa</label>
                            <input type="text" class="form-control" id="carrera" name="carrera" placeholder="Ej: Ingeniería de Sistemas">
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary" id="btnSubmit">
                                <i class="fa-solid fa-save me-1"></i> Guardar Estudiante
                            </button>
                            <button type="button" class="btn btn-outline-secondary d-none" id="btnCancel" onclick="resetForm()">
                                <i class="fa-solid fa-xmark me-1"></i> Cancelar Edición
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tabla y Controles -->
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <h5 class="card-title mb-0 text-secondary">
                        <i class="fa-solid fa-list me-2"></i>Lista de Estudiantes
                    </h5>
                    <a href="../actions/exportar_excel.php" class="btn btn-success btn-sm fw-bold">
                        <i class="fa-solid fa-file-excel me-1"></i> Exportar a Excel
                    </a>
                </div>
                <div class="card-body">
                    <!-- Búsqueda -->
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="fa-solid fa-search text-muted"></i></span>
                            <input type="text" id="searchInput" class="form-control border-start-0" placeholder="Buscar por nombre, correo o carrera...">
                        </div>
                    </div>

                    <!-- Alert dinámico -->
                    <div id="alertBox"></div>

                    <!-- Tabla -->
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Edad</th>
                                    <th>Correo</th>
                                    <th>Carrera</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="studentsTableBody">
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">Cargando estudiantes...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>
