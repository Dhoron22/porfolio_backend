<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Portfolio Backend - Laravel API

Sistema backend desarrollado en Laravel 11 que proporciona una API RESTful para gestionar la información de un portafolio profesional, incluyendo proyectos, habilidades, experiencia laboral, formación académica e idiomas.

## Requisitos del Sistema

El sistema requiere las siguientes dependencias instaladas en el entorno de desarrollo:

- PHP 8.2 o superior
- Composer 2.x
- MySQL 8.0 o superior
- Extensiones PHP necesarias: PDO, Mbstring, OpenSSL, JSON, Tokenizer, XML

## Estructura de la Base de Datos

El sistema gestiona seis entidades principales a través de las siguientes tablas:

### Tabla: personal_infos

Almacena la información personal del propietario del portafolio. Los campos incluyen nombre completo, título profesional, biografía, ubicación, datos de contacto (teléfono y email), enlaces a redes sociales (GitHub y LinkedIn), edad e imagen de perfil. Todos los registros incluyen timestamps de creación y actualización, junto con soft deletes para mantener un historial de cambios.

### Tabla: projects

Gestiona los proyectos realizados. Cada proyecto incluye título, descripción detallada, fechas de inicio y fin, estado actual (en progreso, completado o pausado), tipo de proyecto (personal, académico o profesional), imagen representativa, enlaces a demo y repositorio GitHub, tecnologías utilizadas almacenadas como array JSON, indicador de proyecto destacado y orden de visualización. El sistema calcula automáticamente si un proyecto está activo actualmente, el período de duración y los meses totales invertidos.

### Tabla: skills

Registra las habilidades técnicas, blandas y herramientas. Cada habilidad se categoriza según su tipo (technical, soft o tool), incluye una subcategoría opcional, nivel de competencia del 0 al 100 para habilidades técnicas, icono representativo, descripción, indicador de destacado y orden de visualización. El sistema genera automáticamente etiquetas de nivel de competencia (Básico, Intermedio o Avanzado) basadas en el porcentaje.

### Tabla: education

Almacena la formación académica. Los registros incluyen institución educativa, título obtenido, campo de estudio, descripción del programa, fechas de inicio y fin, indicador de estudio actual, estado (completado, en progreso o pausado), URL del certificado, ubicación de la institución y orden de visualización. El sistema calcula automáticamente el período de estudio.

### Tabla: work_experiences

Gestiona la experiencia laboral profesional. Cada experiencia incluye empresa, cargo ocupado, descripción general, ubicación, fechas de inicio y fin, indicador de empleo actual, responsabilidades almacenadas como array JSON, datos de referencia (nombre y teléfono) y orden de visualización. El sistema calcula el período laboral y la duración en meses.

### Tabla: languages

Registra los idiomas dominados. Para cada idioma se almacena el nombre, nivel de competencia (Nativo, Avanzado, Intermedio o Básico), código de nivel según el Marco Común Europeo (A1 a C2), descripción adicional y orden de visualización. El sistema genera automáticamente el emoji de bandera correspondiente al idioma.

## Instalación y Configuración

### Paso 1: Clonar el Repositorio

Clone el repositorio en su máquina local utilizando Git:
```bash
git clone <url-del-repositorio>
cd portfolio-backend
```

### Paso 2: Instalar Dependencias

Instale todas las dependencias de PHP utilizando Composer:
```bash
composer install
```

### Paso 3: Configurar Variables de Entorno

Copie el archivo de ejemplo de variables de entorno y genere una clave de aplicación:
```bash
cp .env.example .env
php artisan key:generate
```

