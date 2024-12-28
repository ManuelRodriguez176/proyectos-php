<?php
class Producto {
    // Conexión a la base de datos y nombre de la tabla
    private $conn;
    private $nombre_tabla = "productos";

    // Atributos de la clase
    public $id;
    public $nombre;
    public $descripcion;
    public $precio;
    public $categoria_id;
    public $categoria_desc;
    public $creado;

    // Constructor con $db como conexión a la base de datos
    public function __construct($db) {
        $this->conn = $db;
    }
    // Leer productos
    function read() {
    // Query para seleccionar todos
    $query = "SELECT c.nombre as categoria_desc, p.id, p.nombre, p.descripcion, p.precio, p.categoria_id, p.creado 
              FROM " . $this->nombre_tabla . " p 
              LEFT JOIN categorias c ON p.categoria_id = c.id 
              ORDER BY p.creado DESC";

    // Sentencia para preparar query
    $stmt = $this->conn->prepare($query);

    // Ejecutar query
    $stmt->execute();

    return $stmt;
}
    // Crear producto
function crear() {
    // Query para insertar un registro
    $query = "INSERT INTO " . $this->nombre_tabla . " 
              SET nombre = :nombre, precio = :precio, descripcion = :descripcion, categoria_id = :categoria_id, creado = :creado";

    // Preparar query
    $stmt = $this->conn->prepare($query);

    // Sanitize
    $this->nombre = htmlspecialchars(strip_tags($this->nombre));
    $this->precio = htmlspecialchars(strip_tags($this->precio));
    $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
    $this->categoria_id = htmlspecialchars(strip_tags($this->categoria_id));
    $this->creado = htmlspecialchars(strip_tags($this->creado));

    // Bind values
    $stmt->bindParam(":nombre", $this->nombre);
    $stmt->bindParam(":precio", $this->precio);
    $stmt->bindParam(":descripcion", $this->descripcion);
    $stmt->bindParam(":categoria_id", $this->categoria_id);
    $stmt->bindParam(":creado", $this->creado);

    // Execute query
    if ($stmt->execute()) {
        return true;
    }
    return false;
}
    // Utilizado al completar el formulario de actualización del producto
function readOne(){
    // Consulta para leer un solo registro
    $query = "SELECT c.nombre as categoria_desc, p.id, p.nombre, p.descripcion, p.precio, p.categoria_id, p.creado
              FROM " . $this->nombre_tabla . " p
              LEFT JOIN categorias c ON p.categoria_id = c.id
              WHERE p.id = ? LIMIT 0,1";

    // Preparar declaración de consulta
    $stmt = $this->conn->prepare($query);

    // ID enlazado del producto a actualizar
    $stmt->bindParam(1, $this->id);

    // Ejecutar consulta
    $stmt->execute();

    // Obtener fila recuperada
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Establecer valores a las propiedades del objeto
    $this->nombre = $row['nombre'];
    $this->precio = $row['precio'];
    $this->descripcion = $row['descripcion'];
    $this->categoria_id = $row['categoria_id'];
    $this->categoria_desc = $row['categoria_desc'];
}

    // Método para actualizar un producto
function update() {
    // Consulta para actualizar el registro
    $query = "UPDATE " . $this->nombre_tabla . "
              SET nombre = :nombre, descripcion = :descripcion, precio = :precio, categoria_id = :categoria_id
              WHERE id = :id";

    // Preparar la declaración de la consulta
    $stmt = $this->conn->prepare($query);

    // Sanitizar
    $this->nombre = htmlspecialchars(strip_tags($this->nombre));
    $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
    $this->precio = htmlspecialchars(strip_tags($this->precio));
    $this->categoria_id = htmlspecialchars(strip_tags($this->categoria_id));
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Enlazar los parámetros
    $stmt->bindParam(':nombre', $this->nombre);
    $stmt->bindParam(':descripcion', $this->descripcion);
    $stmt->bindParam(':precio', $this->precio);
    $stmt->bindParam(':categoria_id', $this->categoria_id);
    $stmt->bindParam(':id', $this->id);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        return true;
    }

    return false;
}

    // Método para eliminar un producto
function delete() {
    // Consulta para eliminar el registro
    $query = "DELETE FROM " . $this->nombre_tabla . " WHERE id = ?";

    // Preparar la declaración de la consulta
    $stmt = $this->conn->prepare($query);

    // Sanitizar
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Enlazar el parámetro
    $stmt->bindParam(1, $this->id);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        return true;
    }

    return false;
}

}
?>
