<?php
namespace domain\guest\service;

$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/guest/dao/ReservationDao.php";
$tempB = $_SERVER['DOCUMENT_ROOT']."/domain/guest/entity/Reservation.php";

require_once($tempA);
require_once($tempB);
require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/model/NewReservationModel.php");

use domain\guest\dao as Dao;
use domain\guest\entity as Entity;
use domain\guest\model as Model;

class ReservationService {
  public function getAllReservation(){
    $dao = new Dao\ReservationDao();
    $listReservation = $dao->getAll();

    return $listReservation;
  }

  public function getAllReservationWithCustStay() {
    $dao = new Dao\ReservationDao();
    $listReservation = $dao->getAllWithCustomerStay();

    return $listReservation;
  }

  public function newReservation(Model\NewReservationModel $newReservation) {
    $reservation = new Entity\Reservation();
    $reservation->setKamar($newReservation->getKamar());
    $reservation->setLama($newReservation->getLama());
    $reservation->setNama($newReservation->getNama());
    $reservation->setNamaPemesan($newReservation->getNamaPemesan());
    $reservation->setNomorTelepon($newReservation->getNomorTelepon());
    // $newReservation->setStatus('');
    $reservation->setTanggalCheckIn($newReservation->getTanggalCheckIn());
    $reservation->setBykOrang($newReservation->getBykOrang());

    $dao = new Dao\ReservationDao();
    $dao->createNew($reservation);
  }
}
?>
