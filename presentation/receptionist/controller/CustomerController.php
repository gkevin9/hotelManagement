<?php
namespace presentation\receptionist\controller;

$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/guest/service/CustomerService.php";
$tempB = $_SERVER['DOCUMENT_ROOT']."/domain/guest/model/NewCustomerModel.php";

require_once($tempA);
require_once($tempB);

use domain\guest\service as Service;
use domain\guest\model as Model;

class CustomerController {
    public function getAll() {
        $service = new Service\CustomerService();
        $listCustomer = $service->getAllCustomer();
        return $listCustomer;
    }

    public function createNew(Model\NewCustomerModel $newCustomer) {
        
        $service = new Service\CustomerService();
        $service->createNew($newCustomer);
    }
}

?>