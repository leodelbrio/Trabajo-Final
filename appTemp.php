<?php
/* Un organismo provincial desea contar con la información sobre las temperaturas máximas promedio mensuales de la ciudad de Neuquén considerando los últimos 10 años, para poder obtener estadísticas y responder a consultas varias.
Para ello se almacenan los valores de temperaturas en un arreglo bidimensional (matriz), tomando una fila por año, desde 2014 a 2023, y una columna por mes.
*/


//Modulo para establecer la matriz principal o automatica 
//return array
function matrizFechas (){
/**Funcion para "cargar" la matriz completa con las temperaturas.
 * Entero $matrizPrincipal[][]
 * PUNTO A
 */

    $matrizPrincipal = array(
        array(30, 28, 26, 22, 18, 12, 10, 14, 17, 20, 25, 29),
        array(33, 30, 27, 22, 19, 13, 11, 15, 18, 21, 26, 31),
        array(34, 32, 29, 21, 18, 14, 12, 16, 18, 21, 27, 32),
        array(33, 31, 28, 22, 18, 13, 11, 14, 17, 22, 26, 31),
        array(32, 30, 28, 22, 17, 12,  9, 13, 16, 20, 24, 30),
        array(32, 30, 27, 23, 19, 14, 12, 11, 17, 23, 25, 29),
        array(31, 29, 28, 21, 19, 13, 10, 12, 16, 22, 27, 29),
        array(30, 28, 26, 20, 16, 12, 11, 13, 17, 21, 28, 30),
        array(31, 29, 27, 21, 17, 12, 11, 15, 18, 22, 26, 30),
        array(32, 30, 27, 20, 16, 13, 13, 15, 19, 23, 28, 31)
    );
    return $matrizPrincipal;
};
/**Modulo para hacer la carga de la matriz de forma manual
 * @param Entero $arraysTemps[][]
 * return array
 */
