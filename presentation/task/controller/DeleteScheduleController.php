<?php 
namespace presentation\task\controller;

$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/task/service/ScheduleService.php";

require_once($tempA);

use domain\task\service as Service;

$schedId = $_POST["SchedID"];

$ctrl = new DeleteScheduleController();
$ctrl->deleteSchedule($schedId);

print "OK";

class DeleteScheduleController {
    
    public function deleteSchedule($schedId){
        $service = new Service\ScheduleService();
        $service->deleteSchedule($schedId);
    }
}
?>