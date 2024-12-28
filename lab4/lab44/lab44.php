<?php
if(!isset($_GET['cajas']))
    $txt='
        <form>
        <input name="cajas"/> Número de cajas (tamaño del array)
        <button>Enviar</button>
        </form>
    ';
else{
    $txt='<form action="?cajas='.$_GET['cajas'];
    $txt.='" method="post">';
    for($i=0;$i<$_GET['cajas'];$i++){
        $txt.='<div>';
        $txt.='<input name="caja[]"';
        if(isset($_POST['caja'][$i])
            and is_numeric($_POST['caja'][$i])
            and $_POST['caja'][$i]%2==0)
                $txt.=' value="'.$_POST['caja'][$i].'"';
        $txt.='/>';
        $txt.='</div>';
    }
    $txt.='<button>Enviar</button>';
    $txt.='</form>';
}
echo $txt;