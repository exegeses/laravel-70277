# FormRequest

> Tenemos la clase llamada **FormRequest** que permiten separar la lógica de validación de datos (validación, mensajes de errores, autorización de usuarios y redirección en caso de fallar) de la lógica del controlador.  
> Esta clase intercepta la solicitud o request y valida los datos que vienen de una petición HTTP antes de pasar al controlador.

## Creación de un FormRequest
> Para crear una clase Form Request se ejecuta en la consola:

    php artisan make:request NombreRequest  

> Como por ejemplo:

    php artisan make:request ProductCreateRequest  

>> Se creará un nuevo archivo en /app/Http/Requests/ProductCreateRequest.php

----

## Personalización

>> El método **rules()** devuelve un array con las reglas de validación que serán aplicadas.  
>> El método **messages()** encargado de retornar un array con pares atributo.regla para personalizar los mensajes de error de validación  
>> El método **attributes()** con el que podemos sobrescribir o personalizar el nombre de los atributos validados al mostrar el mensaje de error  

>> El atributo **protected $redirect** para asignar un URI  
>> El atributo **protected $redirectRoute** para asignar una ruta   
>> El atributo **protected $redirectAction** para asignar una acción de un controlador.  

## Uso de un FormRequest

> Después de crear y definir nuestro FormRequest 
> para usarlo en el controlador tan solo cambiamos el tipo de dato (typehint)
> Request $request en la declaración del método del controlador 
> por el nombre de la clase FormRequest (sin olvidar importarla)

    <?php  
    
    namespace App\Http\Controllers;  
    
    use App\Http\Requests\ProductCreateRequest;  
    
    class ProductController extends Controller  
    {  
        public function store(ProductCreateRequest $request)  
        {  
            //powercode    
        }  
    }  

## ¿Cuándo usar un FormRequest?
> El uso de FormRequest depende la complejidad del proyecto, 
> no necesitamos implementarlo con todas las validaciones 
> sino que debemos tomarlo en cuenta como alternativa al 
> método **validate()** 
> o el Façade **Validator** disponibles desde el controlador.  

> En casos donde tengamos más de 4 o 5 campos que validar, 
> necesitemos major reutilización de la validación, 
> o necesitemos personalizar varios mensajes, nombres de atributo, redirección, etc.   

> Para validaciones estándares de 4 campos o menos, 
> definitivamente recomendamos usar 
> el método **validate()** y **mantener el código simple**.


