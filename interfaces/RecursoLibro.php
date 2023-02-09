<?php
require_once 'IRecursoBibliografico.php';
require_once 'BaseRecursoBibliografico.php';

class RecursoLibro
    extends BaseRecursoBibliografico
    implements IRecursoBibliografico {
    protected string $editorial;
    public function __construct(
        string $name,
        string $author,
        string $dewey,
        string $barcod,
        string $editorial
    )
    {
        parent::__construct(
            $name,
            $author,
            $dewey,
            $barcod,
            "book"
        );
        $this->editorial = $editorial;
    }
    public function getNormalArray()
    {
        $normalArray = parent::getNormalArray();
        $normalArray["editorial"] = $this->editorial;
        return $normalArray;
    }
    public function getNormalJSONString()
    {
        return json_encode($this->getNormalArray());
    }
    public function getMarcArray()
    {
        $arrMarc = parent::getMarcArray();
        $arrMarc["f.a0.6"] = $this->editorial;
        return $arrMarc;
    }
    public function getMarcString()
    {
        $strMarc = parent::getMarcString();
        $strMarc .= sprintf("%s:%s|","f.a0.6", $this->editorial);
        return $strMarc;
    }
    public static function validateEntry(array $entry)
    {
        $errors = parent::validateEntry($entry);
        if(!key_exists("editorial", $entry)) $errors = true;
        return $errors;
    }
}


?>
