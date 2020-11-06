<?php
namespace domain\humanresource\dao;
use domain\humanresource\entity\Staff;
use domain\humanresource\dao\DatabaseConfig;

class StaffDao {
    public function get(Staff $staff) {
        include 'DatabaseConfig.php';
        
        $sql = $mysqli->prepare("select * from staff where email = ? and password = ?");
        $sql->bind_param("ss", $staff->email, $staff->password);
        $result = $sql->execute();

        if (!$result) {
            die(htmlspecialchars($sql->error));
        }

        if ($result > 0) {//kalo email dan password bener
            return true;
        }else {
            return false;
        }
    }
}

?>