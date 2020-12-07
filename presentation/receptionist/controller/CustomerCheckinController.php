<?php
namespace presentation\receptionist\controller;
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/service/CustomerStayService.php");
require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/service/BillService.php");
require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/model/NewBillModel.php");
use domain\guest\service as Service;
use domain\guest\model as Model;

// $id = $_GET['id'];

// $service = new Service\CustomerStayService();
// $service->newCustomerStay($id);

// $lama = $service->getLama($id);
// $amount = $service->getUangMuka($id);

// $billModel = new Model\NewBillModel();
// $billModel->setAmount($amount);
// $billModel->setQuantity($lama);
// $billModel->setDeskripsi("Biaya Kamar");
// $billModel->setCustStay($id);
// echo $amount;

// $billService = new Service\BillService();
// $billService->createBill($billModel);

// header("Location: ../view/ListReservation.php");
$id = $_GET['id'];
$ctrl = new CustomerCheckinController();
$ctrl->customerCheckin($id);
header("Location: ../view/ListReservation.php");

class CustomerCheckinController {
    public function customerCheckin($id) {
        $this->newCustomerStay($id);
        $this->newBill($id);
    }

    private function newCustomerStay($id) {
        $service = new Service\CustomerStayService();
        $service->newCustomerStay($id);
    }

    private function newBill($id) {
        $service = new Service\CustomerStayService();

        $lama = $service->getLama($id);
        $amount = $service->getUangMuka($id);

        $billModel = new Model\NewBillModel();
        $billModel->setAmount($amount);
        $billModel->setQuantity($lama);
        $billModel->setDeskripsi("Biaya Kamar");
        $billModel->setCustStay($id);
        echo $amount;

        $billService = new Service\BillService();
        $billService->createBill($billModel);
    }
}
?>