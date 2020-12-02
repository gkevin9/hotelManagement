<?php
namespace domain\guest\entity;

Class CustomerStay{
      private $id;
      private $nominalUangMuka;
      private $waktuCheckIn;
      private $waktuCheckOut;

      public function setId($id) {
        $this->id = $id;
      }

      public function getId() {
        return $this->id;
      }

      public function setNominalUangMuka($nominalUangMuka) {
        $this->nominalUangMuka = $nominalUangMuka;
      }

      public function getNominalUangMuka() {
        return $this->nominalUangMuka;
      }

      public function setWaktuCheckIn($waktuCheckIn) {
        $this->waktuCheckIn = $waktuCheckIn;
      }

      public function getWaktuCheckIn() {
        return $this->waktuCheckIn;
      }

      public function setWaktuCheckOut($waktuCheckOut) {
        $this->waktuCheckOut = $waktuCheckOut;
      }

      public function getWaktuCheckOut() {
        return $this->waktuCheckOut;
      }

}
?>
