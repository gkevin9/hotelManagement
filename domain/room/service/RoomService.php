<?php
namespace domain\room\service;

$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/room/dao/RoomDao.php";

require_once($tempA);

use domain\room\dao as Dao;

class RoomService {
    public function getUnusedRoom() {
        $dao = new Dao\RoomDao();
        $listKamar = $dao->getUnusedRoom();

        return $listKamar;
    }
}
?>