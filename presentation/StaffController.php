<?php
namespace presentation;
require_once("../domain/humanresource/model/StaffLoginModel.php");
require_once("../domain/humanresource/service/StaffService.php");

use domain\humanresource\model as Model;
use domain\humanresource\service as Service;

// if (isset($_POST['submit'])) {
    $role = $_POST['role'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $staff = new Model\StaffLoginModel();
    $staff->setEmail($email);
    $staff->setPassword($password);
    
    $controller = new StaffController();
    $isValid = $controller->validateStaff($staff,$role);
    
    if ($isValid) {
        session_start();
        $_SESSION["email"] = $email;
        // $_SESSION["role"] = "admin";
        if ($role == "Receptionist") {
            $_SESSION["role"] = "Receptionist";
            // header('Location: receptionist/view/ListCustomer.php');
            print "presentation/receptionist/view/ListCustomer.php";
        }else if ($role == "Chef") {
            $_SESSION["role"] = "Chef";
            // header('Location: kitchen/view/ListBahan.php');
            print "presentation/kitchen/view/ListBahan.php";
        }else if ($role == "OperationSupervisor") {
            $_SESSION["role"] = "OperationSupervisor";
            // header('Location: humanresource/view/ListStaff.php');
            print "presentation/humanresource/view/ListStaff.php";
        }
        
    
    }else {
        print "failed";
    }
// }

class StaffController {
    
    public function validateStaff(Model\StaffLoginModel $staff,$role) {
        
        $service = new Service\StaffService();
        $isValidate = $service->validateCredential($staff,$role);
        
        return $isValidate;
    }
}

?>