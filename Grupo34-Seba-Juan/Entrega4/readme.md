# Entrega 4 Bases de datos :computer: :floppy_disk: :art: :shipit:

Para hacer este ReadMe me voy a basar en la rúbrica de la entrega (https://github.com/IIC2413/Syllabus-2020-1/tree/master/Proyecto/Entrega4) y también en el enunciado.


## Integrantes:
* Clemente Sepulveda
* Juan Aubele
* Juan Isammit
* Sebastian Villablanca


## Correr la aplicación: :snake:

* Para correr la aplicación en necesario descargar el archivo ``api.zip`` ubicado en la carpeta ``Entrega4`` del grupo 34, descomprimir la carpeta ``api.zip`` y correr desde una terminal en `<pipenv>` con `<python>` el archivo ``main.py``. 


## GET básico :white_check_mark:

* En la ruta `</messages>`se muestran todos los mensajes con todos sus atributos: En la url http://127.0.0.1:5000/messages se muestra lo pedido.

* En la ruta `</users>` se muestran todos los usuarios con todos sus atributos: En la url http://127.0.0.1:5000/users se muestra lo pedido.

* En la ruta `</messages/:id>`, si el id de mensaje existe, se muestra el mensaje con todos sus atributos. Si el id de mensaje NO existe, la app no se cae: En la url http://127.0.0.1:5000/messages/id_mensaje (donde id_mensaje es el id del mensaje) se muestra lo pedido, en caso de que sea un número natural que no está en los mensajes, la api no se cae.

* En la ruta `</users/:id>`, si el id de usuario existe, se muestra el usuario con todos sus atributos. Si el id de usuario NO existe, la app no se cae: En la url http://127.0.0.1:5000/users/id_usuario (donde id_usuario es el id del usuario) se muestra lo pedido, en caso de que sea un número natural que no está en los mensajes, la api no se cae.

* En la ruta `</messages?id1=x&id2=y>`, si ambos id existen, se muestran los mensajes intercambiados entre los usuarios (en ambas direcciones). Si alguno de los id no existe, la app no se cae: En la url http://127.0.0.1:5000/messages?id1=x&id2=y (donde "x" es el id del usuario 1 e "y" es el id del usuario 2) se muestra lo pedido, en caso de que sea un número natural que no está en los mensajes, la api no se cae.
 


## GET Búsqueda de texto :white_check_mark:

* En la ruta  `</messages>`.

* Al realizar una búsqueda sin body o con diccionario vacío se retornan todos los mensajes. Agregando un body con la aplicación postman notamos que sí funciona.

* La búsqueda funciona con cada uno de los 4 criterios por separado: 
    * Desired: Sí se cumple.
    * Required: Sí se cumple.
    * Forbidden: Sí se cumple.
    * UserID: Sí se cumple.

* La búsqueda funciona con no todos los criterios e incluso con algunos como listas vacías.

* La búsqueda funciona con los 4 criterios simultáneamente.


## POST :white_check_mark:

* En la ruta  `</text-search>`.

* Si se entregan todos los atributos, es posible crear un nuevo mensaje. Si no se entregan todos los atributos, el mensaje no se crea y se muestra el atributo erróneo: Si los atributos están correctos, se crea el mensaje, en caso de que un atributo falta, se muestra cuál es el faltante.

## DELETE :white_check_mark:

* En la ruta  `</message/:id>`.

* Es posible eliminar un mensaje existente. Si el ID no existe, la app no se cae: Se pueden eliminar los mensajes con id existente, en caso contrario, tira un mensaje que el id no existe.

