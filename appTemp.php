<?php
/* Un organismo provincial desea contar con la información sobre las temperaturas máximas promedio mensuales de la ciudad de Neuquén considerando los últimos 10 años, para poder obtener estadísticas y responder a consultas varias.
Para ello se almacenan los valores de temperaturas en un arreglo bidimensional (matriz), tomando una fila por año, desde 2014 a 2023, y una columna por mes.
*/


//Matris de las temperaturas 
function matrisFechas (){

};

for ($i = 0; $i < count($arraysTemps); $i++) {
    for ($j = 0; $j <count($arraysTemps[0]); $j++){
        echo [$i],[$j];
    };
};


?>