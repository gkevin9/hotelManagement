<?php
namespace presentation;
include "../domain/humanresource/model/StaffLoginModel.php";
include "../domain/humanresource/service/StaffService.php";

use domain\humanresource\model as Model;
use domain\humanresource\service as Service;

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $staff = new Model\StaffLoginModel();
    $staff->setEmail($email);
    $staff->setPassword($password);
    
    $controller = new StaffController();
    $isValid = $controller->validateStaff($staff);
    
    if ($isValid) {
        session_start();
        $_SESSION["email"] = $email;
        // $_SESSION["role"] = "admin";
        header('Location: receptionist/view/ListReservation.php');
    }else {
        echo "GAGAL";
    }
}

class StaffController {
    
    public function validateStaff(Model\StaffLoginModel $staff) {
        
        $service = new Service\StaffService();
        $isValidate = $service->validateCredential($staff);
        
        return $isValidate;
    }
}

?>