Edite el archivo .env y configure las credenciales de su base de datos:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```

### Paso 4: Ejecutar Migraciones

Cree todas las tablas necesarias en la base de datos:
```bash
php artisan migrate
```

### Paso 5: Configurar CORS

El sistema ya incluye la configuración necesaria para permitir peticiones desde el frontend Angular. Verifique que el archivo config/cors.php incluya la URL de su aplicación frontend:
```php
'allowed_origins' => ['http://localhost:4200'],
```

El middleware CORS personalizado en app/Http/Middleware/CorsMiddleware.php está configurado para manejar las peticiones OPTIONS y agregar los headers necesarios.

### Paso 6: Configurar Almacenamiento de Imágenes

Cree la estructura de directorios para almacenar las imágenes de perfil:
```bash
mkdir -p public/images/profile
```

Las imágenes deben colocarse en el directorio public/images/profile y serán accesibles a través de la URL http://localhost:8000/images/profile/nombre-imagen.png

### Paso 7: Iniciar el Servidor

Inicie el servidor de desarrollo de Laravel:
```bash
php artisan serve
```

El servidor estará disponible en http://localhost:8000

## Endpoints de la API

El sistema proporciona endpoints RESTful para cada entidad siguiendo la convención de recursos de Laravel.

### Personal Info

El endpoint de información personal retorna un único registro ya que solo existe una persona por portafolio:

- GET /api/personal-info - Obtiene la información personal (retorna objeto, no array)
- POST /api/personal-info - Crea el registro de información personal
- GET /api/personal-info/{id} - Obtiene información personal por ID
- PUT /api/personal-info/{id} - Actualiza información personal
- DELETE /api/personal-info/{id} - Elimina información personal (soft delete)

### Projects

Los endpoints de proyectos permiten gestionar el portafolio de trabajos realizados:

- GET /api/projects - Lista todos los proyectos
- POST /api/projects - Crea un nuevo proyecto
- GET /api/projects/{id} - Obtiene un proyecto específico
- PUT /api/projects/{id} - Actualiza un proyecto
- DELETE /api/projects/{id} - Elimina un proyecto (soft delete)

### Skills

Los endpoints de habilidades gestionan competencias técnicas, blandas y herramientas:

- GET /api/skills - Lista todas las habilidades
- POST /api/skills - Crea una nueva habilidad
- GET /api/skills/{id} - Obtiene una habilidad específica
- PUT /api/skills/{id} - Actualiza una habilidad
- DELETE /api/skills/{id} - Elimina una habilidad (soft delete)

### Education

Los endpoints de formación académica administran los estudios realizados:

- GET /api/education - Lista toda la formación académica
- POST /api/education - Crea un nuevo registro de educación
- GET /api/education/{id} - Obtiene un registro específico
- PUT /api/education/{id} - Actualiza un registro de educación
- DELETE /api/education/{id} - Elimina un registro (soft delete)

### Work Experiences

Los endpoints de experiencia laboral gestionan el historial profesional:

- GET /api/work-experiences - Lista toda la experiencia laboral
- POST /api/work-experiences - Crea un nuevo registro de experiencia
- GET /api/work-experiences/{id} - Obtiene una experiencia específica
- PUT /api/work-experiences/{id} - Actualiza una experiencia
- DELETE /api/work-experiences/{id} - Elimina una experiencia (soft delete)

### Languages

Los endpoints de idiomas administran los lenguajes dominados:

- GET /api/languages - Lista todos los idiomas
- POST /api/languages - Crea un nuevo registro de idioma
- GET /api/languages/{id} - Obtiene un idioma específico
- PUT /api/languages/{id} - Actualiza un idioma
- DELETE /api/languages/{id} - Elimina un idioma (soft delete)

## Validación de Datos

El sistema implementa validación exhaustiva a través de FormRequest classes personalizadas para cada entidad. Las validaciones garantizan la integridad de los datos antes de ser almacenados en la base de datos.

### Validaciones de Personal Info

El sistema valida que el nombre completo sea obligatorio con máximo 255 caracteres, el título profesional sea obligatorio con máximo 255 caracteres, la biografía sea texto sin límite estricto, la ubicación tenga máximo 255 caracteres, el teléfono tenga máximo 20 caracteres, el email sea válido y único, las URLs de GitHub y LinkedIn sean URLs válidas, la edad sea numérica y mayor a 0, y la imagen de perfil sea una cadena que representa la ruta del archivo.

### Validaciones de Projects

Se valida que el título sea obligatorio con máximo 255 caracteres, la descripción sea texto obligatorio, las fechas de inicio y fin sean fechas válidas, el estado sea uno de los valores permitidos (in_progress, completed, paused), el tipo sea uno de los valores permitidos (personal, academic, professional), la imagen sea una cadena que representa la ruta, las URLs sean URLs válidas, las tecnologías sean un array, el campo featured sea booleano, y el orden sea numérico.

### Validaciones de Skills

El sistema requiere que el nombre sea obligatorio con máximo 255 caracteres, la categoría sea uno de los valores permitidos (technical, soft, tool), la subcategoría tenga máximo 100 caracteres, la competencia sea numérica entre 0 y 100 y solo requerida para habilidades técnicas, el icono tenga máximo 50 caracteres, el campo featured sea booleano, y el orden sea numérico.

### Validaciones de Education

Se valida que la institución sea obligatoria con máximo 255 caracteres, el título obtenido sea obligatorio con máximo 255 caracteres, el campo de estudio tenga máximo 255 caracteres, las fechas de inicio y fin sean fechas válidas, el campo current sea booleano, el estado sea uno de los valores permitidos (completed, in_progress, paused), la URL del certificado sea una URL válida, la ubicación tenga máximo 255 caracteres, y el orden sea numérico. Además, el sistema automáticamente establece end_date como null y status como in_progress cuando current es true.

### Validaciones de Work Experiences

El sistema requiere que la empresa sea obligatoria con máximo 255 caracteres, el cargo sea obligatorio con máximo 255 caracteres, las fechas de inicio y fin sean fechas válidas, el campo current sea booleano, las responsabilidades sean un array, el nombre de referencia tenga máximo 255 caracteres, el teléfono de referencia tenga máximo 20 caracteres, y el orden sea numérico. El sistema automáticamente establece end_date como null cuando current es true.

### Validaciones de Languages

Se valida que el nombre sea obligatorio con máximo 100 caracteres, la competencia sea uno de los valores permitidos (Nativo, Avanzado, Intermedio, Basico), el código de nivel tenga máximo 10 caracteres, y el orden sea numérico.

## Características Especiales

### Soft Deletes

Todas las entidades implementan soft deletes, lo que significa que los registros no se eliminan físicamente de la base de datos sino que se marcan como eliminados. Esto permite mantener un historial completo y recuperar información si es necesario.

### Atributos Computados

El sistema genera automáticamente ciertos atributos calculados que son incluidos en las respuestas JSON. Para proyectos se calcula si está actualmente en progreso (is_current), el período de duración en formato legible y la duración en meses. Para habilidades se genera la etiqueta de nivel de competencia. Para educación y experiencia laboral se calcula el período en formato legible. Para idiomas se genera el emoji de bandera correspondiente.

### Scopes de Consulta

El sistema incluye scopes predefinidos en los modelos para facilitar consultas comunes. Los proyectos pueden filtrarse por destacados (featured), actuales (current), completados (completed), académicos (academic) y ordenarse por orden personalizado (ordered). Las habilidades pueden filtrarse por categoría (soft, tools), destacadas (featured), nivel de competencia (byProficiency) y subcategoría. La educación y experiencia laboral pueden filtrarse por registros actuales (current) y ordenarse cronológicamente.

### Gestión de Arrays JSON

Ciertos campos como las tecnologías en proyectos y las responsabilidades en experiencia laboral se almacenan como JSON en la base de datos pero se manejan automáticamente como arrays en PHP gracias a los casts del modelo.

## Estructura del Código

El código backend sigue la arquitectura MVC de Laravel con una organización clara de responsabilidades.

### Modelos (app/Models)

Los modelos definen la estructura de datos, relaciones, atributos computados y scopes. Cada modelo incluye la configuración de fillable para asignación masiva, casts para conversión automática de tipos, appends para incluir atributos computados en JSON, y métodos de scope para consultas reutilizables.

### Controladores (app/Http/Controllers)

Los controladores implementan la lógica de negocio para cada endpoint. Todos siguen el patrón de Resource Controller con los métodos index para listar recursos, show para mostrar un recurso específico, store para crear nuevos recursos, update para actualizar recursos existentes, y destroy para eliminar recursos con soft delete.

### Requests (app/Http/Requests)

Las clases FormRequest encapsulan toda la lógica de validación y autorización. Cada request incluye el método authorize que retorna true permitiendo todas las peticiones, rules que define las reglas de validación, messages que proporciona mensajes de error personalizados en español, y prepareForValidation que ajusta datos antes de validar cuando es necesario.

### Migraciones (database/migrations)

Las migraciones definen la estructura de las tablas de forma versionada. Cada migración incluye el método up para crear la tabla con todos sus campos y restricciones, y el método down para revertir los cambios eliminando la tabla.

### Rutas (routes/api.php)

Las rutas API están definidas usando Route::apiResource que automáticamente crea los seis endpoints REST estándar (index, show, store, update, destroy) para cada recurso.

## Comandos Útiles

Durante el desarrollo y mantenimiento del sistema, los siguientes comandos de Artisan son especialmente útiles:

Para crear una nueva migración utilice php artisan make:migration. Para crear un nuevo modelo con migración simultánea use php artisan make:model -m. Para crear un controlador de recursos utilice php artisan make:controller --resource. Para crear un FormRequest use php artisan make:request.

Para limpiar el caché de configuración ejecute php artisan config:clear. Para limpiar el caché de rutas use php artisan route:clear. Para limpiar todos los caches ejecute php artisan optimize:clear.

Para revertir y ejecutar nuevamente todas las migraciones utilice php artisan migrate:fresh. Para ejecutar migraciones pendientes use php artisan migrate. Para revertir la última migración ejecute php artisan migrate:rollback.

## Resolución de Problemas

### Error de conexión a la base de datos

Verifique que las credenciales en el archivo .env sean correctas, que el servidor MySQL esté ejecutándose, que la base de datos especificada exista, y que el usuario tenga los permisos necesarios.

### Error de CORS

Asegúrese de que el middleware CORS esté registrado en bootstrap/app.php, que la URL del frontend esté en la lista de allowed_origins en config/cors.php, que haya ejecutado php artisan config:clear después de cambiar la configuración, y que haya reiniciado el servidor de Laravel.

### Imágenes no se cargan

Verifique que el directorio public/images/profile exista y tenga permisos de escritura, que la ruta en la base de datos sea correcta (http://localhost:8000/images/profile/nombre.png), que el archivo de imagen exista físicamente en el directorio, y que el servidor de Laravel esté ejecutándose.

### Errores de validación

Revise que los datos enviados cumplan con todas las reglas de validación definidas en el FormRequest correspondiente, que los tipos de datos sean correctos (números como números, arrays como arrays), que los campos obligatorios estén presentes, y que los valores enum coincidan exactamente con los valores permitidos.

## Seguridad

El sistema implementa varias medidas de seguridad. La validación exhaustiva de entrada previene inyección de datos maliciosos. El uso de FormRequests centraliza y estandariza la validación. Los soft deletes permiten recuperación de datos y auditoría. El middleware CORS controla qué orígenes pueden acceder a la API. Laravel sanitiza automáticamente las consultas SQL previniendo inyección SQL.

## Mantenimiento

Para mantener el sistema funcionando correctamente se recomienda realizar backups regulares de la base de datos, monitorear los logs de Laravel en storage/logs, mantener Laravel y sus dependencias actualizadas, revisar y optimizar consultas lentas, y limpiar periódicamente archivos temporales y cache.

## Tecnologías Utilizadas

El sistema está construido con Laravel 11 como framework PHP, MySQL 8 como base de datos relacional, PHP 8.2+ como lenguaje de programación, y Composer como gestor de dependencias.

## Licencia

Este proyecto es de código propietario desarrollado para uso personal como portafolio profesional.
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
