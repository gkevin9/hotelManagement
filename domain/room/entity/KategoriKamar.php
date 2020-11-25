<?php
namespace domain\room\entity;
use JsonSerializable;
class KategoriKamar implements JsonSerializable{
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

        public function jsonSerialize() {
                return [
                        'id' => $this->getId(),
                        'nama' => $this->getNama()
                ];
        }
}
?>
