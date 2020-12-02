<?php
namespace domain\task\dao;

$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/task/entity/Schedule.php";
$tempB = $_SERVER['DOCUMENT_ROOT']."/domain/support/db/DbUtil.php";

require_once($tempA);
require_once($tempB);

use domain\task\entity as Entity;
use domain\support\db as Db;

class ScheduleDao {

    public function  getScheduleByStaff($email) {
        $conn = Db\DbUtil::getConnection();

        $sql = $conn->prepare("select schedule.hari,schedule.jam_awal,schedule.jam_akhir,schedule.lokasi, staff.nama from schedule inner join staff on schedule.staff=staff.email where staff = ? order by hari ASC,jam_awal ASC");
        $sql->bind_param("s", $email);

        $sql->execute();
        $data = $sql->get_result();

        $array_data= array();

        while($row = $data->fetch_assoc()) {
            if($row["hari"] == 1) {
                $hari = "Senin";
            }else if($row["hari"] == 2) {
                $hari = "Selasa";
            }else if($row["hari"] == 3) {
                $hari = "Rabu";
            }else if($row["hari"] == 4) {
                $hari = "Kamis";
            }else if($row["hari"] == 5) {
                $hari = "Jumat";
            }else if($row["hari"] == 6) {
                $hari = "Sabtu";
            }else if($row["hari"] == 7) {
                $hari = "Minggu";
            }

            $array = array();
            $array["hari"] = $hari;
            $array["jam_awal"] = $row["jam_awal"];
            $array["jam_akhir"] = $row["jam_akhir"];
            $array["lokasi"] = $row["lokasi"];
            $array["nama"] = $row["nama"];

            array_push($array_data,$array);
        }

        return $array_data;
    }

    public function validateSchedule(Entity\Schedule $newSchedule) {
        $conn = Db\DbUtil::getConnection();

        $staff = $newSchedule->getStaff();
        $hari = $newSchedule->getHari();
        $jamAwal = $newSchedule->getJamAwal();
        $jamAkhir = $newSchedule->getJamAkhir();
        $lokasi = $newSchedule->getLokasi();

        $sql = $conn->prepare("select * from schedule where staff = ? and hari = ? and ? between jam_awal and jam_akhir;");
        $sql->bind_param("sss", $staff,$hari,$jamAwal);

        $sql->execute();
        $data = $sql->get_result();
        $row = $data->fetch_assoc();

        if($row != null) {
            if($row['lokasi']==$lokasi) {
                return False;
            }else {
                return True;
            }
        }else {
            return True;
        }

        $sql->close();
    }

    public function createNew(Entity\Schedule $newSchedule) {
        $conn = Db\DbUtil::getConnection();

        $staff = $newSchedule->getStaff();
        $hari = $newSchedule->getHari();
        $jamAwal = $newSchedule->getJamAwal();
        $jamAkhir = $newSchedule->getJamAkhir();
        $lokasi = $newSchedule->getLokasi();

        $sql = $conn->prepare("insert into schedule(hari, jam_awal, jam_akhir, lokasi, staff) values(?,?,?,?,?)");
        $sql->bind_param("sssss", $hari, $jamAwal,$jamAkhir, $lokasi, $staff);

        if (!$sql->execute()) {
            die(htmlspecialchars($sql->error));
        }

        $sql->close();
    }

    public function getAllSchedule($role, $day) {
        $conn = Db\DbUtil::getConnection();

        $sql = $conn->prepare("select schedule.hari,schedule.jam_awal,schedule.jam_akhir,schedule.lokasi, staff.nama, staff.pekerjaan, schedule.id from schedule inner join staff on schedule.staff=staff.email where staff.pekerjaan = ? and staff.status = ? and schedule.hari = ? order by hari ASC,jam_awal ASC");
        $status = "Active";
        $sql->bind_param("sss", $role,$status,$day);

        $sql->execute();
        $data = $sql->get_result();

        $array_data= array();

        while($row = $data->fetch_assoc()) {
            if($row["hari"] == 1) {
                $hari = "Senin";
            }else if($row["hari"] == 2) {
                $hari = "Selasa";
            }else if($row["hari"] == 3) {
                $hari = "Rabu";
            }else if($row["hari"] == 4) {
                $hari = "Kamis";
            }else if($row["hari"] == 5) {
                $hari = "Jumat";
            }else if($row["hari"] == 6) {
                $hari = "Sabtu";
            }else if($row["hari"] == 7) {
                $hari = "Minggu";
            }

            $array = array();
            $array["jam_awal"] = $row["jam_awal"];
            $array["jam_akhir"] = $row["jam_akhir"];
            $array["lokasi"] = $row["lokasi"];
            $array["nama"] = $row["nama"];
            $array["role"] = $row["pekerjaan"];
            $array["day"] = $hari;
            $array["id"] = $row["id"];
            array_push($array_data,$array);
        }

        return $array_data;
    }

    public function getScheduleStaff($role,$location,$day,$jam) {
        $conn = Db\DbUtil::getConnection();

        $sql = $conn->prepare("select * from schedule inner join staff on schedule.staff=staff.email where staff.pekerjaan = ? and staff.status = ? and schedule.lokasi = ? and schedule.hari = ? and ? between schedule.jam_awal and schedule.jam_akhir;");
        $status="Active";
        $sql->bind_param("sssss", $role,$status,$location,$day,$jam);

        $sql->execute();
        $data = $sql->get_result();

        $array = array();

        while($row = $data->fetch_assoc()) {
            $array[$row["email"]] = $row["nama"];
        }

        return $array;
    }

    public function deleteSchedule($schedId) {
        $conn = Db\DbUtil::getConnection();

        $sql = $conn->prepare("delete from schedule where id = ?");
        $sql->bind_param("s", $schedId);

        if (!$sql->execute()) {
            die(htmlspecialchars($sql->error));
        }

        $sql->close();
    }
}

?>
