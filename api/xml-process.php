<?php

if (empty($_POST) || empty($_POST['product-name']) || empty($_POST['quantity-in-stock']) || empty($_POST['price-per-item'])) {
    //double validation
    die;
}

//Creates XML string and XML document using the DOM 
$dom = new DomDocument('1.0', 'UTF-8');

//add root == ProductDetails
$ProductDetails = $dom->appendChild($dom->createElement('ProductDetails'));

//add track element to ProductDetails
$details = $dom->createElement('details');
$ProductDetails->appendChild($details);

// Appending attributes to $details
$attr = $dom->createAttribute('product-name');
$attr->appendChild($dom->createTextNode($_POST['product-name']));
$details->appendChild($attr);
$attr = $dom->createAttribute('quantity-in-stock');
$attr->appendChild($dom->createTextNode($_POST['quantity-in-stock']));
$details->appendChild($attr);
$attr = $dom->createAttribute('price-per-item');
$attr->appendChild($dom->createTextNode($_POST['price-per-item']));
$details->appendChild($attr);

$dom->formatOutput = true; // set the formatOutput attribute of domDocument to true
// save XML as string or file 
$test1 = $dom->saveXML(); // put string in test1
$dom->save('product-file.xml'); // save as file
//generate HTML table
$result = '';
$result .= '<div class="row">
                <div class="col-lg-12">
                 <table width="100%" class="table table-striped table bordered table-responsive">
                    <thead>
                    <tr>                    
                    <th class="text-left">Product Name</th>
                    <th class="text-left">Quantity In Stock</th>
                    <th class="text-left">Price Per Item</th>
                    <th class="text-left">Date Submitted</th>
                    <th class="text-left">Total value number</th>
                </tr>
                </thead>
                <tbody>';
$result .= '<tr>';
$result .= '<td>' . $_POST['product-name'] . '</td>';
$result .= '<td>' . $_POST['quantity-in-stock'] . '</td>';
$result .= '<td>' . $_POST['price-per-item'] . '</td>';
$result .= '<td>' . date('Y-m-d H:i:s') . '</td>';
$result .= '<td>' . $_POST['quantity-in-stock'] * $_POST['price-per-item'] . '</td>';
$result .= '</tr>';
$result .= '</tbody>
                                </table>
                            </div>
                     </div>';

echo $result;

