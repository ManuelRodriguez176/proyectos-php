<!DOCTYPE html>
<html>
    <?php
    $num = $_POST['factorial'];
    $factorial = 1;
    for ($x=$num; $x>=1; $x--)   
    {  
    $factorial = $factorial * $x;  
    } 
    echo "<br/> El numero factorial de ".$num." es ".$factorial;    
    ?>
</html>