<?php
require_once 'IRecursoBibliografico.php';
class BaseRecursoBibliografico implements IRecursoBibliografico {
    protected string $title;
    protected string $author;
    protected string $dewey;
    protected string $barcod;
    protected string $type;

    public function __construct(
        string $title,
        string $author,
        string $dewey,
        string $barcod,
        string $type
    )
    {
        $this->title = $title;
        $this->author = $author;
        $this->dewey = $dewey;
        $this->barcod = $barcod;
        $this->type = $type;
    }
    public function getNormalArray()
    {
        $arrNormal = array(
            "title" => $this->title,
            "author" => $this->author,
            "dewey" => $this->dewey,
            "barcod" => $this->barcod,
            "type" => $this->type
        );
        return $arrNormal;
    }
    public function getNormalJSONString()
    {
        return json_encode($this->getNormalArray());
    }
    public function getMarcArray()
    {
        $arrMarc = array(
            "a.b1.2" => $this->title,
            "a.b1.4" => $this->author,
            "d.c0.1" => $this->dewey,
            "a.c0.1" => $this->barcod,
            "e.a0.1" => $this->type
        );
        return $arrMarc;
    }
    public function getMarcString()
    {
        $strMarc = "";
        $arrMarc = $this->getMarcArray();
        foreach($arrMarc as $llave => $valor){
            $strMarc .= sprintf("%s:%s|", $llave, $valor);
        }
        return $strMarc;
    }
    public static function validateEntry(array $entry){
        $errors = false;
        if(!key_exists("title", $entry)) $errors = true;
        if(!key_exists("author", $entry)) $errors = true;
        if(!key_exists("dewey", $entry)) $errors = true;
        if(!key_exists("barcod", $entry)) $errors = true;
        return $errors;
    }
}

?>
