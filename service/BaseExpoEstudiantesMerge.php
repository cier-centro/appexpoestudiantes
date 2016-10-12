<?php

class BaseExpoEstudiantesMerge {
    
    /**
     * @type Reader
     * @type Level
     * @type Word 
     */
    
    protected $reader;
    protected $baseExpoEstudiantes;
    
    
    public function setReader($reader) {
        $this->reader = $reader;
    }
    
    public function setBaseMide($baseExpoEstudiantes) {
        $this->baseExpoEstudiantes = $baseExpoEstudiantes;
    }
    
    public function getArrayAllRegistersToBuildJson() {
        $registersArray = $this->baseExpoEstudiantes->getArrayAllRegisters();
        $dataArray = array();
        
        foreach ($registersArray as $i => $registers) {
            $dataArray[$i]['institucion'] = $registers['institucion'];
            $dataArray[$i]['localidad'] = $registers['localidad'];
            $dataArray[$i]['area'] = $registers['area'];
            $dataArray[$i]['question'] = $registers['question'];
            $dataArray[$i]['answer'] = $registers['answer'];
            $dataArray[$i]['pathSelfie'] = $registers['pathSelfie'];
        }
        
        return $dataArray;
    }
    
}
