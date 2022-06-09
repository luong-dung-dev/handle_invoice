<?php
  namespace MyLib;

  class File {
    private $file;

    public function __construct($file) {
      $this->file = $file;
    }

    public function parseCsvToArray() {
      $lines = array();
      
      $file = fopen($this->file, 'r');
      while (($line = fgetcsv($file)) !== FALSE) {
        array_push($lines,$line);
      }
      fclose($file);

      return $lines;
    }

    public function parseJsonToArray() {
      $lines = array();

      $file = fopen($this->file, 'r');
      while (($line = fgets($file)) !== FALSE) {
        $line = str_replace("'", '"', $line);
        array_push($lines, json_decode($line));
      }
      fclose($file);

      return $lines;
    }
  }
