<?php 
namespace presentation\task\controller;

$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/task/service/TaskService.php";

require_once($tempA);

use domain\task\service as Service;

$taskId = $_POST["TaskID"];

$ctrl = new UpdateTaskController();
$ctrl->updateTask($taskId);

print "OK";

class UpdateTaskController {
    
    public function updateTask($taskId){
        $service = new Service\TaskService();
        $service->updateTask($taskId);
    }
}
?>