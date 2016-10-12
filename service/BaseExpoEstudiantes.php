<?php

require_once 'Reader.php';

class BaseExpoEstudiantes {

    protected $reader;

    public function setReader($reader) {
        $this->reader = $reader;
    }

    public function getArrayAllRegisters() {
        $sheet = $this->reader->getSheetObject();
        $dataArray = array();
        $i = 0;
        
        for ($file = 2; $file <= $sheet->getHighestRow(); $file++) {
            $institucion = $sheet->getCellByColumnAndRow(2, $file)->getValue();
            $localidad = $sheet->getCellByColumnAndRow(3, $file)->getValue();
            $area = $sheet->getCellByColumnAndRow(4, $file)->getValue();
            $number_question = $sheet->getCellByColumnAndRow(5, $file)->getValue();
            $question = $sheet->getCellByColumnAndRow($this->getNumberCellAnswer($number_question), 1)->getValue();
            $answer = $sheet->getCellByColumnAndRow($this->getNumberCellAnswer($number_question), $file)->getValue();
            $pathSelfie = $this->setStrPathSelfie(trim($sheet->getCellByColumnAndRow(10, $file)->getValue()));
                    
            $dataArray[$i]['institucion'] = $institucion;
            $dataArray[$i]['localidad'] = $localidad;
            $dataArray[$i]['area'] = $area;
            $dataArray[$i]['question'] = $question;
            $dataArray[$i]['answer'] = $answer;
            $dataArray[$i]['pathSelfie'] = trim($pathSelfie);
            
            $i++;
        }

        return $dataArray;
    }
    
    public function setStrPathSelfie($pathSelfie) {
        return str_replace("https://www.nestforms.com/files/", "", $pathSelfie);
    }
    
    public function getNumberCellAnswer($number_question){
        $numberCell = "";
        switch ($number_question) {
            case '1':{
                $numberCell = 6;
            }break;
            case '2':{
                $numberCell = 7;
            }break;
            case '3':{
                $numberCell = 8;
            }break;
            case '4':{
                $numberCell = 9;
            }break;
        }
        return $numberCell;
    }

}
