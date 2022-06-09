## how to run
First, clone source code.
```
clone git@github.com:luong-dung-dev/handle_invoice.git
```

Change to handle_invoice directory.
```
cd handle_invoice
```

Run the main.php file and use the PHP command (Make sure you install PHP on the local machine).
```
php main.php
```

Below is the result for invoice.txt and suppliernames.txt when I run on local machine.
```
Supplier name of the invoice is: Demo Company
```

To change the invoice data and supplier names data, update the name file to the new data file when instantiating the Handle class in the main.php.
```
$h = new Handle("invoice.txt", "suppliernames.txt");
```
