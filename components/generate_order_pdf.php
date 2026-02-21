<?php
include '../components/connect.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:admin_login.php');
    exit;
}


require_once('../TCPDF/tcpdf.php');


try {
    
    if (!$conn) {
        throw new Exception("Connection failed: " . $conn->errorInfo()[2]);
    }
} catch (Exception $e) {
    die($e->getMessage());
}

$sql = "SELECT * FROM orders"; 
$stmt = $conn->prepare($sql);
$stmt->execute();

$orders = [];
if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $orders[] = $row;
    }
} else {
    die("No orders found in the database.");
}


$totalOrders = count($orders);
$totalRevenue = array_sum(array_column($orders, 'total_price'));
$pendingOrders = count(array_filter($orders, fn($order) => $order['payment_status'] === 'pending'));
$completedOrders = count(array_filter($orders, fn($order) => $order['payment_status'] === 'completed'));


$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Admin Panel');
$pdf->SetTitle('All Orders Report');

$pdf->SetMargins(15, 15, 15);
$pdf->SetAutoPageBreak(TRUE, 15);


$pdf->AddPage();


$pdf->SetFont('helvetica', '', 12);


$pdf->Cell(0, 10, 'Orders Report', 0, 1, 'C');
$pdf->Ln(5);


$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(0, 10, "Total Orders: $totalOrders", 0, 1);
$pdf->Cell(0, 10, "Total Revenue: $$totalRevenue", 0, 1);
$pdf->Cell(0, 10, "Completed Orders: $completedOrders", 0, 1);
$pdf->Cell(0, 10, "Pending Orders: $pendingOrders", 0, 1);
$pdf->Ln(10);


foreach ($orders as $order) {
    $pdf->SetFont('helvetica', 'B', 10);
    $pdf->Cell(0, 10, 'Order Details', 0, 1, 'L');
    
    $pdf->SetFont('helvetica', '', 10);
    $pdf->MultiCell(0, 8, "Placed On: " . $order['placed_on'], 0, 'L', false);
    $pdf->MultiCell(0, 8, "Name: " . $order['name'], 0, 'L', false);
    $pdf->MultiCell(0, 8, "Number: " . $order['number'], 0, 'L', false);
    $pdf->MultiCell(0, 8, "Address: " . $order['address'], 0, 'L', false);
    $pdf->MultiCell(0, 8, "Total Products: " . $order['total_products'], 0, 'L', false);
    $pdf->MultiCell(0, 8, "Total Price: $" . $order['total_price'], 0, 'L', false);
    $pdf->MultiCell(0, 8, "Payment Method: " . $order['method'], 0, 'L', false);
    $pdf->MultiCell(0, 8, "Status: " . $order['payment_status'], 0, 'L', false);

    $pdf->Ln(5); 
}


$pdfFilename = 'All_Orders_Report_' . date('Y-m-d_H-i-s') . '.pdf';
$pdf->Output($pdfFilename, 'D'); 

$conn = null; 
?>
