<!DOCTYPE html>
<html>
    <?php
    $precio1 = $_POST['precio1'];
    $precio2 = $_POST['precio2'];
    $precio3 = $_POST['precio3'];
    $media = ($precio1+$precio2+$precio3)/3;
    echo "<br/> DATOS RECIBIDOS <br/>";
    echo "<br/> Precio establecimiento 1: ".$precio1." dolares";
    echo "<br/> Precio establecimiento 1: ".$precio2." dolares";
    echo "<br/> Precio establecimiento 1: ".$precio3." dolares <br/>";
    echo "<br/> Precio establecimiento 1: ".$media." dolares";
    ?>
</html>