<?php 
namespace presentation\task\controller;

$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/task/service/ScheduleService.php";

require_once($tempA);

use domain\task\service as Service;

$role = $_POST["role"];
$day = $_POST["day"];

$ctrl = new ScheduleController();
$data = $ctrl->getAllSchedule($role,$day);

print json_encode($data);

class ScheduleController {
    
    public function getAllSchedule($role, $day){
        $service = new Service\ScheduleService();
        $data = $service->getAllSchedule($role, $day);
        return $data;
    }
}
?>