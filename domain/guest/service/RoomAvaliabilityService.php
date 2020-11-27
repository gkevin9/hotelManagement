<?php
namespace domain\guest\service;

require_once($_SERVER['DOCUMENT_ROOT']."/domain/room/service/RoomService.php");
require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/service/ReservationService.php");

use domain\room\service as ServiceRoom;
use domain\guest\service as ServiceReservation;

class RoomAvaliabilityService {

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