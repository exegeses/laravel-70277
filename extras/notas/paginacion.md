# Paginado de registros con Laravel

Laravel vienen con un sistema de paginado de registros integrado.  
Para implementarlo tenemos la clase ***Paginator*** con los métodos ***simplePaginate()*** y ***paginate()***  

## Usando Bootstrap 5

De manera predeterminada, Laravel utiliza TailwindCSS para todo el frontend. Pero si queremos utilizar Bootstrap 5 lo podemos hacer. 

> Debemos configurar en el AppServiceProvider el método Paginator::useBootstrapFive();  


## Exportación de vistas + traducción

> Si queremos personalizar la vista del paginado, debemos exportar el archivo ***bootstrap-5.blade.php***  

> La manera automática de lograr esto es mediante el comando:   

    php artisan vendor:publish --tag=laravel-pagination  

> Este comando copia el archivo ***bootstrap-5.blade.php***  
> desde directorio  
[vendor/laravel/framework/src/Illuminate/Pagination/resources/views]   
al directorio  
[resources/views/vendor/pagination]  

> Sólo nos queda personalizar a nustro gusto la vista del paginador de registros   
