<?php
  require_once "Handle.php";

  #Initialize handle instance
  $handle   = new Handle("invoice.txt", "suppliernames.txt");
  $supplier = $handle->findSupplierOfInvoiceUse();

  if(empty($supplier)) echo "No any match!";
  if(!empty($supplier)) echo "Supplier name of the invoice is: " . $supplier;
