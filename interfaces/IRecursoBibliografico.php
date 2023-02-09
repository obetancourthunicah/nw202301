<?php

interface IRecursoBibliografico {
    public function getMarcArray();
    public function getMarcString();
    public function getNormalArray();
    public function getNormalJSONString();
    public static function validateEntry(array $entry);
}

?>
