<?php 

namespace presentation\operationsupervisor\controller;

$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/task/service/TaskService.php";
$tempB = $_SERVER['DOCUMENT_ROOT']."/domain/task/model/TaskModel.php";

require_once($tempA);
require_once($tempB);

use domain\task\service as Service;
use domain\task\model as Model;

class TaskController {
    public function getAll($email) {
        $service = new Service\TaskService();
        $listCustomer = $service->getAllTaskPerStaff($email);
        return $listCustomer;
    }
}

?>