<?php
if(is_uploaded_file($_FILES['nombre_archivo_cliente']['tmp_name']))
    {
        $nombreDirectorio = "archivos/";
        $nombrearchivo=$_FILES['nombre_archivo_cliente']['name'];
        $nombreCompleto =$nombreDirectorio.$nombrearchivo;
        $ext = explode(".",$_FILES['nombre_archivo_cliente']['name']);
        $peso = filesize($nombreCompleto);
        $pesomega = round(($peso)/1000000,2);

        if (strtolower($ext[1]) === "png" || strtolower($ext[1]) === "jpg" || strtolower($ext[1]) === "pdf"||strtolower($ext[1]) === "jpeg"){
            if($pesomega <= 1){
                if(is_file($nombreCompleto)){
                $idUnico = time();
                $nombrearchivo = $idUnico . "-" .$nombrearchivo;
                echo $nombrearchivo,":  ".$pesomega. " MB <br/><br/>";
                echo"Archivo repetido, se cambiara el nombre a %nombrearchivo<br/><br/>";
                }    
            } 
        }
        move_uploaded_file($_FILES['nombre_archivo_cliente']['tmp_name'],$nombreDirectorio.$nombrearchivo);
        echo "Archivo subido correctamente al directorio $nombreDirectorio <br>";
    }
    else{
        echo "No se subio el archivo por una de estas razones: <br/><br/>";
        echo "El archivo no es un archivo pdf, jpg, png , gif o jpeg.<br/>";
        echo "Tiene un peso mayor a 1MB.<br/><br/>";   
        }
        
?>