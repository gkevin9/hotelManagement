<?php 
namespace presentation\task\controller;

$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/task/service/ScheduleService.php";
$tempB = $_SERVER['DOCUMENT_ROOT']."/domain/task/model/NewScheduleModel.php";

require_once($tempA);
require_once($tempB);
require_once('../../../domain/task/model/NewScheduleModel.php');
use domain\task\service as Service;
use domain\task\model as Model;

    $newSchedule = new Model\NewScheduleModel();
    $newSchedule->setStaff($_POST["staff"]);
    $newSchedule->setHari($_POST["day"]);
    $newSchedule->setJamAwal($_POST["starttimepicker"]);
    $newSchedule->setJamAkhir($_POST["endtimepicker"]);
    $newSchedule->setLokasi($_POST["location"]);

    $ctrl = new NewScheduleController();
    $isValid = $ctrl->validate($newSchedule);
    
    if($isValid){
        $service = new Service\ScheduleService();
        $service->createNew($newSchedule);

        print "berhasil";
    }else {
        print "failed";
    }

class NewScheduleController {
    
    public function validate(Model\NewScheduleModel $newSchedule) {
        $service = new Service\ScheduleService();
        $isValid = $service->validateSchedule($newSchedule);
        return $isValid;
    }
}
?>