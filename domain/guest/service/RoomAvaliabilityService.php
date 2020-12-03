<?php
namespace domain\guest\service;

require_once($_SERVER['DOCUMENT_ROOT']."/domain/room/service/RoomService.php");
require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/service/ReservationService.php");

use domain\room\service as ServiceRoom;
use domain\guest\service as ServiceReservation;

class RoomAvaliabilityService {

    public function getAvaliableRoomFromDate($dateCheckIn, $dateCheckOut, $person) {
        $listRoom = $this->getRoom();
        $listReservation = $this->getReservation();

        $roomAssocArray = $this->arrayToAssocArray($listRoom);
        $roomAssocArray = $this->filterReservationWithSameDate($listReservation, $dateCheckIn, $dateCheckOut, $roomAssocArray);
        $newRoomAssocArray = $this->removeInsufficientRoom($roomAssocArray, $person);

        return $newRoomAssocArray;
        // return $newListReservation;
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

    private function filterReservationWithSameDate($listReservation, $dateCheckin, $dateCheckout, $roomAssocArray) {
        // 1. tgl checkin + lama = checkout
        // 2. cek tgl baru ada di antata checkin dan checkout
        // $list = array();
        // $dateCheckInReservation = date_create($dateCheckIn);
        foreach($listReservation as $reservation) {
            $checkin = date_create($reservation->getTanggalCheckin());
            $lama = date_interval_create_from_date_string($reservation->getLama() . " days");
            $checkout = date_format(date_add($checkin, $lama), "Y-m-d");

            
            if ($dateCheckout <= $checkout && $dateCheckout >= $reservation->getTanggalCheckin()) {
                unset($roomAssocArray[$reservation->getKamar()]);
            }
            if ($dateCheckin <= $checkout && $dateCheckin >= $reservation->getTanggalCheckin()) {
                unset($roomAssocArray[$reservation->getKamar()]);
            }
            
            // array_push($list, $checkout);
        }
        return $roomAssocArray;
        // return [$dateCheckin, $dateCheckout, $checkout, $checkin, $reservation->getTanggalCheckin()];
        // return $dateCheckout;
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