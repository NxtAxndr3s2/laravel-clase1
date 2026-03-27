Comandos Artisan que se usaron 

1. php artisan serve → Inicia el servidor local de Laravel
2. php artisan migrate → Ejecuta las migraciones de la base de datos
3. php artisan make:model → Crea un modelo
4. php artisan make:controller → Crea un controlador
5. php artisan route:list → Muestra todas las rutas del proyecto


El archivo .env contiene variables de entorno como la conexión a la base de datos, claves y configuraciones sensibles. 
La carpeta config/ contiene archivos de configuración del sistema que usan los valores definidos en el .env.
Basicamente el .env es la configuracion de informacion personal y sensible y el config es la configuracion de los frameworks o framework que se vaya a usar


El metodo Route::get() define una rota que responde a solicitudes HTTP tipo GET. y permite acceder a una URL especifica y ejecutar una funcion o retornar una vista