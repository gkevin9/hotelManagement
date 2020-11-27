<?php
namespace presentation\task\controller;

$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/task/service/ScheduleService.php";

require_once($tempA);

use domain\task\service as Service;
use domain\task\model as Model;

    $email = $_POST['Email'];
    $ctrl = new StaffScheduleController();
    $data = $ctrl->getSchedule($email);
    print json_encode($data);

class StaffScheduleController {

    public function getSchedule($role) {
        $service = new Service\ScheduleService();
        $data = $service->getscheduleByStaff($role);
        return $data;
    }
}

?>