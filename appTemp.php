<?php
/* Un organismo provincial desea contar con la información sobre las temperaturas máximas promedio mensuales de la ciudad de Neuquén considerando los últimos 10 años, para poder obtener estadísticas y responder a consultas varias.
Para ello se almacenan los valores de temperaturas en un arreglo bidimensional (matriz), tomando una fila por año, desde 2014 a 2023, y una columna por mes.
*/


//Matris de las temperaturas 
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
    $arraysTemps = matrizFechas();

function matrizManual ($arraysTemps){
    /**PUNTO B */
    for ($i = 0; $i < 10; $i++) {
        for ($j = 0; $j < 12; $j++){
            echo ("Ingrese la temperatura para el año: ". $i + 2014 . " y el mes: ". $j + 1 . ". \n");
            $temp = trim(fgets(STDIN));
            $arraysTemps[$i][$j] = $temp; 
        }
    };
    return $arraysTemps;
}
function mostrarMatrizCompleta ($arraysTemps){
    /**PUNTO C */

    for ($i = 0; $i < 10; $i++) {
        for ($j = 0; $j < 12; $j++){
            echo " " . $arraysTemps[$i][$j];
        };
        echo "\n";
    };
};

function temperaturaPedida ($arraysTemps, $anio, $mes){
    /**PUNTO D */
    $colum = $anio - 2014;
    $temPedida = $arraysTemps [$colum][$mes - 1 ];

    return $temPedida;
};

function mostrarMatrizAnio ($arraysTemps, $anio){
    /**PUNTO E */
    $colum = $anio - 2014;
        for ($j = 0; $j < 12; $j++){
            echo " " . $arraysTemps[$colum][$j ];
        };
        echo "\n";
};

function mostrarMatrizMes ($arraysTemps, $mes){
    /**PUNTO F */
    $suma = 0;
    for ($j = 0; $j < 10; $j++){
        echo " " . $arraysTemps[$j][$mes];
        $suma = $suma + $arraysTemps[$j][$mes];
    };
    $suma = $suma / 10;
    echo "\n";
    echo "El promedio es: ". $suma. "°." . "\n";
};

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
        echo "\n";
    };
    $anio = $anio + 2014; 
    echo ("\nEl minimo es: ". $min. " grados del año ". $anio ." del mes ". $mes + 1 . "\n");
    $anioMax = $anioMax + 2014;
    echo("\nEl maximo es: ". $max. " grados del año ". $anioMax. " del mes ". $mesMax + 1 . "\n");
}; 

function primavera(){
    /**PUNTO H */
    $matrizPrimavera = array(
        array(20, 25, 29),
        array(21, 26, 31),
        array(21, 27, 32),
        array(22, 26, 31),
        array(20, 24, 30),
        array(23, 25, 29),
        array(22, 27, 29),
        array(21, 28, 30),
        array(22, 26, 30),
        array(23, 28, 31)
    );
    echo mostrarMatrizCompleta($matrizPrimavera) . "\n";
    
};

function invierno(){
    /**PUNTO I*/
    $matrizInvernal = array(
        array(12, 11, 17),
        array(10, 12, 16),
        array(11, 13, 17),
        array(11, 15, 18),
        array(13, 15, 19)
    );
    echo mostrarMatrizCompleta($matrizInvernal) . "\n";
};

$s = 0;

while ($s != 11) {
echo "1 - Realizar una carga automática de la matriz de temperaturas." . "\n";
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


    echo "Cargando";
/*    for ($t = 0; $t < 5; $t++) {
        echo ".";
        sleep(1); 
    };   */

    echo "\n";

    switch ($s) {
        case 1:
            echo "Los datos fueron cargados correctamente!" . "\n";
            break;
        case 2:
            $arrayFechaCambio = matrizManual($arraysTemps);
            echo mostrarMatrizCompleta($arrayFechaCambio);
            break;
        case 3:
            echo mostrarMatrizCompleta($arraysTemps);
            break;
        case 4: 
            echo "Ingrese año: " . "\n";
            $anio = trim(fgets(STDIN));
            echo "Ingrese mes: " . "\n";
            $mes = trim(fgets(STDIN));
            $tempMostrar = temperaturaPedida($arraysTemps, $anio, $mes);
            echo "La temperatura es: " . $tempMostrar . "\n";
            break;
        case 5: 
            echo "Ingrese año: " . "\n";
            $anio = trim(fgets(STDIN));
            echo mostrarMatrizAnio($arraysTemps, $anio);
            break;
        case 6: 
            echo "Ingrese mes: " . "\n";
            $mes = trim(fgets(STDIN));
            echo mostrarMatrizMes($arraysTemps, $mes);
            break;
        case 7:
            echo tempMaxYMin($arraysTemps);
            break;
        case 8: 
            echo primavera();
            break;
        case 9:
            echo invierno();    
            break;
        case 10:
            echo matrizCompleta ();
            break;
        case 11:
            $s = 11;
            break;    
    };
};

        
?>