<?php
namespace presentation\humanresource\controller;

$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/humanresource/service/StaffService.php";
$tempB = $_SERVER['DOCUMENT_ROOT']."/domain/humanresource/model/StaffModel.php";

require_once($tempA);
require_once($tempB);
require_once('../../../domain/humanresource/model/NewStaffModel.php');

use domain\humanresource\service as Service;
use domain\humanresource\model as Model;
use domain\humanresource\service\StaffService;

    $email = $_POST['email'];
    $ctrl = new NewStaffController();
	$isValid = $ctrl->validate($email);

    if($isValid) {
        $newStaff = new Model\NewStaffModel();
        $newStaff->setEmail($_POST['email']);
        $newStaff->setNama($_POST['nama']);
        $newStaff->setNomorHp($_POST['nomorHp']);
        $newStaff->setPassword($_POST['password']);
        $newStaff->setPekerjaan($_POST['role']);
        $newStaff->setStatus("Active");

        $service = new Service\StaffService();
        $service->createNew($newStaff);

        print "../view/ListStaff.php";
    }else{
        print "failed";
    }

class NewStaffController {

    public function validate($email) {
        $service = new Service\StaffService();
        $isValid = $service->validateEmail($email);
        return $isValid;
    }
}

?>