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
        
        $sql = $conn->prepare("select id from staff where email = ? and password = ? and pekerjaan = ?");
        $sql->bind_param("sss", $email, $password,$role);
        
        // $sql->execute();

        if (!$sql->execute()) {
            die(htmlspecialchars($sql->error));
        }

        if (!($res = $sql->get_result())) {
            echo "Getting result set failed: (" . $sql->errno . ") " . $sql->error;
        }
        $count = count($res->fetch_all());
        $res->close();
        
        if ($count == 1) {//kalo email dan password bener
            return True;
        }else {
            return False;
        }
    }

    public function getAll() {
        $conn = Db\DbUtil::getConnection();

        $sql = "select * from staff";
        $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

        $listStaff = array();

        while ($row = mysqli_fetch_array($result)){
            $staff = new Entity\Staff();
            $staff->setId( $row["id"] );
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

        $id = $newStaff->getId();
        $email = $newStaff->getEmail();
        $nama = $newStaff->getNama();
        $nomorHp = $newStaff->getNomorHp();
        $password = $newStaff->getPassword();
        $pekerjaan = $newStaff->getPekerjaan();
        $status = $newStaff->getStatus();

        $sql = $conn->prepare("insert into staff values(?,?,?,?,?,?,?)");
        $sql->bind_param("sssssss", $id,$email,$nama,$nomorHp,$password,$pekerjaan,$status);

        if(!$sql->execute()){
            die(htmlspecialchars($sql->error));
        }

        $sql->close();
    }
}

?>