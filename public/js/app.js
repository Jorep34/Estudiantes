document.addEventListener('DOMContentLoaded', () => {
    loadStudents();

    document.getElementById('studentForm').addEventListener('submit', handleFormSubmit);
    document.getElementById('searchInput').addEventListener('input', filterStudents);
});

let allStudents = [];

function loadStudents() {
    fetch('/actions/listar.php')
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                allStudents = data.data;
                renderTable(allStudents);
            } else {
                showAlert(data.message, 'danger');
            }
        })
        .catch(err => {
            console.error(err);
            showAlert('Error al conectar con el servidor.', 'danger');
        });
}

function renderTable(students) {
    const tbody = document.getElementById('studentsTableBody');
    tbody.innerHTML = '';

    if (students.length === 0) {
        tbody.innerHTML = `<tr><td colspan="6" class="text-center text-muted py-4">No se encontraron estudiantes registrados.</td></tr>`;
        return;
    }

    students.forEach((s, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${index + 1}</td>
            <td class="fw-bold">${escapeHtml(s.nombre)}</td>
            <td><span class="badge bg-info text-dark">${s.edad} años</span></td>
            <td>${s.email ? escapeHtml(s.email) : '<span class="text-muted">-</span>'}</td>
            <td>${s.carrera ? escapeHtml(s.carrera) : '<span class="text-muted">-</span>'}</td>
            <td class="text-center">
                <button class="btn btn-warning btn-sm me-1" onclick="editStudent(${s.id})" title="Editar">
                    <i class="fa-solid fa-pen-to-square"></i>
                </button>
                <button class="btn btn-danger btn-sm" onclick="deleteStudent(${s.id})" title="Eliminar">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </td>
        `;
        tbody.appendChild(row);
    });
}

function handleFormSubmit(e) {
    e.preventDefault();
    const formData = new FormData(this);

    fetch('/actions/guardar.php', {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === 'success') {
            showAlert(data.message, 'success');
            resetForm();
            loadStudents();
        } else {
            showAlert(data.message, 'danger');
        }
    })
    .catch(err => {
        console.error(err);
        showAlert('Error al guardar datos.', 'danger');
    });
}

function editStudent(id) {
    const student = allStudents.find(s => s.id == id);
    if (!student) return;

    document.getElementById('student_id').value = student.id;
    document.getElementById('nombre').value = student.nombre;
    document.getElementById('edad').value = student.edad;
    document.getElementById('email').value = student.email || '';
    document.getElementById('carrera').value = student.carrera || '';

    document.getElementById('formTitle').innerHTML = `<i class="fa-solid fa-user-pen me-2"></i>Editar Estudiante`;
    document.getElementById('btnSubmit').innerHTML = `<i class="fa-solid fa-rotate me-1"></i> Actualizar Estudiante`;
    document.getElementById('btnCancel').classList.remove('d-none');
}

function resetForm() {
    document.getElementById('studentForm').reset();
    document.getElementById('student_id').value = '';
    document.getElementById('formTitle').innerHTML = `<i class="fa-solid fa-user-plus me-2"></i>Registrar Estudiante`;
    document.getElementById('btnSubmit').innerHTML = `<i class="fa-solid fa-save me-1"></i> Guardar Estudiante`;
    document.getElementById('btnCancel').classList.add('d-none');
}

function deleteStudent(id) {
    if (!confirm('¿Estás seguro de eliminar este estudiante?')) return;

    const formData = new FormData();
    formData.append('id', id);

    fetch('/actions/eliminar.php', {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === 'success') {
            showAlert(data.message, 'success');
            loadStudents();
        } else {
            showAlert(data.message, 'danger');
        }
    })
    .catch(err => {
        console.error(err);
        showAlert('Error al eliminar estudiante.', 'danger');
    });
}

function filterStudents() {
    const term = document.getElementById('searchInput').value.toLowerCase();
    const filtered = allStudents.filter(s => 
        s.nombre.toLowerCase().includes(term) ||
        (s.email && s.email.toLowerCase().includes(term)) ||
        (s.carrera && s.carrera.toLowerCase().includes(term))
    );
    renderTable(filtered);
}

function showAlert(message, type) {
    const alertBox = document.getElementById('alertBox');
    alertBox.innerHTML = `
        <div class="alert alert-${type} alert-dismissible fade show" role="alert">
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;
}

function escapeHtml(text) {
    return text.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;");
}
