<?php
  require_once "Handle.php";

  #
  $h = new Handle("invoice.txt", "suppliernames.txt");
  $supplier = $h->findSupplierOfInvoiceUse();

  if(empty($supplier)) echo "No any match!";
  if(!empty($supplier)) echo "Supplier name of the invoice is: " . $supplier;
