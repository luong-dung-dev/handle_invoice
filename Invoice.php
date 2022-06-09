<?php
  require_once "File.php";
  require_once "Word.php";

  class Invoice {
    public $words;

    public function __construct($invoiceData) {
      $invoiceData = new MyLib\File($invoiceData);
      $words = $invoiceData->parseJsonToArray();

      $word_list = array();
      foreach ($words as $word) {
        array_push($word_list, new Word($word));
      }

      $this->words = $word_list;
    }
  }
