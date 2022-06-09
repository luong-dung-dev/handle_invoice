<?php
  require_once "File.php";
  require_once "Supplier.php";
  require_once "Invoice.php";

  class Handle {
    private $suppliers;
    private $invoice;

    public function __construct($invoiceData, $supplierData) {
      $supplierData  = new MyLib\File($supplierData);
      $suppliers     = $supplierData->parseCsvToArray();
      $supplier_list = array();

      #Create Supplier instance and push to suppliers
      foreach ($suppliers as $supplier) {
        array_push($supplier_list, new Supplier($supplier));
      }

      $this->suppliers = $supplier_list;
      $this->invoice   = new Invoice($invoiceData);
    }

    public function findSupplierOfInvoiceUse() {
      #Create an array key => value with key is words extracted from the invoice.
      foreach($this->invoice->words as $word) {
        $wordList[$word->word] = $word;
      }

      #Loop over supplier names.
      foreach($this->suppliers as $supplier) {
        $matchFlag     = true;
        $supplierWords = explode(" ", $supplier->name); #Because supplier name has many words so we need to separate it to check.

        foreach($supplierWords as $index => $word) {
          #If the word is not in the invoice word list, then break.
          if(!isset($wordList[$word])) {
            $matchFlag = false;
            break;
          }

          if($index > 0 && $matchFlag) {
            $previousWord       = $supplierWords[$index - 1];
            $previousWordInList = $wordList[$previousWord];
            $currentWordInList  = $wordList[$word];

            #Checking if the supplier name words do not appear on the same page, are not on the same line, and are not adjacent to each other, then this is not satisfied.
            if($previousWordInList->page_id != $currentWordInList->page_id
              || $previousWordInList->line_id != $currentWordInList->line_id
              || $previousWordInList->pos_id != $currentWordInList->pos_id - 1) {
                $matchFlag = false;
                break;
            }
          }
        }

        if($matchFlag) return $supplier->name;
      }

      return "";
    }
  }