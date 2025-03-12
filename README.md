# Evaluación del Desempeño con Laravel, Livewire y TailwindCSS

## Descripción
Este proyecto es una herramienta de evaluación del desempeño diseñada para gestionar competencias y realizar evaluaciones a empleados. Se ha desarrollado utilizando Laravel en el backend y Blade en el frontend.

## Tecnologías preferidas
- **Laravel** (Framework PHP para backend)
- **Livewire** (Interactividad sin necesidad de JavaScript)
- **TailwindCSS** (Estilos modernos y personalizables)
- **MySQL** (Base de datos relacional)
- **Laravel PDF** (Generación de informes en PDF)

## Instalación
Sigue estos pasos para instalar el proyecto en tu entorno local:

# Clonar el repositorio
git clone https://github.com/tu-usuario/evaluacion_desempe-o_V1.0.git
cd evaluacion-desempeno

# Instalar dependencias
composer install
npm install && npm run dev

# Configurar la base de datos
cp .env.example .env
php artisan key:generate

# Modificar .env con los datos de conexión a MySQL
php artisan migrate --seed

# Iniciar el servidor
php artisan serve

## Uso ## EN CONSTRUCCIÓN ###
1. **Accede al sistema:** Dirígete a `http://localhost:8000`.
2. **Crea un administrador:** Regístrate como usuario administrador para gestionar las evaluaciones.
3. **Gestiona competencias y empleados:** Añade competencias, usuarios y asigna evaluaciones.
4. **Realiza evaluaciones:** Los empleados podrán responder encuestas asignadas.
5. **Genera informes:** Se pueden descargar reportes en PDF sobre los resultados de las evaluaciones.

## Contribución
Si deseas contribuir al proyecto:
1. Realiza un fork del repositorio.
2. Crea una nueva rama (`git checkout -b feature-nueva`).
3. Realiza tus cambios y confirma (`git commit -m 'Descripción del cambio'`).
4. Envía un pull request.

## Contacto
2025 Eva López
 