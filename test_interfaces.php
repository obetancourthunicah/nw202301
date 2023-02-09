<?php
require_once "interfaces/FabricaRecursos.php";

$libro = FabricaRecursos::getRecurso(
    "RecursoLibro",
    array(
        "title"=>"El Cantar de Mio Cid",
        "author"=>"Anonimous",
        "dewey"=>"D.0012",
        "editorial"=>"Graficentro Editores",
        "barcod"=>"1029384752"
    )
);
echo "JSON <br/>";
echo $libro->getNormalJSONString();
echo "<br/> MARC3 <br/>";
echo $libro->getMarcString();

?>
