<?php
require_once 'ABookIntegrationBase.php';
class MoodleBookIntegration extends ABookIntegrationBase {
    public function setup($params){

    }
    public function getStudents(){

    }
    public function getCourseInfo(){

    }
    public function syncGrades(){

    }

    public function __construct(){
        parent::__construct("Moodle", "1.00");
        $this->log("Constructed");
    }
}
?>
