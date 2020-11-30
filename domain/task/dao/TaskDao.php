<?php
namespace domain\task\dao;

$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/task/entity/Task.php";
$tempB = $_SERVER['DOCUMENT_ROOT']."/domain/support/db/DbUtil.php";

require_once($tempA);
require_once($tempB);

use domain\task\entity as Entity;
use domain\support\db as Db;

class TaskDao {
    
    public function getTaskByRole($role) {
        $conn = Db\DbUtil::getConnection();

        $sql = $conn->prepare("select staff.nama,task.keterangan,task.tanggal,task.status from task inner join staff on task.staff=staff.email where staff.pekerjaan = ? ");
        $sql->bind_param("s", $role);

        $sql->execute();
        $data = $sql->get_result();

        $array_data= array();

        while($row = $data->fetch_assoc()) {
            $array = array();
            $array["nama"] = $row["nama"];
            $array["keterangan"] = $row["keterangan"];
            $array["tanggal"] = $row["tanggal"];
            $array["status"] = $row["status"];
            array_push($array_data,$array);
        }

        return $array_data;
        
    }

    public function insertTask(Entity\Task $newTask) {
        $conn = Db\DbUtil::getConnection();

        $staff = $newTask->getStaff();
        $keterangan = $newTask->getKeterangan();
        $status = $newTask->getStatus();
        $tanggal = $newTask->getTanggal();

        $sql = $conn->prepare("insert into task(keterangan, status, staff, tanggal) values(?,?,?,?)");
        $sql->bind_param("ssss", $keterangan, $status, $staff,$tanggal);
        
        if (!$sql->execute()) {
            die(htmlspecialchars($sql->error));
        }

        $sql->close();
    }

    public function getAllTaskPerStaff($email) {
        $conn = Db\DbUtil::getConnection();
        $status = "Active";
        $sql = $conn->prepare("select * from task where staff = ? and status = ?");
        $sql->bind_param("ss", $email,$status);
        
        $sql->execute();
        $data = $sql->get_result();

        $listTask = array();

        while ($row = mysqli_fetch_array($data)){
            $task = new Entity\Task();
            $task->setId( $row["id"] );
            $task->setKeterangan( $row["keterangan"] );
            $task->setTanggal( $row["tanggal"] );

            array_push($listTask, $task);
        }

        return $listTask;
    }

    public function updateTask($taskId) {
        $conn = Db\DbUtil::getConnection();

        $sql = $conn->prepare("update task set status = ? where id = ?");
        $status = "Done";
        $sql->bind_param("ss",$status ,$taskId);

        if (!$sql->execute()) {
            die(htmlspecialchars($sql->error));
        }

        $sql->close();
    }
}
?>