<?php
namespace presentation\receptionist\controller;

require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/service/ReservationService.php");
require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/model/NewReservationModel.php");

use domain\guest\service as Service;
use domain\guest\model as Model;

$newReservation = new Model\NewReservationModel();
$newReservation->setKamar($_POST['room']);
$newReservation->setLama($_POST['lama']);
$newReservation->setNama($_POST['nomorIdentitas']);
$newReservation->setNamaPemesan($_POST['nama']);
$newReservation->setNomorTelepon($_POST['nomorTelepon']);
// $newReservation->setStatus('');
$newReservation->setTanggalCheckIn($_POST['checkin']);
$newReservation->setBykOrang($_POST['person']);

$ctrl = new NewReservationController();
$ctrl->newReservation($newReservation);

class NewReservationController {
    public function newReservation(Model\NewReservationModel $newReservation) {
        $service = new Service\ReservationService();
        $service->newReservation($newReservation);
    }
}
?>