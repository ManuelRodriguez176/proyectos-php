<html>
    <head>
        <title>Parcial 1</title>
        <body>
            <?php
              echo "Nombre: Manuel Rodriguez <br/>";
              echo "Profesor: Regis Rivera <br/>
                    Cedula:8-937-464 <br/>
              <br/>";
              echo "<table border=1>";
              $n = 1;
              $n3 = 1;
              for ($n1=1;$n1<=5;$n1++){
                for($n2=1;$n2<=5;$n2++){
                    $n = ((pow($n1,1))+$n2)-5;
                    $n3 = ((pow($n1,1))-$n2)+1;
                    if(($n3==1)||($n==1)){
                        $n3new=array("String",($n3*0)+rand(1,100));//Linea principal
                        $nnew=array("String",($n*0)+rand(1,100));//linea inversa
                        //echo "<td>",$nnew&$n3new, "</td>";
                        echo "<td>",(($n3*$n)*0)+rand(1,100), "</td>";
                        } 
                        else{
                            echo "<td>", 0, "</td>";
                        }
                          
                    } 
                echo "</tr>";
              }
              echo "La suma de la diagonal principal es:".array_sum($n3new). "<br/>";
              echo "La suma de la diagonal inversa es:".array_sum($nnew)."<br/><br/>";
            ?>
        </body> 
    </head>
</html>