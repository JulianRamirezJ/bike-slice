# Bike Slice

# 1. Aquí podrá encontrar la información del proyecto (Wiki):
    https://github.com/JulianRamirezJ/bike-slice/wiki/Pagina-Principal

# 2. Para visualizar y hacer uso del proyecto ingrese a la página de bikeslice y creese una cuenta, lo que le 
permitirá utilizar las funcionalidades de un usuario normal.

De la misma manera si quiere acceder como administrador, puede utilizar las siguientes credenciales:
 - Correo: dcorreab@eafit.edu.co
 - Contraseña: 12345678
 
La página la puede acceder a través del enlace ( bikeslice.shop ) 



# 3. Lanzamiento del proyecto 

## Lanzamiento local sin docker

Para lanzar el proyecto debe asegurar primero que todo que se tengan todas las dependencias de laravel instaladas.

De igual modo debe tener livewire instalado.

Finalmente es muy importante que tenga Apache y MySQL instalados.

A continuación como lanzar el proyecto por primera vez:

- Ya con todo instalado procedemos encender los modulos Apache y MySql.

- Luego vamos al servidor de base de datos que estemos utilizando y creamos una nueva BD llamada bike_slice.

- Posteriormente podemos correr las migraciones con el comando `php artisan migrate`.

- Y finalmente lanzamos el proyecto con `php artisan serve`.

## Lanzamiento en docker 

- Asegurarse de tener docker instalado.

- En caso de querer utilizar su propia base de datos cambiar el .env

- Crear imagen a partir del docker file con el siguiente comando:
```
    sudo docker image build -t laravel-app .
```

- Una vez se tenga la imagen crearemos el contenedor con el siguiente comando
```
    sudo docker container run -d --name laravel-docker -p 80:80 bakuraza/bike-slice
```

- Una vez instanciado el contenedor se podra acceder a la pagina ingresando a <ip maquina>/public

## Descargando imagen desde dockerhub
    
- Asegurarse de tener docker instalado.

- descargar (hacer pull) de la imagen de dockerhub que esta: https://hub.docker.com/r/bakuraza/bike-slice

- Una vez descargada la imagen crearemos el contenedor con el siguiente comando
```
    sudo docker container run -d --name laravel-docker -p 80:80 bakuraza/bike-slice
```
- Una vez instanciado el contenedor se podra acceder a la pagina ingresando a <ip maquina>/public
    
*Tenga en cuenta que esto funciona para un ambiente de desarrollo en Windows, pero
 para despliegue podria cambiar.
 
 # 4. Para ingresar a la pagina ya desplegada utilizar el siguiente link
http://bikeslice.shop/public/
 


