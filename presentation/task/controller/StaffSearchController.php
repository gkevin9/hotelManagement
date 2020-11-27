<?php 
namespace presentation\task\controller;

$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/task/service/ScheduleService.php";

require_once($tempA);
require_once($tempB);

use domain\task\service as Service;

$role = $_POST["role"];
$location = $_POST["location"];
date_default_timezone_set('Asia/Jakarta');
$day_str = date("D");
$jam = date("H:i");

if($day_str == "Mon") {
    $day=1;
}else if($day_str == "Tue") {
    $day=2;
}else if($day_str == "Wed") {
    $day=3;
}else if($day_str == "Thu") {
    $day=4;
}else if($day_str == "Fri") {
    $day=5;
}else if($day_str == "Sat") {
    $day=6;
}else if($day_str == "Sun") {
    $day=7;
}

$ctrl = new StaffSearchController();
$data = $ctrl->getAllSchedule($role,$location,$day,$jam);

print json_encode($data);

class StaffSearchController {
    
    public function getAllSchedule($role,$location,$day,$jam){
        $service = new Service\ScheduleService();
        $data = $service->getScheduleStaff($role,$location,$day,$jam);
        return $data;
    }
}
?>