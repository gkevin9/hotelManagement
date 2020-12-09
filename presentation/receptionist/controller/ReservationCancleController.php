<?php
namespace presentation\receptionist\controller;
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/service/ReservationService.php");

use domain\guest\service as Service;

$id = $_GET['id'];
$ctrl = new ReservationCancleController();
$ctrl->customerCancle($id);
header("Location: ../view/ListReservation.php");

class ReservationCancleController {
    public function customerCancle($id) {
        $service = new Service\ReservationService();
        $service->cancleReservation($id);
    }
}
?>