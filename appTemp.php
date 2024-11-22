<?php
/* Un organismo provincial desea contar con la información sobre las temperaturas máximas promedio mensuales de la ciudad de Neuquén considerando los últimos 10 años, para poder obtener estadísticas y responder a consultas varias.
Para ello se almacenan los valores de temperaturas en un arreglo bidimensional (matriz), tomando una fila por año, desde 2014 a 2023, y una columna por mes.
*/


//Matriz de las temperaturas 
//return array
function matrizFechas (){
/**Funcion para "cargar" la matriz completa con las temperaturas.
 * Entero arreglo
 * PUNTO A
 */
    $matrizPrincipal = array(
        array(30, 28, 26, 22, 18, 12, 10, 14, 17, 20, 25, 29),
        array(33, 30, 27, 22, 19, 13, 11, 15, 18, 21, 26, 31),
        array(34, 32, 29, 21, 18, 14, 12, 16, 18, 21, 27, 32),
        array(33, 31, 28, 22, 18, 13, 11, 14, 17, 22, 26, 31),
        array(32, 30, 28, 22, 17, 12,  9, 13, 16, 20, 24, 30),
        array(32, 30, 27, 23, 19, 13, 10, 12, 16, 22, 27, 29),
        array(31, 29, 28, 21, 19, 13, 10, 12, 16, 22, 27, 29),
        array(30, 28, 26, 20, 16, 12, 11, 13, 17, 21, 28, 30),
        array(31, 29, 27, 21, 17, 12, 11, 15, 18, 22, 26, 30),
        array(32, 30, 27, 20, 16, 13, 13, 15, 19, 23, 28, 31)
    );
    return $matrizPrincipal;
};
/**Modulo para hacer la carga de la matriz de forma matriz
 * @param Entero $arraysTemps[][]
 * return array
 */
