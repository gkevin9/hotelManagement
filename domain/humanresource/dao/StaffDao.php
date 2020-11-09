<?php
namespace domain\humanresource\dao;

include "../entity/Staff.php";

use domain\humanresource\entity as Entity;

class StaffDao {
    
    public function getStaff(Entity\Staff $staff) {
 
        $conn = mysqli_connect("localhost", "admin", "admin", "hotel");
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        //taro di variable
        $email = $staff->getEmail();
        $password = $staff->getPassword();
        
        $sql = $conn->prepare("select id from staff where email = ? and password = ?");
        $sql->bind_param("ss", $email, $password);
        
        // $sql->execute();

        if (!$sql->execute()) {
            die(htmlspecialchars($sql->error));
        }

        if (!($res = $sql->get_result())) {
            echo "Getting result set failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        $count = count($res->fetch_all());
        $res->close();
        
        if ($count == 1) {//kalo email dan password bener
            return True;
        }else {
            return False;
        }
    }
}

?>