<?php
namespace domain\humanresource\dao;

$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/humanresource/entity/Staff.php";
$tempB = $_SERVER['DOCUMENT_ROOT']."/domain/support/db/DbUtil.php";

require_once($tempA);
require_once($tempB);

use domain\humanresource\entity as Entity;
use domain\support\db as Db;

class StaffDao {

    public function getStaff(Entity\Staff $staff,$role) {

        $conn = Db\DbUtil::getConnection();

        //taro di variable
        $email = $staff->getEmail();
        $password = $staff->getPassword();

        $sql = $conn->prepare("select * from staff where email = ? and pekerjaan = ?");
        $sql->bind_param("ss", $email,$role);

        $sql->execute();
        $data = $sql->get_result();
        $row = $data->fetch_assoc();

        if($row != null) {
            if($row["status"] == "Active") {
                if(password_verify($password, $row['password'])) {
                    return True;
                }else {
                    return False;
                }
            } else {
                return False;
            }
        }else {
            return False;
        }

        $sql->close();
    }

    public function getAll() {
        $conn = Db\DbUtil::getConnection();

        $sql = "select * from staff";
        $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

        $listStaff = array();

        while ($row = mysqli_fetch_array($result)){
            $staff = new Entity\Staff();
            $staff->setEmail( $row["email"] );
            $staff->setNama( $row["nama"] );
            $staff->setNomorHp( $row["nomor_hp"] );
            $staff->setPassword( $row["password"] );
            $staff->setPekerjaan( $row["pekerjaan"] );
            $staff->setStatus( $row["status"] );

            array_push($listStaff, $staff);
        }

        return $listStaff;
    }

    public function createNew(Entity\Staff $newStaff) {
        $conn = Db\DbUtil::getConnection();

        $email = $newStaff->getEmail();
        $nama = $newStaff->getNama();
        $nomorHp = $newStaff->getNomorHp();
        $password = $newStaff->getPassword();
        $pekerjaan = $newStaff->getPekerjaan();
        $status = $newStaff->getStatus();
        $passwordEncrypt = password_hash($password, PASSWORD_DEFAULT);

        $sql = $conn->prepare("insert into staff values(?,?,?,?,?,?)");
        $sql->bind_param("ssssss", $email,$nama,$nomorHp,$passwordEncrypt,$pekerjaan,$status);

        if (!$sql->execute()) {
            die(htmlspecialchars($sql->error));
        }

        $sql->close();
    }

    public function updateStaff(Entity\Staff $updateStaff) {
        $conn = Db\DbUtil::getConnection();
        
        $email = $updateStaff->getEmail();
        $nama = $updateStaff->getNama();
        $nomorHp = $updateStaff->getNomorHp();
        $password = $updateStaff->getPassword();
        $pekerjaan = $updateStaff->getPekerjaan();
        $status = $updateStaff->getStatus();
        $passwordEncrypt = password_hash($password, PASSWORD_DEFAULT);

        $sql = $conn->prepare("update staff set nama=?,nomor_hp=?,password=?, pekerjaan=?,status=? where email=?");
        $sql->bind_param("ssssss", $nama,$nomorHp,$passwordEncrypt,$pekerjaan,$status,$email);

        if (!$sql->execute()) {
            die(htmlspecialchars($sql->error));
        }

        $sql->close();
    }

    public function validateEmail($email) {
        $conn = Db\DbUtil::getConnection();

        $sql = $conn->prepare("select * from staff where email=?");
        $sql->bind_param("s",$email);

        if (!$sql->execute()) {
            die(htmlspecialchars($sql->error));
        }

        if (!($res = $sql->get_result())) {
            echo "Getting result set failed: (" . $sql->errno . ") " . $sql->error;
        }
        $count = count($res->fetch_all());
        $res->close();

        if ($count == 1) {//kalo sudah ada
            return False;
        }else {
            return True;
        }
    }

    public function getStaffNameByRole($role) {
        $conn = Db\DbUtil::getConnection();

        $sql = $conn->prepare("select nama,email from staff where pekerjaan = ? and status = ?");
        $status = "Active";
        $sql->bind_param("ss",$role,$status);

        $sql->execute();
        $data = $sql->get_result();

        $array = array();

        while($row = $data->fetch_assoc()) {
            $email = $row["email"];
            $name = $row["nama"];
            $array[$email] = $name; 
        }

        return $array;
    }
}

?>
