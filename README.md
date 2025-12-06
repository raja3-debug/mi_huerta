Mi Huerta 
Descripción del proyecto

Mi Huerta es una aplicación web para gestionar cultivos, incluyendo alta de nuevos cultivos, listado y cálculo del ciclo de cultivo.
Esta fase del proyecto se centra en mejoras de seguridad y buenas prácticas en el código PHP y la base de datos.

Fase 2 – Mejoras aplicadas

Credenciales fuera del código fuente

Todas las credenciales de la base de datos se guardan en un archivo .env.

.env no se sube a GitHub gracias a .gitignore, protegiendo usuarios y contraseñas.

Se incluye .env.example con valores genéricos para que otros desarrolladores configuren su entorno local.
Sentencias preparadas (Prepared Statements)

Todas las consultas que usan datos de usuario ($_POST) se hacen con mysqli_prepare() + bind_param().

Esto evita inyección SQL, la vulnerabilidad número 1 en aplicaciones web según OWASP.

Separación de responsabilidades

Lógica de negocio (funciones puras) en la carpeta logic/.

Scripts como index.php, nuevo.php o procesar.php solo coordinan la lógica y la vista.

Facilita mantenimiento y pruebas.

Manejo seguro de errores

Los errores se registran con error_log().

Los usuarios solo ven mensajes genéricos de éxito o fallo.

Se evita mostrar información sensible como estructura de BD o rutas del servidor.

Comentarios estratégicos

Se añadieron comentarios en cambios clave para explicar:

Uso de sentencias preparadas

Separación de lógica

Manejo seguro de errores

Uso de .env
Estructura de archivos (Fase 2)
mi-huerta/
├── .env                 ← credenciales locales (no subir)
├── .env.example         ← plantilla genérica
├── .gitignore           ← incluye .env
├── config/
│   └── db.php           ← conexión segura usando .env
├── logic/
│   ├── cultivos.php     ← funciones puras
│   └── riego.php
├── index.php            ← listado seguro de cultivos
├── nuevo.php            ← formulario de nuevo cultivo
├── procesar.php         ← inserción segura usando prepared statements
└── README.md
Tecnologías usadas
PHP
MySQL 
HTML5 / CSS3

Facilita la comprensión del código y la corrección.
