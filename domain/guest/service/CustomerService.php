<?php
namespace domain\guest\service;

$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/guest/dao/CustomerDao.php";

require $tempA;

use domain\quest\dao as Dao;

class CustomerService {
  public function getAllCustomer(){
    $dao = new Dao\CustomerDao();
    $listCustomer = $dao->getAll();

    return $listCustomer;
  }

  public function createNew(Customer $cust) {

  }

  public function edit(Customer $cust) {
    
  }
}
?>
