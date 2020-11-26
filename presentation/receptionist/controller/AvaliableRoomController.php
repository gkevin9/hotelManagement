<?php
namespace presentation\receptionist\controller;
define('__ROOT__', dirname(dirname(__FILE__)));
ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/room/service/RoomService.php";
$tempB = $_SERVER['DOCUMENT_ROOT']."/domain/guest/service/ReservationService.php";

require_once($tempA);
require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/service/ReservationService.php");

use domain\room\service as ServiceRoom;
use domain\guest\service as ServiceReservation;

$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$ctrl = new AvaliableRoomController();
$newRoomAssocArray = $ctrl->getAvaliableRoomFromDate($checkin, $checkout);
// echo var_dump($newRoomAssocArray);
print json_encode($newRoomAssocArray);

class AvaliableRoomController {

    public function getAvaliableRoomFromDate($dateCheckIn, $dateCheckOut) {
        $listRoom = $this->getRoom();
        $listReservation = $this->getReservation();

        $roomAssocArray = $this->arrayToAssocArray($listRoom);
        $newRoomAssocArray = $this->removeOcupiedRoom($roomAssocArray, $listReservation);

        return $newRoomAssocArray;
    }

    public function getRoom() {
        $serviceRoom = new ServiceRoom\RoomService();
        $listKamar = $serviceRoom->getRooms();

        return $listKamar;
    }

    public function getReservation() {
        $serviceReservation = new ServiceReservation\ReservationService();
        $listReservatioin = $serviceReservation->getAllReservation();

        return $listReservatioin;
    }

    private function arrayToAssocArray($array) {
        $serviceRoom = new ServiceRoom\RoomService();
        $result = $serviceRoom->arrayToAssocArray($array);

        return $result;
    }

    private function removeOcupiedRoom($roomAssocArray, $listReservation) {
        
        foreach ($listReservation as $reservation) {
            if (!array_key_exists($reservation->getKamar(), $roomAssocArray)) {
                unset($roomAssocArray[$reservation->getKamar()]);
            }
        }

        return $roomAssocArray;
    }

    private function removeInsufficientRoom($roomAssocArray, $desiredNum) {
        foreach ($roomAssocArray as $room) {
            if($room->getJmlhOrg() < $desiredNum) {
                unset($roomAssocArray[$room->getNoKamar()]);
            }
        }

        return $roomAssocArray;
    }
}
?>