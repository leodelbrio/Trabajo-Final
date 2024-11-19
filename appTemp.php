<?php
/* Un organismo provincial desea contar con la información sobre las temperaturas máximas promedio mensuales de la ciudad de Neuquén considerando los últimos 10 años, para poder obtener estadísticas y responder a consultas varias.
Para ello se almacenan los valores de temperaturas en un arreglo bidimensional (matriz), tomando una fila por año, desde 2014 a 2023, y una columna por mes.
*/


//Matris de las temperaturas 
function matrizFechas (){
/**Funcion para "cargar" la matriz completa con las temperaturas.
 * Entero arreglo
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

function matrizManual ($arrayAuto, $anio, $mes, $temp){
    $colum = $anio - 2014;
    $arrayAuto [$colum][$mes] =  $temp;

    return $arrayAuto;
};

function mostrarMatrizCompleta ($arraysTemps){

    for ($i = 0; $i < 10; $i++) {
        for ($j = 0; $j < 12; $j++){
            echo " " . $arraysTemps[$i][$j];
        };
        echo "\n";
    };
};
function mostrarMatrizAnio ($arraysTemps, $anio){
    $colum = $anio - 2014;
        for ($j = 0; $j < 12; $j++){
            echo " " . $arraysTemps[$colum][$j];
        };
        echo "\n";
    };

function mostrarMatrizMes ($arraysTemps, $mes){
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
    
}



?>