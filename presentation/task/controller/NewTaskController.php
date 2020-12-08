<?php 
namespace presentation\task\controller;

$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/task/service/TaskService.php";
$tempB = $_SERVER['DOCUMENT_ROOT']."/domain/task/model/NewTaskModel.php";

require_once($tempA);
require_once($tempB);
require_once('../../../domain/task/model/NewTaskModel.php');
use domain\task\service as Service;
use domain\task\model as Model;
    
if(isset($_POST["submit"])){
    $staff = $_POST["staff"];
    $keterangan = $_POST["keterangan"];
    $status = "Active";
    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date('Y-m-d H:i:s', time());
    $newtask = new Model\NewTaskModel();
    $newtask->setKeterangan($keterangan);
    $newtask->setStaff($staff);
    $newtask->setStatus($status);
    $newtask->setTanggal($tanggal);

    $ctrl = new NewTaskController();
    $ctrl->newTask($newtask);

    header("Location: ../view/ListTask.php");
    exit();
}

class NewTaskController {
    public function newTask($newtask) {
        $service = new Service\TaskService();
        $service->insertTask($newtask);
    }
}
?>