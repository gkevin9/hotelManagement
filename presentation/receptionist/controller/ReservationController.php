<?php
namespace presentation\receptionist\controller;

$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/guest/service/ReservationService.php";

require_once($tempA);

use domain\guest\service as Service;

class ReserevationController {
    public function getAll() {
        $service = new Service\ReservationService();
        $listReservation = $service->getAllReservation();
        return $listReservation;
    }
}

?>