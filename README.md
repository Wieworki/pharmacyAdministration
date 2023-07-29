# Alcance del módulo

El sistema permite la gestión de los pedidos de medicamentos que realiza una obra social a las farmacias, cubriendo el trayecto desde que se recibe la orden médica con 
lo que necesita el afiliado, hasta que se le realiza la entrega. El proceso implica la generación, auditoría, envío y confirmación de los pedidos.
El sistema también será capaz de llevar un stock de lo que está disponible.

## Usuarios del sistema

El sistema contará con los siguientes usuarios:
- Operador de carga
- Médico auditor
- Contador
- Farmacéutico

#### Diagrama de casos de uso

![imagen](https://user-images.githubusercontent.com/45775681/199838366-ebb6d98d-c6b5-4eb2-b9d9-f1e937f318ee.png)

### Operador de carga
Encargado de cargar en el sistema lo que recibe está en la orden médica recibida del afiliado. Deberá indicar toda la información pertinente para la auditoría del pedido.
En el caso de los medicamentos que tengan recupero, deberá recibir un aviso por parte del sistema como recordatorio de la información extra que debe pedir al afiliado.
También tendrá la posibilidad de actualizar el listado de medicamentos.
Además, debe poder mantener actualizado el padrón de afiliados a la obra social.

### Médico auditor
Encargado de auditar los pedidos de medicamentos. Si aprueba el pedido, indica el porcentaje del valor que cubrirá la obra social. Puede rechazar un pedido, debieno dar un motivo para el rechazo.

### Contador
Encargado de hacer el pedido de los medicamentos, gestiona los pedidos que hayan sido aprobados para armar las listas que serán enviadas a las farmacias.
Puede exportar las listas en formato de planilla de cálculo y PDF.
Es el encargado de especificar la información de dónde se realizaron los pedidos de los medicamentos, actualizando esta información en el pedido, para que el farmacéutico
sepa de dónde viene, y cuando.

### Farmacéutico
Encargado de recepcionar los medicamentos. Debe indicar cuando se recepcionan los mismos, dando por finalizado el ciclo de vida del pedido. 
Además, es el encargado de mantener actualizado el stock, indicando además cuando se entregan los medicamentos a los afiliados.

## Entidades

### Afiliado
Afiliado que realiza el pedido de medicamentos. La entidad cuenta con los siguientes campos:

- ID
- Nombre
- Apellido
- DNI
- Observaciones

### Sexo
La entidad cuenta con los siguientes campos:

- ID
- Denominación

### Pedido farmacia
Entidad compuesta, contiene el listado de todos los productos y las personas que los pidieron. Tendrá asociado un detalle. Cuenta con los siguientes atributos:

- ID
- Documento_afiliado
- Nombre_afiliado
- Fecha_validez
- Fecha_recepcion
- Patología
- Médico
- Estado

#### Diagrama de flujo de un pedido


```mermaid
graph LR;
    Creación-->Se_audita;
    Creación-->Se_autoriza_autom;
    Se_autoriza_autom-->Se_envia;
    Se_audita-->Se_envia;
    Se_audita-->Se_rechaza;
    Se_envia-->Se_recibe;
```

#### Diagrama de estados de un pedido

```mermaid
stateDiagram
    direction LR
    [*] --> Pendiente
    Pendiente --> Aprobado
    Pendiente --> Rechazado
    Aprobado --> Enviado
    Enviado --> Recibido
```

### Detalle pedido
Entidad débil, contenida con por el pedido de farmacia. Contiene la información de 1 item pedido de 1 afliado. 
Cuenta con:

- Id
- Id_pedido
- Id_item
- Cantidad
- Observaciones


### Estado pedido
Cuenta con:

- Id
- Nombre

### Medicamento
Tipo de item. Cuenta con:

- ID
- Marca: nombre comercial del medicamento
- Presentación: blister, pastilla, jarabe, etc
- id_principio_activo
- id_laboratorio
- Recupero (bool)
- Cobertura_diabetes (bool)
- Cobertura_discapacidad (bool)
- Cobertura_anticonceptiva (bool)
- Cobertura_70 (bool)
- Cobertura_oncologica (bool)
- Tope_anual
- Tope_mensual

### Laboratorio
Cuenta con:

- ID
- Nombre

### Principio activo
ingrediente principal de un medicamento, responsable del efecto deseado. Cuenta con:

- ID
- Nombre

### Productos varios
Todo lo que no sea un medicamento que administre la farmacia, como leches, pañales, etc. Cuenta con:

- ID
- Nombre

### Usuario

- ID
- Nombre
- Estado
- Rol
- Password

### Rol

- ID
- Nombre

## Base de Datos
