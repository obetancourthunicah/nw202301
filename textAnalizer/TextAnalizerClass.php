<?php
 class TextAnalizer {
    // private, protected, public, final
    // static
    private $textToAnalize;
    public function __construct ($text){
        $this->textToAnalize = $text;
    }

    public function getAnalizedText(){
        $txtTemporal = $this->textToAnalize;
        $txtTemporal = strtolower($txtTemporal);
        $txtTemporal = str_replace(
            array('.',',',"'","?","¿","!","¡",":",";"),
            '',
            $txtTemporal
        );
        // preg_replace
        $arrPalabras = explode(" ", $txtTemporal);
        // "hola adios dia noche mundo hola"
        // [hola, adios, dia, noche, mundo, hola]
        $arrFrecuencias = array();
        foreach($arrPalabras as $palabra) {
            if(isset($arrFrecuencias[$palabra])){
                $arrFrecuencias[$palabra] += 1;
            } else {
                $arrFrecuencias[$palabra] = 1;
            }
        }
        //sort, rsort, asort, arsort
        arsort($arrFrecuencias);
        return $arrFrecuencias;
    }
 }
?>
