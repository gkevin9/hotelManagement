<?php
namespace domain\guest\service;

$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/guest/dao/CustomerDao.php";
$tempB = $_SERVER['DOCUMENT_ROOT']."/domain/guest/entity/Customer.php";
$tempC = $_SERVER['DOCUMENT_ROOT']."/domain/guest/model/NewCustomerModel.php";

require_once($tempA);
require_once($tempB);
require_once($tempC);

use domain\guest\dao as Dao;
use domain\guest\entity as Entity;
use domain\guest\model as Model;

class CustomerService {
  public function getAllCustomer(){
    $dao = new Dao\CustomerDao();
    $listCustomer = $dao->getAll();

    return $listCustomer;
  }

  public function createNew(Model\NewCustomerModel $custModel) {
    $customer = new Entity\Customer();
    $customer->setNama($custModel->getNama());
    $customer->setNomorIdentitas($custModel->getNomorIdentitas());
    $customer->setNomorKendaraan($custModel->getNomorKendaraan());
    $customer->setNomorTelepon($custModel->getNomorTelepon());

    $dao = new Dao\CustomerDao();
    $dao->createNew($customer);
  }

  public function getSelectedCustomer($ktp) {
    $dao = new Dao\CustomerDao();
    $result = $dao->getSelectedCustomer($ktp);
  
    return $result;
  }

  public function update(Model\NewCustomerModel $custModel) {
    $customer = new Entity\Customer();
    $customer->setNama($custModel->getNama());
    $customer->setNomorIdentitas($custModel->getNomorIdentitas());
    $customer->setNomorKendaraan($custModel->getNomorKendaraan());
    $customer->setNomorTelepon($custModel->getNomorTelepon());

    $dao = new Dao\CustomerDao();
    $dao->update($customer);
  }

  public function isKtpDuplicate($ktp) {
    $cust = $this->getSelectedCustomer($ktp);
    
    if (is_null($cust->getNama())) {
      return False;
    }else {
      return True;
    }
  }
}
?>
