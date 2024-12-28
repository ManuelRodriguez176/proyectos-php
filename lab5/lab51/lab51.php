<?php
if(is_uploaded_file($_FILES['nombre_archivo_cliente']['tmp_name']))
    {
        $nombreDirectorio = "archivos/";
        $nombrearchivo=$_FILES['nombre_archivo_cliente']['name'];
        $nombreCompleto =$nombreDirectorio.$nombrearchivo;
        
        if(is_file($nombreCompleto)){
            $idUnico = time();
            $nombrearchivo = $idUnico . "-" .$nombrearchivo;
                echo"Archivo repetido, se cambiara el nombre a %nombrearchivo 
                <br/><br/>";
        }
        move_uploaded_file($_FILES['nombre_archivo_cliente']['tmp_name'],$nombreDirectorio.$nombrearchivo);
        echo "Archivo subido correctamente al directorio $nombreDirectorio <br>";    
    }
    else{
        echo "No se subio el archivo <br>";
    }
?>