<?php
namespace presentation\kitchen\view;
use domain\kitchen\model as Model;
use domain\kitchen\service as Service;

require_once('../controller/BahanController.php');
require_once('../../../domain/kitchen/model/NewBahanModel.php');
require_once('../../../domain/kitchen/service/BahanService.php');

$ctrl = new NewBahanController();

$id = $_POST['id'];

$isValid = $ctrl->validateID($id);

if ($isValid){
    $newBahan = new Model\NewBahanModel();
    $newBahan->setId($_POST['id']);
    $newBahan->setNama($_POST['name']);
    $newBahan->setJumlah(floatval(str_replace(",", "", $_POST['jumlah'])));
    $newBahan->setHarga(floatval(str_replace(",", "", $_POST['harga'])));
    $newBahan->setExpDate($_POST['exp_date']);

    $service = new Service\BahanService();
    $service->createNew($newBahan);

    print "../view/ListBahan.php";
} else {
    print "failed";
}

class NewBahanController {
    public function validateID($id) {
        
        $service = new Service\BahanService();
        $isValidate = $service->validateCredential($id);
        
        return $isValidate;
    }
}
?>