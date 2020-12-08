<?php
namespace presentation\humanresource\controller;

$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/humanresource/service/StaffService.php";
$tempB = $_SERVER['DOCUMENT_ROOT']."/domain/humanresource/model/StaffModel.php";

require_once($tempA);
require_once($tempB);

use domain\humanresource\service as Service;
use domain\humanresource\model as Model;

class OperationController {
    public function getAll() {
        $service = new Service\StaffService();
        $listStaff = $service->getAllStaff();
        return $listStaff;
    }

    public function updateStaff(Model\NewStaffModel $updateStaff) {
        $service = new Service\StaffService();
        $service->updateStaff($updateStaff);
    }
}

?>