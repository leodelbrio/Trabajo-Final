<?php
    function leerTemperaturas($n){
        $temperaturas = [];
        for($i=0; $i< $n; $i++){
            echo("Ingrese la temperatura: ");
            $temperaturas [$i] = trim(fgets(STDIN));
        }
    return $temperaturas;
    }
    
    function listarTemperaturas($arrayTemp){
        for($i = 0; $i < count($arrayTemp); $i ++ ){
            echo($arrayTemp[$i]);
        }
    }

    function promTemperaturas ($arregloTemp){
        $suma = 0;
        for($i = 0; $i < count($arregloTemp); $i++){
            $suma = $arregloTemp[$i] + $suma;    
        }
        $suma = $suma / count($arregloTemp);
        return $suma;
    }

    function porcTemperaturasSuperiores($arregloTemperaturas, $tempDeterminada){
        $countTemp = 0;
        for ($i = 0; $i < $arregloTemperaturas; $i++){
            if ($arregloTemperaturas[$i] > $tempDeterminada){
                $countTemp++;
            }
        }
        $porc = ($countTemp * 100) / count($arregloTemperaturas);
        return $porc;
    }

    function minTemperatura($temps){
        $menor = 10000;
        for ($i = 0; $i < count($temps); $i++){
            if ($temps[$i] < $menor){
                $menor = $temps[$i];
                $indice = $i;
            }
        }
        return $indice;
    }
    function maxTemperatura($temps){
        $max = 0;
        for ($i = 0; $i < count($temps); $i++){
            if ($temps[$i] >  $max){
                $max = $temps[$i];
                $indice = $i;
            }
        }
        return $indice;
    }
    function extremosTemperatura($temps){
        
            $menor = 10000;
            for ($i = 0; $i < count($temps); $i++){
                if ($temps[$i] < $menor){
                    $menor = $temps[$i];
                }
            }
                $max = 0;
                for ($i = 0; $i < count($temps); $i++){
                    if ($temps[$i] >  $max){
                        $max = $temps[$i];
                    }}

            $arrayExtremos = array("min" => $menor, "max" => $max );
            
    }

?>