function matrizManual ($arraysTemps){
    /**PUNTO B */
    $temp = 0;
    for ($i = 0; $i < 10; $i++) {
        for ($j = 0; $j < 12; $j++){
            echo ("Ingrese la temperatura para el año: (Mayor a -50 y menor a 70)". $i + 2014 . " y el mes: ". $j + 1 . ". \n");
            $temp = trim(fgets(STDIN));
            if ($temp < -50 || $temp > 70){
                while ($temp < -50 || $temp > 70){
                    echo("Deberia revisar sus facultades mentales. 
                    Ingrese una temperatura valida (Mayor a -50 y menor a 70): ");
                    $temp = trim(fgets(STDIN));
                }
            }
            $arraysTemps[$i][$j] = $temp; 
        }
        
    }
    return $arraysTemps;
};
//**Modulo para mostrar una matriz determinada 
//@param entero array
//return vacio
function mostrarMatrizCompleta ($arraysTemps){
    /**PUNTO C */
    $anioColum = 2013;
    echo ("\n        ene feb mar abr may jun jul ago sep oct nov dic\n");
    
    echo("      --------------------------------------------------\n");
    for ($i = 0; $i < 10; $i++) {
        $anioColum ++;
        echo ($anioColum. " |");
        for ($j = 0; $j < 12; $j++){
            echo "  " . str_pad($arraysTemps[$i][$j], 2, "0", STR_PAD_LEFT);
        };
        echo "\n";
        
    };
    sleep(2);
}
//** Modulo para mostrar una temperatura dando el mes y el año
// @param entero $anio, $mes, $arraysTemps
// return array

function temperaturaPedida ($arraysTemps, $anio, $mes){
    /**PUNTO D */
    $colum = $anio - 2014;
    $temPedida = $arraysTemps [$colum][$mes - 1 ];
    
    return $temPedida;
};
/** Modulo para mostrar las temperaturas dependiendo del año
 // @param entero $anio, $arraysTemps
 * return vacio
 */
function mostrarMatrizAnio ($arraysTemps, $anio){
    /**PUNTO E */
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
    $suma = 0;
    for ($j = 0; $j < 10; $j++){
        echo " " . $arraysTemps[$j][$mes - 1];
        $suma = $suma + $arraysTemps[$j][$mes - 1];
    };
    $suma = $suma / 10;
    echo "\n";
    echo "El promedio es: ". $suma. "°." . "\n";
};
/** Modulo para mostrar una temperatura dando el mes y el año
 // @param entero $arraysTemps
 * return vacio
 */
function tempMaxYMin ($arraysTemps){
    /**PUNTO G */
    $min = 1000; $max = 0;
    $countMin = 0; $countMax = 0;
    $anio = 0; $mes = 0;
    for ($i = 0; $i < 10; $i++) {
        for ($j = 0; $j < 12; $j++){
            if ($arraysTemps[$i][$j] < $min && $countMin < 1){
                $min = $arraysTemps[$i][$j];
                $anio = $i; $mes = $j;
                
            }
            if ($arraysTemps[$i][$j] > $max && $countMax < 1){
                $max = $arraysTemps[$i][$j];
                $anioMax = $i; $mesMax = $j;
                
            }
        };
    };
    echo "\n";
    $anio = $anio + 2014; 
    echo ("\nEl minimo es: ". $min. " grados del año ". $anio ." del mes ". $mes + 1 . "\n");
    $anioMax = $anioMax + 2014;
    echo("\nEl maximo es: ". $max. " grados del año ". $anioMax. " del mes ". $mesMax + 1 . "\n");
}; 
/** Modulo que muestra el conjunto de temperaturas de la primavera */
// @param Entero $i, $j, $arrayTemps
/** retorno vacio */
function primavera($arraysTemps){
    /**PUNTO H */

    for ($i = 0; $i < 10; $i++) {
        for ($j = 9; $j < 12; $j++){
            echo " " . $arraysTemps[$i][$j];
        };
        echo "\n";
    };    
};
/** Modulo que muestra el conjunto de temperaturas de los ultimos cinco invernos */
// @param Entero $i, $j, $arrayTemps
/** retorno vacio */
function invierno($arraysTemps){
    /**PUNTO I*/
    for ($i = 5; $i < 10; $i++) {
        for ($j = 6; $j < 9; $j++){
            echo " " . $arraysTemps[$i][$j];
        };
        echo "\n";
    }; 
};
/** Modulo que muestra el conjunto de la matriz principal, invierno y primavera */
function mostrarTodo ($arraysTemps){
    $arrayConjunto = [
        "Completo" => mostrarMatrizCompleta ($arraysTemps),
        "Primavera" => primavera($arraysTemps),
        "Invierno" => invierno($arraysTemps)
    ];

    foreach ($arrayConjunto as $temps => $arrayConj) {
        echo $temps . ": " . "\n"
        foreach ($arrayConj as $corteDeAnio) {
            echo implode (", " , $corteDeAnio) . "\n";
        };
        echo "\n";
    };
};

/**                             PROGRAMA PRINCIPAL
 * Programa para hacer "administracion" sobre temperaturas en la ciudad de Neuquen
 * 
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
echo "10 - Mostrar conjunto de temperaturas." . "\n";
echo "11 - Salir del programa" . "\n";

$s = trim(fgets(STDIN));


    

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
            $arrayFechaCambio = matrizManual($arraysTemps);
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
                mostrarMatrizCompleta($array);
                   
            break;
        case 4: 
            echo "Cargando\n";
                for ($t = 0; $t < 2; $t++) {
                echo ".";
                sleep(1); 
                };   
            echo "Ingrese año (2014-2023): " . "\n";
            $anio = trim(fgets(STDIN));
            echo "Ingrese mes (1-12): " . "\n";
            $mes = trim(fgets(STDIN));
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
            echo mostrarMatrizMes($array, $mes);
            break;
        case 7:
            echo "Cargando algoritmo\n";
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
                tempMaxYMin($array);
            break;
        case 8: 
            echo "Cargando\n";
                for ($t = 0; $t < 2; $t++) {
                echo ".";
                sleep(1); 
                };   
            echo "\n" .primavera($array);
            break;
        case 9:
            echo "Cargando\n";
                for ($t = 0; $t < 2; $t++) {
                echo ".";
                sleep(1); 
                };   
            echo invierno($array);    
            break;
        case 10:
            echo "Cargando\n";
                for ($t = 0; $t < 2; $t++) {
                echo ".";
                sleep(1); 
                };   
            echo mostrarTodo ($arraysTemps);
            break;
        case 11:
            echo "Cargando\n";
                for ($t = 0; $t < 2; $t++) {
                echo ".";
                sleep(1); 
                };   
            $s = 11;
            break;    
    };
};

        
?>