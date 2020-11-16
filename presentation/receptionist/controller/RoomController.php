<?php
namespace presentation\receptionist\controller;

$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/room/service/RoomService.php";

require_once($tempA);

use domain\room\service as Service;

class RoomController {
    public function getUnusedRoom() {
        $service = new Service\RoomService();
        $listKamar = $service->getUnusedRoom();

        return $listKamar;
    }
}
?>