<?php
namespace domain\guest\service;

require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/dao/CustomerStayDao.php");
require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/entity/CustomerStay.php");
require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/dao/ReservationDao.php");

use domain\guest\entity as Entity;
use domain\guest\dao as Dao;

class CustomerStayService {
    public function newCustomerStay($id) {
        $uangMuka = $this->getUangMuka($id);

        $entity = new Entity\CustomerStay();
        $entity->setId($id);
        $entity->setNominalUangMuka($uangMuka);

        $dao = new Dao\CustomerStayDao();
        $dao->creatNew($entity);

        $this->changeReservationStatus($id);
    }

    private function getUangMuka($id) {
        $dao = new Dao\ReservationDao();
        $result = $dao->getSelectedReservationWithRoom($id);

        return $result;
    }

    private function changeReservationStatus($id) {
        $dao = new Dao\ReservationDao();
        $dao->changeReservationStatus($id);
    }
}
?>