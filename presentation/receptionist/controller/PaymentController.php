<?php
namespace presentation\receptionist\controller;

require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/model/NewPaymentModel.php");
require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/service/PaymentService.php");
require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/service/CustomerStayService.php");

use domain\guest\model as Model;
use domain\guest\service as Service;

$cash = floatval(str_replace(",", "", $_POST['cash']));
$debit = floatval(str_replace(",", "", $_POST['debit']));
$credit = floatval(str_replace(",", "", $_POST['credit']));
$total = $_POST['total'];
$billId = $_POST['billId'];

session_start();
$kasir = $_SESSION['email'];

if($cash + $debit + $credit != $total) {
    print 'failed';
}else {
    $ctrl = new PaymentController();

    if($cash != 0) {
        $model = new Model\NewPaymentModel();
        $model->setJumlah($cash);
        $model->setKasir($kasir);
        $model->setMetode('cash');
        $model->setTanggal(date('Y-m-d', time()));
        
        $ctrl->createPayment($model);
    }

    if($debit != 0) {
        $model = new Model\NewPaymentModel();
        $model->setJumlah($cash);
        $model->setKasir($kasir);
        $model->setMetode('debit');
        $model->setTanggal(date('Y-m-d', time()));
        
        $ctrl->createPayment($model);
    }

    if($credit != 0) {
        $model = new Model\NewPaymentModel();
        $model->setJumlah($cash);
        $model->setKasir($kasir);
        $model->setMetode('credit');
        $model->setTanggal(date('Y-m-d', time()));
        
        $ctrl->createPayment($model);
    }
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    $ctrl->updateCustomerStay((int)$_POST['custStayId']);

    print 'ListCheckOut.php';
    // print $_POST['custStayId'];
    
}

class PaymentController {
    public function createPayment(Model\NewPaymentModel $payment) {
        $service = new Service\PaymentService();
        $service->createPayment($payment);
    }

    public function updateCustomerStay($id) {
        $service = new Service\CustomerStayService();
        $service->updateCheckout($id);
    }
}
?>