# ReSaleB (Eduardo Rocha, Eneko García, Gorka Crespo)

Este proyecto trata sobre el desarrollo de una página web usando HTML, CSS, JavaScript, PHP, MariaDB y Docker.
En este caso hemos decidido que la temática sea de una página de compra-venta de entradas de discotecas.

1.Situarse en el directorio:
```
$ cd docker-lamp
```
2.Construir la imagen web:
```
$ sudo docker build -t="web" .
```
3.Introducir el siguiente comando para iniciar el contenedor:
```
$ sudo docker-compose up
```
4.Acceder a la página de PHPMyAdmin donde habrá que importar la base de datos **database.sql**:
```
http://localhost:8890/
```
5.Una vez en PHPMyAdmin iniciar sesión con Usuario: "admin" Contraseña: "test", después hacer click en database e importar la base de datos **database.sql**.
```
6.Después de realizar todos los pasos hay que introducir la siguiente dirección para acceder a la página web:
```
http://localhost:81/
```
## Uso de la página
En la página principal, se encuentra una breve descripción de nuestra web, arriba a mano derecha un despliege donde puedes iniciar y cerrar sesión y debajo de la introducción, un listado de discoctecas disponibles. Si hacemos click en una de ellas nos lleva a un listado de entradas posibles, donde puedes añadir tu entrada o comprar una de otro usuario. Para hacer esto, es necesario iniciar sesión.
