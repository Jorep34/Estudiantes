# Sistema de Registro de Estudiantes

Aplicación PHP y MySQL para registrar, buscar, editar y eliminar estudiantes, con exportación CSV compatible con Excel.

## Base de datos

1. Crea la base `jojoapp_estudiantes` en Alwaysdata.
2. Importa `database.sql` desde phpMyAdmin.
3. Configura estas variables de entorno para PHP en el hosting:

   - `DB_HOST`: host MySQL de Alwaysdata
   - `DB_NAME`: nombre de la base de datos
   - `DB_USER`: usuario MySQL
   - `DB_PASS`: contraseña del usuario MySQL

La app lee estas variables en `config/database.php`. La configuración se guarda en `config/`, fuera de `public/`.

## Sitio en Alwaysdata

Configura la raíz del sitio `jojoapp.alwaysdata.net` como `www/public`. El workflow sincroniza el repositorio completo a `www/`, de modo que la API queda en `www/public/actions/` y la configuración en `www/config/`.

## Despliegue desde GitHub Actions

En el repositorio, crea estos GitHub Actions Secrets:

- `FTP_SERVER`: servidor FTP/FTPS de Alwaysdata
- `FTP_USERNAME`: usuario FTP
- `FTP_PASSWORD`: contraseña FTP

Cada push a `main` sincroniza los archivos a Alwaysdata. No pongas contraseñas de MySQL o FTP en el código.
