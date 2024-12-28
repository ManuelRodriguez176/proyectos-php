<?php
// Encabezados obligatorios
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// Incluir archivos de conexión y objetos
include_once '../configuracion/configuracion.php';
include_once '../objetos/producto.php';

// Obtener conexión a la base de datos
$conex = new Conexion();
$db = $conex->obtenerConexion();

// Preparar el objeto Producto
$product = new Producto($db);

// Verificar si se recibió un ID en la solicitud
if (isset($_GET['id'])) {
    $product->id = $_GET['id'];

    // Leer los detalles del producto a editar
    $product->readOne();

    if ($product->nombre != null) {
        // Crear el arreglo
        $product_arr = array(
            "id" => $product->id,
            "nombre" => $product->nombre,
            "descripcion" => $product->descripcion,
            "precio" => $product->precio,
            "categoria_id" => $product->categoria_id,
            "categoria_desc" => $product->categoria_desc
        );

        // Asignar código de respuesta - 200 OK
        http_response_code(200);

        // Mostrar en formato JSON
        echo json_encode($product_arr);

        // Ejecutar método de actualización (ejemplo)

        $product->update();

        // Ejecutar método de eliminación (ejemplo)
        $product->delete();
    } else {
        // Producto no encontrado
        http_response_code(404);
        echo json_encode(array("message" => "Producto no encontrado."));
    }
} else {
    // No se proporcionó un ID en la solicitud
    http_response_code(400);
    echo json_encode(array("message" => "Solicitud incorrecta. Proporcione un ID."));
}
?>

