<?php
namespace domain\task\service;
$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/task/dao/ScheduleDao.php";
$tempB = $_SERVER['DOCUMENT_ROOT']."/domain/task/model/NewScheduleModel.php";
$tempC = $_SERVER['DOCUMENT_ROOT']."/domain/task/entity/Schedule.php";

require_once($tempA);
require_once($tempB);
require_once($tempC);

use domain\task\entity as Entity; 
use domain\task\model as Model;
use domain\task\dao as Dao; 

// Menyediakan fungsi sesuai use-case terkait customer.
class ScheduleService {
    
    public function getScheduleByStaff($email) {
        $dao = new Dao\ScheduleDao();
        $data = $dao->getScheduleByStaff($email);
        return $data;
    }

    public function validateSchedule(Model\NewScheduleModel $newSchedule){
        $schedule = new Entity\Schedule();
        $schedule->setStaff($newSchedule->getStaff());
        $schedule->setHari($newSchedule->getHari());
        $schedule->setJamAwal($newSchedule->getJamAwal());
        $schedule->setJamAkhir($newSchedule->getJamAkhir());
        $schedule->setLokasi($newSchedule->getLokasi());

        $dao = new Dao\ScheduleDao();
        $isValid = $dao->validateSchedule($schedule);

        return $isValid;
    }

    public function createNew(Model\NewScheduleModel $newSchedule){
        $schedule = new Entity\Schedule();
        $schedule->setStaff($newSchedule->getStaff());
        $schedule->setHari($newSchedule->getHari());
        $schedule->setJamAwal($newSchedule->getJamAwal());
        $schedule->setJamAkhir($newSchedule->getJamAkhir());
        $schedule->setLokasi($newSchedule->getLokasi());

        $dao = new Dao\ScheduleDao();
        $isValid = $dao->createNew($schedule);

        return $isValid;
    }

    public function getAllSchedule($role, $day) {
        $dao = new Dao\ScheduleDao();
        $data = $dao->getAllSchedule($role,$day);

        return $data;
    }

    public function getScheduleStaff($role,$location,$day,$jam) {
        $dao = new Dao\ScheduleDao();
        $data = $dao->getScheduleStaff($role,$location,$day,$jam);
        return $data;
    }
    
}
?>