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
        echo " " . $arraysTemps[$j][$$mes];
        $suma = $suma + $arraysTemps[$j][$$mes];
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
}
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
    
}
function invierno(){
    /**PUNTO */
    $matrizInvernal = arary(
        array(12, 11, 17),
        array(10, 12, 16),
        array(11, 13, 17),
        array(11, 15, 18),
        array(13, 15, 19)
    );
    echo mostrarMatrizCompleta($matrizInvernal);
}


?>