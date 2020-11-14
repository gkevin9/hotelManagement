<?php
namespace domain\kitchen\service;

$tempA = $_SERVER['DOCUMENT_ROOT']."/domain/kitchen/dao/BahanDao.php";
$tempB = $_SERVER['DOCUMENT_ROOT']."/domain/kitchen/entity/Bahan.php";
$tempC = $_SERVER['DOCUMENT_ROOT']."/domain/kitchen/model/NewBahanModel.php";

require_once($tempA);
require_once($tempB);
require_once($tempC);

use domain\kitchen\dao as Dao;
use domain\kitchen\entity as Entity;
use domain\kitchen\model as Model;

class BahanService {
  public function getAllBahan(){
    $dao = new Dao\BahanDao();
    $listBahan = $dao->getAll();

    // echo $listBahan[1]->getId();
    return $listBahan;
  }

  public function createNew(Model\NewBahanModel $bahanModel) {
    $bahan = new Entity\Bahan();
    $bahan->setId($bahanModel->getId());
    $bahan->setNama($bahanModel->getNama());
    $bahan->setJumlah($bahanModel->getJumlah());
    $bahan->setHarga($bahanModel->getHarga());
    $bahan->setExpDate($bahanModel->getExpDate());

    $dao = new Dao\BahanDao();
    $dao->createNew($bahan);
  }

}
?>
