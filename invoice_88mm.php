<?php 

// call the pdf library
require('fpdf/fpdf.php');

    include_once'connectdb.php';
    session_start();

        if($_SESSION['useremail']=="" OR $_SESSION['role']=="User"){
      header('location:index.php');
    }

    $id=$_GET['id'];

    $select=$pdo->prepare("select * from tbl_invoice where invoice_id=$id");
    $select->execute();

    $row=$select->fetch(PDO::FETCH_OBJ);


// create pdf object 
$pdf = new FPDF('P', 'mm', array(80, 200));

// add new page
$pdf->AddPage();

// set font to arial, bold, 16px
// cell (width, height, 'text', border, end line, 'align')
$pdf->SetFont('Arial', 'B', '16');
$pdf->Cell(60, 8, 'Techno 3 Jejen', 1, 1, 'C');
$pdf->SetFont('Arial', 'B', '8');
$pdf->Cell(60, 5, 'Address : Adisana, Bumiayu - Jateng', 0, 1, 'C');
$pdf->Cell(60, 5, 'Phone Number : 082279794813', 0, 1, 'C');
$pdf->Cell(60, 5, 'Email Address : masruri@gmail.com', 0, 1, 'C');
$pdf->Cell(60, 5, 'Website : www.techno3.com', 0, 1, 'C');

// line(x1,y1,x2,y2)
$pdf->Line(7, 38, 73, 38);

$pdf->Ln(1); //line break

$pdf->SetFont('Arial', 'BI', '8');
$pdf->Cell(20, 4, 'Bill To :', 0, 0, '');

$pdf->SetFont('Courier', 'BI', '8');
$pdf->Cell(40, 4, $row->customer_name, 0, 1, ''); 

$pdf->SetFont('Arial', 'BI', '8');
$pdf->Cell(20, 4, 'Invoice no :', 0, 0, '');

$pdf->SetFont('Courier', 'BI', '8');
$pdf->Cell(40, 4, $row->invoice_id, 0, 1, ''); 

$pdf->SetFont('Arial', 'BI', '8');
$pdf->Cell(20, 4, 'Date :', 0, 0, '');

$pdf->SetFont('Courier', 'BI', '8');
$pdf->Cell(40, 4, $row->order_date, 0, 1, ''); 

// product table code
$pdf->SetX(7);
$pdf->SetFont('Courier', 'B', '8');
$pdf->Cell(34, 5, 'PRODUCT', 1, 0, 'C');
$pdf->Cell(11, 5, 'QTY', 1, 0, 'C');
$pdf->Cell(8, 5, 'PRC', 1, 0, 'C');
$pdf->Cell(12, 5, 'TOTAL', 1, 1, 'C');

    $select=$pdo->prepare("select * from tbl_invoice_details where invoice_id=$id");
    $select->execute();

    while($item=$select->fetch(PDO::FETCH_OBJ)){
        $pdf->SetX(7);
        $pdf->SetFont('Helvetica', 'B', '6');
        $pdf->Cell(34, 5, $item->product_name, 1, 0, 'L');
        $pdf->Cell(11, 5, $item->qty, 1, 0, 'C');
        $pdf->Cell(8, 5, $item->price, 1, 0, 'C');
        $pdf->Cell(12, 5, $item->price*$item->qty, 1, 1, 'C');
    }


$pdf->SetX(7);
$pdf->SetFont('Courier', 'B', '8');
$pdf->Cell(20, 5, '', 0, 0, 'L');
// $pdf->Cell(20, 5, '', 0, 0, 'C');
$pdf->Cell(25, 5, 'Sub Total', 1, 0, 'C');
$pdf->Cell(20, 5, $row->subtotal, 1, 1, 'C');

$pdf->SetX(7);
$pdf->SetFont('Courier', 'B', '8');
$pdf->Cell(20, 5, '', 0, 0, 'L');
// $pdf->Cell(20, 5, '', 0, 0, 'C');
$pdf->Cell(25, 5, 'Tax (5%)', 1, 0, 'C');
$pdf->Cell(20, 5, $row->tax, 1, 1, 'C');

$pdf->SetX(7);
$pdf->SetFont('Courier', 'B', '8');
$pdf->Cell(20, 5, '', 0, 0, 'L');
// $pdf->Cell(20, 5, '', 0, 0, 'C');
$pdf->Cell(25, 5, 'Discount', 1, 0, 'C');
$pdf->Cell(20, 5, $row->discount, 1, 1, 'C');

$pdf->SetX(7);
$pdf->SetFont('Courier', 'B', '8');
$pdf->Cell(20, 5, '', 0, 0, 'L');
// $pdf->Cell(20, 5, '', 0, 0, 'C');
$pdf->Cell(25, 5, 'Grandtotal', 1, 0, 'C');
$pdf->Cell(20, 5, $row->total, 1, 1, 'C');

$pdf->SetX(7);
$pdf->SetFont('Courier', 'B', '8');
$pdf->Cell(20, 5, '', 0, 0, 'L');
// $pdf->Cell(20, 5, '', 0, 0, 'C');
$pdf->Cell(25, 5, 'Paid', 1, 0, 'C');
$pdf->Cell(20, 5, $row->paid, 1, 1, 'C');

$pdf->SetX(7);
$pdf->SetFont('Courier', 'B', '8');
$pdf->Cell(20, 5, '', 0, 0, 'L');
// $pdf->Cell(20, 5, '', 0, 0, 'C');
$pdf->Cell(25, 5, 'Due', 1, 0, 'C');
$pdf->Cell(20, 5, $row->due, 1, 1, 'C');

$pdf->SetX(7);
$pdf->SetFont('Courier', 'B', '8');
$pdf->Cell(20, 5, '', 0, 0, 'L');
// $pdf->Cell(20, 5, '', 0, 0, 'C');
$pdf->Cell(25, 5, 'Payment type', 1, 0, 'C');
$pdf->Cell(20, 5, $row->payment_type, 1, 1, 'C');


$pdf->Cell(20, 5, '', 0, 1, '');

$pdf->SetX(7);
$pdf->SetFont('Courier', 'B', '8');
$pdf->Cell(25, 5, 'Important Notice :', 0, 1, '');

$pdf->SetX(7);
$pdf->SetFont('Arial', '', '5');
$pdf->Cell(75, 5, 'No item will be re replaced or refunded if you dont have the invoice width you.', 0, 2, '');

$pdf->SetX(7);
$pdf->SetFont('Arial', '', '5');
$pdf->Cell(75, 5, 'You can refund within 2 days of purchase.', 0, 1, '');






// $pdf->SetFont('Arial', '', '10');
// $pdf->Cell(112, 5, 'Invoice : '.$row->invoice_id, 0, 1, 'C');
// $pdf->SetFont('Arial', '', '10');
// $pdf->Cell(112, 5, 'Date : '.$row->order_date, 0, 1, 'C');

// output & result
$pdf->Output();

?>