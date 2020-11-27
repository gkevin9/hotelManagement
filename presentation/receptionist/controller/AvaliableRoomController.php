<?php
namespace presentation\receptionist\controller;

require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/service/RoomAvaliabilityService.php");

use domain\guest\service as ServiceReservation;

$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$ctrl = new ServiceReservation\RoomAvaliabilityService();
$avaliableRoomArray = $ctrl->getAvaliableRoomFromDate($checkin, $checkout);
// echo var_dump($newRoomAssocArray);
print json_encode($avaliableRoomArray);
?>