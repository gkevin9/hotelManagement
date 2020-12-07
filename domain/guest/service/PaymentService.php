<?php
namespace domain\guest\service;

require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/dao/PaymentDao.php");
require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/model/NewPaymentModel.php");
require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/entity/Payment.php");

use domain\guest\dao as Dao;
use domain\guest\model as Model;
use domain\guest\entity as Entity;

class PaymentService {
    public function createPayment(Model\NewPaymentModel $newPayment) {
        $entity = new Entity\Payment();
        $entity->setTanggal($newPayment->getTanggal());
        $entity->setJumlah($newPayment->getJumlah());
        $entity->setMetode($newPayment->getMetode());
        $entity->setBill($newPayment->getBill());
        $entity->setKasir($newPayment->getKasir());

        $dao = new Dao\PaymentDao();
        $dao->createNew($entity);
    }
}
?>