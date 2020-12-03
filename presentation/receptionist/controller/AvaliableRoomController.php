<?php
namespace presentation\receptionist\controller;

require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/service/RoomAvaliabilityService.php");

use domain\guest\service as ServiceReservation;

$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$person = $_POST['person'];
$ctrl = new ServiceReservation\RoomAvaliabilityService();
$avaliableRoomArray = $ctrl->getAvaliableRoomFromDate($checkin, $checkout, $person);
// echo var_dump($newRoomAssocArray);
print json_encode($avaliableRoomArray);
?>