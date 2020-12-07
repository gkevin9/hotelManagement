<?php
namespace presentation\receptionist\controller;

require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/model/NewBillModel.php");
require_once($_SERVER['DOCUMENT_ROOT']."/domain/guest/service/BillService.php");

use domain\guest\model as Model;
use domain\guest\service as Service;

class BillController {
    public function getBill($id) {
        $service = new Service\BillService();
        $result = $service->getBill($id);

        return $result;
    }

    public function createBill(Model\NewBillModel $newBillModel) {
        $service = new Service\BillService();
        $service->createBill($newBillModel);
    }
}
?>