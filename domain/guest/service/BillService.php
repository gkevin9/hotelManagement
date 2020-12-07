<?php
namespace domain\guest\service;

require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/dao/BillDao.php");
require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/entity/Bill.php");
require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/model/NewBillModel.php");

use domain\guest\dao as Dao;
use domain\guest\entity as Entity;
use domain\guest\model as Model;

class BillService {
    public function getBill($id) {
        $dao = new Dao\BillDao();
        $result = $dao->getFromId($id);

        return $result;
    }

    public function createBill(Model\NewBillModel $bill) {

        $entity = new Entity\Bill();
        $entity->setAmount($bill->getAmount());
        $entity->setCustStay($bill->getCustStay());
        $entity->setDeskripsi($bill->getDeskripsi());
        $entity->setQuantity($bill->getQuantity());

        $dao = new Dao\BillDao();
        $dao->createNew($entity);
    }
}
?>