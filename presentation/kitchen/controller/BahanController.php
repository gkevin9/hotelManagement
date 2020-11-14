<?php
namespace presentation\kitchen\controller;

$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/kitchen/service/BahanService.php";
$tempB = $_SERVER['DOCUMENT_ROOT']."/domain/kitchen/model/NewBahanModel.php";

require_once($tempA);
require_once($tempB);

use domain\kitchen\service as Service;
use domain\kitchen\model as Model;

class BahanController {
    public function getAll() {
        $service = new Service\BahanService();
        $listBahan = $service->getAllBahan();
        return $listBahan;
    }

    public function createNew(Model\NewBahanModel $newBahan) {
        
        $service = new Service\BahanService();
        $service->createNew($newBahan);
    }
}

?>