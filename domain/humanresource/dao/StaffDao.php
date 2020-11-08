<?php
namespace domain\humanresource\dao;

include "../entity/Staff.php";

use domain\humanresource\entity as Entity;

class StaffDao {
    
    public function getStaff(Entity\Staff $staff) {
        echo "5.5.6.1";
        include 'DatabaseConfig.php';        
        echo "5.5.6.2";
        $sql = $conn->prepare("select * from staff where email = ? and password = ?");
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