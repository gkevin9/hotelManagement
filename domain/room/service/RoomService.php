<?php
namespace domain\room\service;

$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/room/dao/RoomDao.php";

require_once($tempA);

use domain\room\dao as Dao;

class RoomService {
    public function getRooms() {
        $dao = new Dao\RoomDao();
        $listKamar = $dao->getRooms();

        return $listKamar;
    }

    public function arrayToAssocArray($listKamar) {
        
        $result = array();
        foreach ($listKamar as $kamar) {
            $result[$kamar->getNoKamar()] = $kamar;
        }

        return $result;
    }
}
?>