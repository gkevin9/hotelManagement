<?php
namespace presentation\receptionist\controller;

$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/guest/service/CustomerService.php";

include $tempA;

use domain\guest\service as Service;
// include '../../../showErr.php';
// $controller = new CustomerController();
// $list = $controller->getAll();
// session_start();
// $_SESSION['listCustomer'] = $list;

// header("Location: ../view/ListCustomer.php");

class CustomerController {
    public function getAll() {
        $service = new Service\CustomerService();
        $listCustomer = $service->getAllCustomer();
        return $listCustomer;
    }
}

?>