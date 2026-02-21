<?php
include '../components/connect.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:admin_login.php');
}


require('../FPDF/fpdf.php');


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);


$pdf->Cell(190, 10, 'All Customer Account Details', 1, 1, 'C');
$pdf->Ln(10);


$select_accounts = $conn->prepare("SELECT * FROM `customers`");
$select_accounts->execute();

if ($select_accounts->rowCount() > 0) {
    while ($row = $select_accounts->fetch(PDO::FETCH_ASSOC)) {
        $user_id = $row['id'];
        $username = $row['name'];
        $email = $row['email'];

       
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(40, 10, 'User ID:', 0, 0);
        $pdf->Cell(100, 10, $user_id, 0, 1);

        $pdf->Cell(40, 10, 'Username:', 0, 0);
        $pdf->Cell(100, 10, $username, 0, 1);

        $pdf->Cell(40, 10, 'Email:', 0, 0);
        $pdf->Cell(100, 10, $email, 0, 1);

        
        $pdf->Ln(5);
        $pdf->Cell(0, 0, '', 'T'); 
        $pdf->Ln(5);
    }
} else {
    
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(40, 10, 'No customer accounts found.', 0, 1);
}


$pdf->Output('D', 'Customer_details.pdf');
?>
