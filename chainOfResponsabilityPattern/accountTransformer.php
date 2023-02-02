<?php
abstract class CRHandler {
    protected $nextHandler;

    public function setNext(CRHandler $handler){
        $this->nextHandler = $handler;
        return $handler;
    }

    abstract public function handle($account);
}
/*
nodeV.setNext(nodeG).setNext(nodeH).setNext(nodeq);
*/
class ReplaceCRHandler extends CRHandler {
    private int $number;
    private string $letter;
    public function __construct(int $number, string $letter)
    {
        $this->number = $number;
        $this->letter = $letter;
    }
    public function handle($account){
        $transformed = str_replace($this->letter, $this->number, $account);
        if($this->nextHandler){
            return $this->nextHandler->handle($transformed);
        } else {
            return $transformed;
        }
    }
}
class CleanCRHandler extends CRHandler{
    public function handle($account){
        $transformed = str_replace([" ", "-"], "", $account);
        $transformed = strtolower($transformed);
        if($this->nextHandler){
            return $this->nextHandler->handle($transformed);
        } else {
            return $transformed;
        }
    }
}
class ReverseCRHandler extends CRHandler{
    public function handle($account){
        $transformed = strrev($account);
        if($this->nextHandler){
            return $this->nextHandler->handle($transformed);
        } else {
            return $transformed;
        }
    }
}
?>
