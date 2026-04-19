 TPE
Trabajo practico tienda web 2


 Integrantes:
- Thomas Arnaiz- thomas1122arna@gmail.com
- Ivan Lopez - ivanlopezs13@hotmail.com

Descripción:
El sistema representa una tienda de ropa donde se almacenan productos y sus respectivos talles. Permite registrar prendas con su nombre, precio y talle asociado.

Modelo de Datos:

El modelo está compuesto por las siguientes entidades:

 Ropa:
- ropa_id (clave primaria)
- nombre
- precio
- talle_id (clave foránea)

 Talles:
- talle_id (clave primaria)
- nombre_talle

 Relaciones:
- Cada prenda (ropa) tiene un talle asociado
- Un talle puede estar asociado a múltiples prendas


 Diagrama Entidad-Relación (DER):

El modelo de datos está compuesto por dos entidades principales: ROPA y TALLES.

 ROPA:

Representa las prendas de la tienda.
Tiene los siguientes atributos:

ropa_id: identificador único de cada prenda (clave primaria)
nombre: nombre de la prenda
precio: valor de la prenda
talle_id: referencia al talle de la prenda (clave foránea)

 TALLES:

Representa los distintos talles disponibles.
Tiene los siguientes atributos:

talle_id: identificador único del talle (clave primaria)
nombre_talle: nombre del talle (por ejemplo: S, M, L)

Relación entre las entidades:

Existe una relación entre TALLES y ROPA de tipo:

Uno a Muchos, esto significa que:

Un talle puede estar asociado a muchas prendas
Cada prenda tiene un único talle.
