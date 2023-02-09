<?php
    require_once 'IRecursoBibliografico.php';
    require_once 'RecursoAudio.php';
    require_once 'RecursoLibro.php';

    class FabricaRecursos {
        private function __construct(){
            //No se permite instanciar
        }
        private function __clone()
        {
            //No se permite clonar
        }
        public static function getRecurso(string $tipo, Array $params): IRecursoBibliografico  {
            switch($tipo){
                case 'RecursoLibro':
                    if(RecursoLibro::validateEntry($params)){
                        return new RecursoLibro(
                            $params["title"],
                            $params["author"],
                            $params["dewey"],
                            $params["barcod"],
                            $params["editorial"]
                        );
                    } else {
                        throw new Exception("Bad Input Request");
                    }
                    break;
                case 'RecursoAudio':
                    if(RecursoAudio::validateEntry($params)){
                        return new RecursoAudio(
                            $params["title"],
                            $params["author"],
                            $params["dewey"],
                            $params["barcod"],
                            $params["disco"]
                        );
                    } else {
                        throw new Exception("Bad Input Request");
                    }
                    break;
                default:
                    throw new Exception("Tipo no Soportado");
            }
        }
    }
?>
