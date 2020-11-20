<?php
namespace presentation\receptionist\view;
use domain\guest\model as Model;
use presentation\receptionist\controller as Ctrl;
use domain\guest\service as Service;

require_once('CustomerController.php');
require_once('../../../domain/guest/model/NewCustomerModel.php');
require_once('../../../domain/guest/service/CustomerService.php');

$newCustCtrl = new NewCustomerController();
$isKtpDuplicate = $newCustCtrl->isDuplicate($_POST['nomorIdentitas']);

if(!$isKtpDuplicate) {
    $newCust = new Model\NewCustomerModel();
    $newCust->setNama($_POST['nama']);
    $newCust->setNomorIdentitas($_POST['nomorIdentitas']);
    $newCust->setNomorKendaraan($_POST['nomorKendaraan']);
    $newCust->setNomorTelepon($_POST['nomorTelepon']);

    $ctrl = new Ctrl\CustomerController();
    $ctrl->createNew($newCust);

    print "../view/ListCustomer.php";
}else {
    print "failed";
}

class NewCustomerController {
    public function isDuplicate($ktp) {
        $service = new Service\CustomerService();
        return $service->isKtpDuplicate($ktp);
    }
}

?>