<?php
namespace domain\room\entity;
    Class KategoriKamar{
        private $id;
        private $nama;

        /**
         * Get the value of id
         */
        public function getId() {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */
        public function setId($id) {
                $this->id = $id;

        }

        /**
         * Get the value of nama
         */
        public function getNama() {
                return $this->nama;
        }

        /**
         * Set the value of nama
         *
         * @return  self
         */
        public function setNama($nama) {
                $this->nama = $nama;

        }
    }
?>
