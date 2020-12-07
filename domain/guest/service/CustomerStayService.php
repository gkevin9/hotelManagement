<?php
namespace domain\guest\service;

require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/dao/CustomerStayDao.php");
require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/entity/CustomerStay.php");
require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/dao/ReservationDao.php");

use domain\guest\entity as Entity;
use domain\guest\dao as Dao;

class CustomerStayService {
    public function newCustomerStay($id) {
        $uangMukaTotal = $this->getTotalUangMuka($id);

        $entity = new Entity\CustomerStay();
        $entity->setId($id);
        $entity->setNominalUangMuka($uangMukaTotal);

        $dao = new Dao\CustomerStayDao();
        $dao->creatNew($entity);

        $this->changeReservationStatus($id);
    }

    public function getUangMuka($id) {
        $dao = new Dao\ReservationDao();
        $result = $dao->getSelectedReservationWithRoom($id);

        return $result;
    }

    public function getLama($id) {
        $dao = new Dao\ReservationDao();
        $result = $dao->getSelectedReservationWithLama($id);

        return $result;
    }

    private function getTotalUangMuka($id) {
        $uangMuka = $this->getUangMuka($id);
        $lamaInap = $this->getLama($id);
        echo $uangMuka;
        echo $lamaInap;
        return $lamaInap * $uangMuka;
    }

    private function changeReservationStatus($id) {
        $dao = new Dao\ReservationDao();
        $dao->changeReservationStatus($id);
    }

    public function updateCheckout($id) {
        $dao = new Dao\CustomerStayDao();
        $dao->updateWaktuCheckout($id);
    }
}
?>