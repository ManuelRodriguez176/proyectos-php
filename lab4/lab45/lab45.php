<html>
    <head>
        <title>Laboratorio 4.5</title>
        <body>
            <?php
              echo "<table border=1>";
              $n = 1;
              for ($n1=1;$n1<=30;$n1++){
                for($n2=1;$n2<=30;$n2++){
                    $n = ((pow($n1,1))-$n2)+1;
                    if($n==1){
                        echo "<td>", $n, "</td>";
                    }
                    else{
                        echo "<td>", 0, "</td>";
                    }   
                }
                echo "</tr>";
              }
            ?>
        </body> 
    </head>
</html>