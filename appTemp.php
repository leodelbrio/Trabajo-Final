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

function matrizManual ($arraysTemps, $anio, $mes, $temp){
    /**PUNTO B */
    $colum = $anio - 2014;
    $arraysTemps [$colum][$mes] =  $temp;

    return $arraysTemps;
};

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
    $temPedida = $arraysTemps [$colum][$mes];

    return $temPedida;
};

function mostrarMatrizAnio ($arraysTemps, $anio){
    /**PUNTO E */
    $colum = $anio - 2014;
        for ($j = 0; $j < 12; $j++){
            echo " " . $arraysTemps[$colum][$j];
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
    echo "El promedio es: ". $suma. "°.";
};

function tempMaxYMin ($arraysTemps, $anio, $mes){
    /**PUNTO G */
    $min = 1000; $max = 0;
    $colum = $anio - 2014;
    $countMin = 0; $countMax = 0;
    for ($i = 0; $i < 10; $i++) {
        for ($j = 0; $j < 12; $j++){
            echo " " . $arraysTemps[$i][$j];
            if ($arraysTemps[$i][$j] < $min && $countMin < 1){
                $min = $arraysTemps[$i][$j];
                $anio = $i; $mes = $j;
                
            }
            if ($arraysTemps[$i][$j] > $max && $countMax < 1){
                $max = $arraysTemps[$i][$j];
                $anioMax = $arraysTemps[$i][$j];
                $anioMax = $i; $mesMax = $j;
                
            }
        };
        echo "\n";
    };
    $anio = $anio + 2013; 
    echo ("El minimo es: ". $min. " del año ". $anio ." del mes ". $mes);
    $anioMax = $anioMax + 2013;
    echo("El maximo es :. ". $max. "del año ". $anioMax. " del mes ". $mesMax);
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
    echo mostrarMatrizCompleta($matrizPrimavera);
    
};

function invierno(){
    /**PUNTO */
    $matrizInvernal = array(
        array(12, 11, 17),
        array(10, 12, 16),
        array(11, 13, 17),
        array(11, 15, 18),
        array(13, 15, 19)
    );
    echo mostrarMatrizCompleta($matrizInvernal);
};

$i = 0;

while ($i != 10) {
echo "0 - Realizar una carga automática de la matriz de temperaturas." . "\n";
echo "1 - Realizar una carga manual de la matriz de temperaturas." . "\n";
echo "2 - Mostrar el contenido de la matriz por filas y columnas." . "\n";
echo "3 - Mostrar, dado un año y un mes, el valor de temperatura correspondiente." . "\n";
echo "4 - Mostrar para un determinado año, las temperaturas de todos los meses." . "\n";
echo "5 - Mostrar para un mes determinado, las temperaturas de todos los años y el promedio." . "\n";
echo "6 - Hallar las temperaturas máximas y mínimas, indicando año y mes a los que corresponden." . "\n";
echo "7 - Primavera." . "\n";
echo "8 - Invierno" . "\n";
echo "9 - Matriz asos" . "\n";
echo "10 - Salir del programa" . "\n";

$i = trim(fgets(STDIN));


    echo "Cargando";
/*    for ($t = 0; $t < 5; $t++) {
        echo ".";
        sleep(1); 
    };   */

    echo "\n";

    switch ($i) {
        case 0:
            echo "Los datos fueron cargados correctamente!" . "\n";
            break;
        case 1:
            echo "Ingrese anio: ";
            $anio = trim(fgets(STDIN));
            echo "Ingrese mes: ";
            $mes = trim(fgets(STDIN));
            echo "Ingrese temperatura que desea ingresar: ";
            $temp = trim(fgets(STDIN));
            $arrayFechaCambio = matrizManual($arraysTemps, $anio, $mes, $temp);
            echo mostrarMatrizCompleta($arrayFechaCambio);
            break;
        case 2:
            echo mostrarMatrizCompleta($arraysTemps);
            break;
        case 3: 
            echo "Ingrese anio";
            $anio = trim(fgets(STDIN));
            echo "Ingrese mes";
            $mes = trim(fgets(STDIN));
            $tempMostrar = temperaturaPedida($arraysTemps, $anio, $mes);
            echo "La temperatura es: " . $tempMostrar;
            break;
        case 4: 
            echo "Ingrese anio";
            $anio = trim(fgets(STDIN));
            echo mostrarMatrizAnio($arraysTemps, $anio);
            break;
        case 5: 
            echo "Ingrese mes";
            $mes = trim(fgets(STDIN));
            echo mostrarMatrizMes($arraysTemps, $mes);
            break;
        case 6:
            echo "Ingrese anio";
            $anio = trim(fgets(STDIN));
            echo "Ingrese mes";
            $mes = trim(fgets(STDIN));
            echo tempMaxYMin($arraysTemps, $anio, $mes);
            break;
        case 7: 
            echo primavera();
            break;
        case 8:
            echo invierno();    
            break;
        case 9:
            break;
        case 10:
            $i = 10;
            break;    
    };
};


?>