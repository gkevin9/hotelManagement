<?php
namespace presentation\receptionist\controller;

require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/service/RoomAvaliabilityService.php");

use domain\guest\service as ServiceReservation;

$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$person = $_POST['person'];

// if($checkin >= $checkout) {
//     print json_encode("wrongCheckinDate");
// }else {
//     $ctrl = new ServiceReservation\RoomAvaliabilityService();
//     $avaliableRoomArray = $ctrl->getAvaliableRoomFromDate($checkin, $checkout, $person);
    
//     if(empty($avaliableRoomArray)) {
//         print json_encode("noRoom");
//     }else {
//         print json_encode($avaliableRoomArray);
//     }
    
// }

$ctrl = new AvaliableRoomController();
$result = $ctrl->getAvaliableRoom($checkin, $checkout, $person);
print json_encode($result);

class AvaliableRoomController {
    public function getAvaliableRoom($checkin, $checkout, $person) {
        if($this->validateDate($checkin, $checkout)){
            return "wrongCheckinDate";
        }else {
            $ctrl = new ServiceReservation\RoomAvaliabilityService();
            $avaliableRoomArray = $ctrl->getAvaliableRoomFromDate($checkin, $checkout, $person);
            
            if(empty($avaliableRoomArray)) {
                return "noRoom";
            }else {
                return $avaliableRoomArray;
            }
        }
    }

    private function validateDate($checkin, $checkout) {
        return $checkin >= $checkout;
    }
}

?>