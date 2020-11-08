<?php
namespace domain\humanresource\service;

use domain\humanresource\entity\Staff; 
use domain\humanresource\dao\StaffDao; 
use domain\humanresource\model\StaffLoginModel;

// Menyediakan fungsi sesuai use-case terkait customer.
class StaffService {

    private $dao;

    function __construct() {
        $dao = new StaffDao();
    }

    public function validateCredential(StaffLoginModel $staffLogin)
    {
        $staff = new Staff;
        $staff->setEmail($staffLogin->email);
        $staff->setPassword($staffLogin->password);

        $result = $dao->get($staff);

        //true ato false
        return $result;
    }
}
?>