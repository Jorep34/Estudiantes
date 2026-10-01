# Registro de Estudiantes

Aplicación web desarrollada en Python + Flask para registrar estudiantes y almacenar la información en un archivo Excel.

## Funcionalidades

- Registro de nombre y edad.
- Validación de datos.
- Generación automática del archivo `data/estudiantes.xlsx`.
- Listado de estudiantes registrados.
- Eliminación de registros.
- Contador de estudiantes.
- Diseño adaptable a computador y celular.
- Endpoint `/salud` para comprobar que la aplicación está funcionando.
- Preparada para GitHub y despliegues con Gunicorn.

## Requisitos

- Python 3.10 o superior.
- pip.

## Instalación local

```bash
python -m venv .venv
```

### Windows

```bash
.venv\Scripts\activate
```

### Linux/macOS

```bash
source .venv/bin/activate
```

Instalar dependencias:

```bash
pip install -r requirements.txt
```

Ejecutar:

```bash
python app.py
```

Abrir en el navegador:

```text
http://127.0.0.1:5000
```

## Estructura

```text
registro-estudiantes/
├── app.py
├── requirements.txt
├── Procfile
├── README.md
├── .gitignore
├── templates/
│   └── index.html
├── static/
│   ├── css/
│   │   └── style.css
│   └── js/
│       └── app.js
└── data/
    └── estudiantes.xlsx
```

## GitHub

Desde la carpeta del proyecto:

```bash
git init
git add .
git commit -m "Proyecto inicial registro de estudiantes"
git branch -M main
git remote add origin https://github.com/TU-USUARIO/TU-REPOSITORIO.git
git push -u origin main
```

## AlwaysData

Este proyecto usa Flask y Gunicorn. En un servidor AlwaysData debes configurar:

- El entorno Python.
- Las dependencias de `requirements.txt`.
- El comando de inicio mediante Gunicorn:
  `gunicorn app:app`
- El directorio raíz del proyecto.
- El dominio o subdominio que quieras utilizar.

### Importante sobre Excel

El archivo Excel funciona bien para un proyecto académico o con pocos usuarios. Para una aplicación pública con varios usuarios simultáneos, es recomendable migrar el almacenamiento a SQLite o MySQL y usar Excel como formato de exportación.

## Seguridad

Antes de publicar:

1. Cambia `app.secret_key` por una clave secreta propia.
2. No guardes contraseñas, documentos de identidad u otros datos sensibles en este proyecto sin implementar las medidas de seguridad correspondientes.
3. No subas credenciales ni secretos al repositorio.

## Licencia

Proyecto académico.
