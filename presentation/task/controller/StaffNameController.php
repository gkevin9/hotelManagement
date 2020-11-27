<?php
namespace presentation\task\controller;

$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/humanresource/service/StaffService.php";

require_once($tempA);

use domain\humanresource\service as Service;
use domain\humanresource\model as Model;

    $role = $_POST['Role'];
    $ctrl = new StaffNameController();
    $data = $ctrl->getName($role);
    print json_encode($data);

class StaffNameController {

    public function getName($role) {
        $service = new Service\StaffService();
        $data = $service->getNameByRole($role);
        return $data;
    }
}

?>