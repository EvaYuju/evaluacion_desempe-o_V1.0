# 📊 Evaluación de Desempeño - Laravel

## Descripción
Este es un sistema de evaluación del desempeño basado en **Laravel**, diseñado para gestionar usuarios, encuestas y respuestas. Cuenta con tres tipos de roles:
- **Super Admin**: Puede administrar todo el sistema.
- **Admin**: Gestiona encuestas y usuarios.
- **Usuario**: Responde encuestas y visualiza resultados.

## Tecnologías Utilizadas
- **Laravel** (Backend y lógica de negocio)
- **Blade + Bootstrap** (Frontend)
- **Livewire** (Interactividad)
- **MySQL/MariaDB** (Base de datos)
- **PHP 8+**

## Instalación
### 1. Clonar el Repositorio
```bash
git clone https://github.com/TU_USUARIO/TU_REPOSITORIO.git
cd TU_REPOSITORIO
```
### 2. Configurar el Entorno
```bash
cp .env.example .env
```
Edita `.env` y configura la base de datos:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=evaluacion_desempeno
DB_USERNAME=root
DB_PASSWORD=
```
### 3. Instalar Dependencias
```bash
composer install
npm install && npm run dev
```
### 4. Generar Clave de Aplicación
```bash
php artisan key:generate
```
### 5. Migrar la Base de Datos y Crear Datos Iniciales
```bash
php artisan migrate --seed
```
### 6. Iniciar el Servidor Local
```bash
php artisan serve
```
Abre en el navegador: `http://127.0.0.1:8000`

## Estructura del Proyecto
```
/resources/views/
  ├── layouts/        # Plantillas generales
  ├── users/          # Vistas CRUD de usuarios
  ├── surveys/        # Vistas CRUD de encuestas
  ├── questions/      # Vistas CRUD de preguntas
  ├── answers/        # Vistas CRUD de respuestas
  ├── options/        # Opciones de respuesta
```

## Rutas Principales (web.php)
```php
Route::resource('centers', CenterController::class);
Route::resource('users', UserController::class);
Route::resource('surveys', SurveyController::class);
Route::resource('survey_users', SurveyUserController::class);
Route::resource('scales', ScaleController::class);
Route::resource('questions', QuestionController::class);
Route::resource('answers', AnswerController::class);
Route::resource('options', OptionController::class);
```

## Roles y Permisos
| Rol         | Permisos |
|------------|----------|
| **Super Admin** | CRUD completo en todas las entidades |
| **Admin** | CRUD en encuestas y usuarios |
| **Usuario** | Solo puede responder encuestas |

## Contribuciones
1. **Fork** el repositorio  
2. **Clona** tu fork  
3. Crea una **rama** (`git checkout -b feature-nueva`)  
4. Realiza cambios y **haz commit** (`git commit -m "Agrega nueva funcionalidad"`)  
5. **Sube** la rama (`git push origin feature-nueva`)  
6. Abre un **Pull Request**

## Licencia
MIT License © 2024 - TuNombre

## Contacto
Si tienes dudas o sugerencias, contáctame en **[TuCorreo@ejemplo.com](mailto:TuCorreo@ejemplo.com)**