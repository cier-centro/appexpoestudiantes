<?php
require_once 'Reader.php';
require_once 'BaseExpoEstudiantes.php';
require_once 'BaseExpoEstudiantesMerge.php';

$fileName = "Base-expo-estudiantes.json";
$reader = new Reader();
$baseExpoEstudiantes = new BaseExpoEstudiantes();
$baseExpoEstudiantesMerge = new BaseExpoEstudiantesMerge();

$reader->read("Resources/", "Base-expo-estudiantes.xlsx");
$baseExpoEstudiantes->setReader($reader);
$baseExpoEstudiantesMerge->setReader($reader);
$baseExpoEstudiantesMerge->setBaseMide($baseExpoEstudiantes);

$dataArray = array();

$dataArray = $baseExpoEstudiantesMerge->getArrayAllRegistersToBuildJson();

$file = fopen('Resources/'.$fileName.'', "w") or die("Problemas para generar el archivo Json - ( Resources/".$fileName." )");
fwrite($file, json_encode($dataArray,JSON_PRETTY_PRINT));
echo "El archivo ($fileName) se genero correctamente";