<?php
abstract class ABookIntegrationBase {
    private string $lmsIntegration;
    private string $integrationVersion;
    public function getLmsIntegration() {
        return $this->lmsIntegration;
    }
    public function getIntegrationVersion() {
        return $this->integrationVersion;
    }
    protected function __construct(string $lms, string $version)
    {
        $this->lmsIntegration = $lms;
        $this->integrationVersion = $version;
    }

    protected function log(string $logMessage) {
        $logEntry = sprintf("%s %s : %s", $this->lmsIntegration, $this->integrationVersion, $logMessage);
        error_log($logEntry);
    }

    abstract function setup($params);
    abstract function getStudents();
    abstract function getCourseInfo();
    abstract function syncGrades();
}

?>
