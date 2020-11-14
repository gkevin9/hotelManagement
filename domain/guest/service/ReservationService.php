<?php
namespace domain\guest\service;

$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/guest/dao/ReservationDao.php";
$tempB = $_SERVER['DOCUMENT_ROOT']."/domain/guest/entity/Reservation.php";

require_once($tempA);
require_once($tempB);

use domain\guest\dao as Dao;
use domain\guest\entity as Entity;

class ReservationService {
  public function getAllReservation(){
    $dao = new Dao\ReservationDao();
    $listReservation = $dao->getAll();

    return $listReservation;
  }
}
?>
