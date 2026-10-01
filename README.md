# 🎓 Sistema de Registro de Estudiantes (PHP + MySQL + Excel)

Aplicación web para gestión de estudiantes con almacenamiento en MySQL y exportación directa a Excel/CSV. Desarrollada para despliegue en **Alwaysdata** y repositorios de **GitHub**.

## 🚀 Características
- **CRUD Completo**: Crear, listar, editar y eliminar estudiantes.
- **Búsqueda Dinámica**: Filtro en tiempo real con JavaScript.
- **Exportación a Excel**: Generación de reportes descargables en CSV/Excel con codificación UTF-8 BOM.
- **Responsive Design**: Interfaz limpia estilizada con Bootstrap 5 y FontAwesome.
- **Arquitectura Limpia**: Separación de lógica backend (PHP/PDO), base de datos y frontend (AJAX/JS).

---

## 🗄️ Configuración de Base de Datos (Alwaysdata)

1. Ingresa a tu panel de **Alwaysdata** -> **Databases** -> **MySQL**.
2. Asegúrate de tener creada la base de datos: `jojoapp_estudiantes`.
3. Abre **phpMyAdmin** e importa o ejecuta el script SQL ubicado en `database.sql`:

```sql
CREATE TABLE IF NOT EXISTS estudiantes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    edad INT NOT NULL,
    email VARCHAR(150) NULL,
    carrera VARCHAR(100) NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

4. Edita el archivo `config/database.php` con la contraseña de tu usuario MySQL de Alwaysdata:

```php
define('DB_HOST', 'mysql-jojoapp.alwaysdata.net');
define('DB_NAME', 'jojoapp_estudiantes');
define('DB_USER', 'jojoapp');
define('DB_PASS', 'TU_CONTRASEÑA_AQUI');
```

---

## 🌐 Despliegue en Alwaysdata

1. Ve al panel de Alwaysdata -> **Web** -> **Sites**.
2. En la raíz de tu sitio o subdominio, apunta el directorio hacia `public/` (ej: `/www/public` o `/registro-estudiantes/public`).
3. Sube los archivos del proyecto vía FTP/SFTP o Git.

---

## 🐙 Subir a GitHub

```bash
git init
git add .
git commit -m "Initial commit - Registro de Estudiantes"
git branch -M main
git remote add origin https://github.com/TU_USUARIO/registro-estudiantes.git
git push -u origin main
```
