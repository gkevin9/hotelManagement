<?php
namespace presentation;
include "../domain/humanresource/model/StaffLoginModel.php";
include "../domain/humanresource/service/StaffService.php";

use domain\humanresource\model as Model;
use domain\humanresource\service as Service;

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    echo "2";
    $staff = new Model\StaffLoginModel();
    $staff->setEmail = $email;
    $staff->setPassword = $password;
    echo "3 ";

    $controller = new StaffController();
    echo "3.4";
    $isValid = $controller->validateStaff($staff);
    echo "5";
    if ($isValid) {
        echo "HALO";
    }else {
        echo "HAA";
    }
}

class StaffController {
    
    public function validateStaff(Model\StaffLoginModel $staff) {
        echo "3.5";
        include "../showErr.php";
        $service = new Service\StaffService();
        echo "3.6";
        $isValidate = $service->validateCredential($staff);
        echo "4";
        return $isValidate;
    }
}

?>