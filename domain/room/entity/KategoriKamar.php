<?php
namespace domain\room\entity;
class KategoriKamar{
        private $id;
        private $nama;

        public function getId() {
                return $this->id;
        }

        public function setId($id) {
                $this->id = $id;

        }

        public function getNama() {
                return $this->nama;
        }

        public function setNama($nama) {
                $this->nama = $nama;
        }
}
?>
