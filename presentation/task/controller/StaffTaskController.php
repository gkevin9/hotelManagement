<?php
namespace presentation\humanresource\controller;

$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/task/service/TaskService.php";

require_once($tempA);

use domain\task\service as Service;

    $role = $_POST['Role'];
    $ctrl = new StaffTaskController();
    $data = $ctrl->getAllTaskByRole($role);
    print json_encode($data);

class StaffTaskController {

    public function getAllTaskByRole($role) {
        $service = new Service\TaskService();
        $data = $service->getTaskByRole($role);
        return $data;
    }
}

?>