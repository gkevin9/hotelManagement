<?php 
namespace domain\task\service;
$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/task/dao/TaskDao.php";
$tempB = $_SERVER['DOCUMENT_ROOT']."/domain/task/model/NewTaskModel.php";
$tempC = $_SERVER['DOCUMENT_ROOT']."/domain/task/entity/Task.php";

require_once($tempA);
require_once($tempB);
require_once($tempC);

use domain\task\entity as Entity; 
use domain\task\model as Model;
use domain\task\dao as Dao; 

class TaskService {
    public function getTaskByRole($role) {
        $dao = new Dao\TaskDao();
        $data = $dao->getTaskByRole($role);
        return $data;
    }

    public function insertTask(Model\NewTaskModel $newtask) {
        $task = new Entity\Task();
        $task->setStaff($newtask->getStaff());
        $task->setStatus($newtask->getStatus());
        $task->setTanggal($newtask->getTanggal());
        $task->setKeterangan($newtask->getKeterangan());

        $dao = new Dao\TaskDao();
        $dao->insertTask($task);
    }

    public function getAllTaskPerStaff($email) {
        $dao = new Dao\TaskDao();
        $listStaff = $dao->getAllTaskPerStaff($email);
        
        return $listStaff;
    }

    public function updateTask($taskId) {
        $dao = new Dao\TaskDao();
        $dao->updateTask($taskId);
    }
}
?>