<?php

class funciones{

	public static function punto1($numero) {
        if ($numero != 0){
            for ($i=0; $i < $numero; $i++){
                for ($j=0; $j < $numero; $j++){
                    if(($i==$j) || ($j == ($numero - ($i + 1)))){
                        echo "X";
                    }
                    else{
						echo "_";
                    }
                }
                echo "<br>";
            }
        } else {
            echo "ERROR";
        }
    }
	
	public static function punto2($arrayDePrueba) {
		$funciones=new funciones();

		$numero = $funciones::calcularNumero($arrayDePrueba);
		$cantidad = $funciones::calcularCantidad($numero, $arrayDePrueba);
		
		echo "Numero de repeticiones: " . $cantidad;
		echo "<br>";
		echo "Número que se repite: " . $numero;
    }
    
    public static function calcularNumero($matriz){
		$funciones=new funciones();
		
		$numero = $matriz[0];
        for($i = 1; $i < 10; $i++){
            if($funciones::calcularCantidad($numero, $matriz) < $funciones::calcularCantidad($matriz[$i], $matriz))
                $numero = $matriz[$i];
        }
        return $numero;
    }
    
    public static function calcularCantidad($numero, $matriz){
        $cantidad = 0;
        for($i = 0; $i < 10; $i++){
            if($numero == $matriz[$i])
                $cantidad = $cantidad + 1;
        }
        return $cantidad;
    }
}

?>