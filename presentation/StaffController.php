<?php
namespace presentation;
use domain\humanresource\model\StaffLoginModel;
use domain\humanresource\service\StaffService;

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $staff = new StaffLoginModel();
    $staff->setEmail = $email;
    $staff->setPassword = $password;

    $controller = new StaffController();
    $isValid = $controller->validateStaff($staff);

    if ($isValid) {
        echo "HALO";
    }else {
        echo "HAA";
    }
}

class StaffController {
    
    public function validateStaff(StaffLoginModel $staff) {
        $service = new StaffService();
        $isValidate = $service->validateCredential($staff);

        return $isValidate;
    }
}

?>