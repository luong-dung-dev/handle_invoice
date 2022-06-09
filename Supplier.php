<?php
  class Supplier {
    public $id;
    public $name;

    public function __construct($supplier) {
      $this->id   = $supplier[0];
      $this->name = $supplier[1];
    }
  }