function matrizManual ($arraysTemps){
    /**PUNTO B */
    //ENTERO $temp, $i, $j

    $temp = 0;
    for ($i = 0; $i < 10; $i++) {
        for ($j = 0; $j < 12; $j++){
            echo ("Ingrese la temperatura para el año: (Mayor a -50 y menor a 60)". $i + 2014 . " y el mes: ". $j + 1 . ". \n");
            $temp = trim(fgets(STDIN));
            if ($temp < -50 || $temp > 60){
                while ($temp < -50 || $temp > 60){
                    echo("Deberia revisar sus facultades mentales. 
                    Ingrese una temperatura valida (Mayor a -50 y menor a 60): ");
                    $temp = trim(fgets(STDIN));
                }
            }
            $arraysTemps[$i][$j] = $temp; 
        }
        
    }
    return $arraysTemps;
};

//**Modulo para mostrar una matriz determinada 
//@param entero $arraysTemps[][] string $estacion
//return vacio
function mostrarMatrizCompleta ($arraysTemps, $estacion){
    /**PUNTO C */
    //ENTERO $anioColum, $i, $j, $i1, $i2, $f1, $f2
    $anioColum = 2013;
    echo ("\n        ene feb mar abr may jun jul ago sep oct nov dic\n");
    
    echo("      --------------------------------------------------\n");
    if ($estacion == "global"){
        $i1 = 0; $f1 = 10; $i2 = 0; $f2 = 12;
    }
    else if ($estacion == "primavera"){
        $i1 = 0; $f1 = 10; $i2 = 0; $f2 = 3;
    }
    else if ($estacion == "invierno"){
        $i1 = 0; $f1 = 5; $i2 = 0; $f2 = 3; $anioColum = 2018;
    }
    for ($i = $i1; $i < $f1; $i++) {
         $anioColum ++;
         echo ($anioColum. " |");
         if ($estacion == "primavera"){
            echo ("                                     ");
         }
         else if ($estacion == "invierno"){
            echo ("                        ");
         }
        for ($j = $i2 ; $j < $f2; $j++){
            echo "  " . str_pad($arraysTemps[$i][$j], 2, "0", STR_PAD_LEFT);
        };
           echo "\n";
        }
    };

//** Modulo para mostrar una temperatura dando el mes y el año
// @param entero $anio, $mes, $arraysTemps[][]
// return entero

function temperaturaPedida ($arraysTemps, $anio, $mes){
    /**PUNTO D */
    //ENTERO $colum, $temPedida

    $colum = $anio - 2014;
    $temPedida = $arraysTemps [$colum][$mes - 1 ];
    
    return $temPedida;
};


/** Modulo para mostrar las temperaturas dependiendo del año
 // @param entero $anio, $arraysTemps[][]
 * return vacio
 */
function mostrarMatrizAnio ($arraysTemps, $anio){
    /**PUNTO E */
    //ENTERO $colum, $j

    $colum = $anio - 2014;
    for ($j = 0; $j < 12; $j++){
        echo " " . $arraysTemps[$colum][$j ];
    };
    echo "\n";
};

/** Modulo para mostrar las temperaturas dependiendo del mes y sacar un promedio
 //  * @param ENTERO  $mes, $arraysTemps
 * return vacio
 */
function mostrarMatrizMes ($arraysTemps, $mes){
    /**PUNTO F */
    //ENTERO $j
    //FLOAT $suma
    $suma = 0;
    for ($j = 0; $j < 10; $j++){
        echo " " . $arraysTemps[$j][$mes - 1];
        $suma = $suma + $arraysTemps[$j][$mes - 1];
    };
    $suma = $suma / 10;
    echo "\n";
    echo "El promedio es: ". $suma. "°." . "\n";
};

/** Modulo para encontrar la temperatura minima de un array
 // @param entero $arraysTemps
 * return array
 */
function minimo($arraysTemps){
    //ENTERO $anio, $mes, $min, $i, $j $matrizMin
    $anio = 0; $mes = 0; $min = 1000;
    for ($i = 0; $i < 10; $i++){
        for ($j = 0; $j < 12; $j++){
            if ($arraysTemps[$i][$j] < $min){
                $min = $arraysTemps[$i][$j];
                $anio = $i;
                $mes = $j;
            }
        }
    }
    $anio = $anio + 2014;
    $matrizMin = [$min, $anio, $mes];
    return $matrizMin;
}
//Modulo para calcular la temperatura Maxima de un Array
//@param ENTERO $arraysTemps
//return array
function maximo($arraysTemps) {
    //ENTERO $anio, $mes, $max, $i, $j, $matrizMax
    $anio = 0; $mes = 0; $max = 0; 
    for ($i = 0; $i < 10; $i++){
        for ($j = 0; $j < 12; $j++){
            if ($arraysTemps[$i][$j] > $max ){
                $max = $arraysTemps[$i][$j];
                $anio = $i;
                $mes = $j;
            }
        }
    } 
    $anio = $anio + 2014;
    $matrizMax = [$max, $anio, $mes];
    return $matrizMax;
};
//Modulo para mostrar la temperatura minima y maxina de un array
//@param ENTERO $arraysTemps
//return vacio
function minYmax ($arraysTemps) {
    //ENTERO $minA, $maxA
    $minA = minimo($arraysTemps);
    $maxA = maximo ($arraysTemps);

    echo "\nLa temperatura minima es: " . $minA[0] . " del año: " . $minA[1] . " del mes: " . $minA[2] +1 ;
    echo "\nLa temperatura maxima es: " . $maxA[0] . " del año: " . $maxA[1] . " del mes: " . $maxA[2] + 1;

}
/** Modulo que crea el array con el conjunto de temperaturas de la primavera */
// @param Entero $arrayTemps[][]
/** retorno array */
function primavera($arraysTemps){
    /**PUNTO H */
    //ENTERO $i, $j, $arrayFinal[][]

    for ($i = 0; $i < 10; $i++) {
        for ($j = 9; $j < 12; $j++){
            $arrayFinal[$i][$j - 9] = $arraysTemps[$i][$j];
            
        };
    };    
    return $arrayFinal;
};

/** Modulo que crea el array con el conjunto de temperaturas de los ultimos cinco invernos */
// @param Entero $arrayTemps[][]
/** retorno array */
function invierno($arraysTemps){
    /**PUNTO I*/
    //ENTERO $i, $j, $arrayFinal
    for ($i = 5; $i < 10; $i++) {
        for ($j = 6; $j < 9; $j++){
            $arrayFinal[$i - 5][$j - 6] = $arraysTemps[$i][$j];
        };
        
    }; 
    return $arrayFinal;
};
/** Modulo que crea el array con el conjunto de la matriz principal, invierno y primavera */
//ENTERO $arraysTemps[][]
//return array
function mostrarTodo ($arraysTemps){
    //ENTERO $arrayConjunto
    //PUNTO J
    $arrayConjunto = [
        "Completo" => matrizFechas (),
        "Primavera" => primavera($arraysTemps),
        "Invierno" => invierno($arraysTemps)
    ];

return $arrayConjunto;

};

/**                             PROGRAMA PRINCIPAL
 * Programa para hacer "administracion" sobre temperaturas en la ciudad de Neuquen
 * ENTERO $array, $s, s2, $array, $t, $arrayFechaCambio [][], $anio, $mes, $tempMostrar, $prim
 * $arrayMuestraAnual
 */



echo ("+-----------------------------------------------------------------------+
|                                                                       |
|       Bienvenidos al programa de administracion meteorologica!        |
|                                                                       |
+-----------------------------------------------------------------------+
");
$array = matrizFechas();
$s = 0;
$s2 = 0;
while ($s != 11) {
    echo "\n                            Yendo al menu";
    echo "\n                                  ";
    for ($t = 0; $t < 2; $t++) {
        echo ".";
        sleep(1); 
    };   
    echo "\n1 - Realizar una carga automática de la matriz de temperaturas." . "\n";
    echo "2 - Realizar una carga manual de la matriz de temperaturas." . "\n";
    echo "3 - Mostrar el contenido de la matriz por filas y columnas." . "\n";
    echo "4 - Mostrar, dado un año y un mes, el valor de temperatura correspondiente." . "\n";
    echo "5 - Mostrar para un determinado año, las temperaturas de todos los meses." . "\n";
    echo "6 - Mostrar para un mes determinado, las temperaturas de todos los años y el promedio." . "\n";
    echo "7 - Hallar las temperaturas máximas y mínimas, indicando año y mes a los que corresponden." . "\n";
echo "8 - Mostrar los datos de las primaveras." . "\n";
echo "9 - Mostrar los datos de los ultimos cinco inviernos" . "\n";
echo "10 - Crear matriz conjunta " . "\n";
echo "11 - Salir del programa" . "\n";

$s = trim(fgets(STDIN));

if ($s >= 1 && $s <= 11 ){


    

        echo "\n";

        switch ($s) {
            case 1:
                echo "Cargando datos al sistema";
                $s2 = 0;
                $array = matrizFechas();
            for ($t = 0; $t < 4; $t++) {
                echo ".";
                sleep(1); 

            };   
            echo "\nLos datos fueron cargados correctamente!" . "\n";
            break;
            
            case 2:
                $s2 = 1;
                echo "Cargando la subida manual\n";
                for ($t = 0; $t < 2; $t++) {
                    echo ".";
                    sleep(1); 
                };   
                $arrayFechaCambio = matrizManual($array);
                break;
            
                case 3:
            
            echo "Cargando matriz\n";
                for ($t = 0; $t < 2; $t++) {
                    echo ".";
                    sleep(1); 
                };
                if ($s2 == 0){
                    $array = matrizFechas();
                }
                else if($s2 == 1){
                    $array = $arrayFechaCambio;
                }
                mostrarMatrizCompleta($array, "global");
                   
            break;
            
            case 4: 
                echo "Cargando\n";
                    for ($t = 0; $t < 2; $t++) {
                        echo ".";
                        sleep(1); 
                    };   
                echo "Ingrese año (2014-2023): " . "\n";
                $anio = trim(fgets(STDIN));
                while ($anio < 2014 || $anio > 2023){
                    echo "Ingrese un año valido!: ";
                    $anio = trim(fgets(STDIN));

                }
                echo "Ingrese mes (1-12): " . "\n";
                $mes = trim(fgets(STDIN));
                while ($mes < 1 || $mes > 12){
                    echo "Ingrese un mes valido!: ";
                    $mes = trim(fgets(STDIN));
                
                } 
                
                $tempMostrar = temperaturaPedida($array, $anio, $mes);
                
            echo "La temperatura es: " . $tempMostrar . "\n";
                break;

            case 5: 
            echo "Cargando\n";
                for ($t = 0; $t < 2; $t++) {
                    echo ".";
                    sleep(1); 
                };   
                echo "Ingrese año (2014-2023): " . "\n";
                $anio = trim(fgets(STDIN));
                while ($anio < 2014 || $anio > 2023){
                    echo "Ingrese un año valido!";
                    $anio = trim(fgets(STDIN));
                }
                echo mostrarMatrizAnio($array, $anio);    
            break;

            case 6: 
                echo "Cargando\n";
                    for ($t = 0; $t < 2; $t++) {
                        echo ".";
                        sleep(1); 
                    };   
               
                echo "Ingrese mes (1-12): " . "\n";
                $mes = trim(fgets(STDIN));
                while ($mes < 1 || $mes > 12){
                    echo "Ingrese un mes valido!: ";
                    $mes = trim(fgets(STDIN));
                
                }
                    echo mostrarMatrizMes($array, $mes);
                break;

            case 7:
                echo "Cargando algoritmo\n";
                    for ($t = 0; $t < 2; $t++) {
                        echo ".";
                        sleep(1); 
                    }; 
                    echo ("\n");
                    if ($s2 == 0){
                        $array = matrizFechas();
                    }
                    else if($s2 == 1){
                        $array = $arrayFechaCambio;
                    }
                    minYmax($array);
            break;

            case 8: 
                echo "Cargando\n";
                for ($t = 0; $t < 2; $t++) {
                    echo ".";
                    sleep(1); 
                }; 
                echo ("\n");  
                $prim = primavera($array);
                mostrarMatrizCompleta($prim,  "primavera" );
            break;

            case 9:
                echo "Cargando\n";
                for ($t = 0; $t < 2; $t++) {
                    echo ".";
                    sleep(1); 
                };   
                $prim = invierno($array);
                mostrarMatrizCompleta($prim,  "invierno") ; 
            break;

            case 10:
                echo "Creando matriz\n";
                for ($t = 0; $t < 2; $t++) {
                    echo ".";
                    sleep(1); 
                };   
                echo ("Matriz creada! ");
                sleep ( 2);
                $arrayMuestraAnual = mostrarTodo ($array);
            break;

            case 11:
            echo "Cargando\n";
                for ($t = 0; $t < 2; $t++) {
                echo ".";
                sleep(1); 
                };  
            echo("Adios!\n");
            sleep(2) ;
            $s = 11;
            break;    
        };
}else {
    echo "Ingrese una opcion correcta!";
}

}    
?>