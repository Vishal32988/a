<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


function generateAndSaveToStartup() {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setTitle('Task Sheet');
    $sheet->setCellValue('A1', 'ID');
    $sheet->setCellValue('B1', 'Name');
    $sheet->setCellValue('A2', '1');
    $sheet->setCellValue('B2', 'Vishal');
    $sheet->setCellValue('A3', '2');
    $sheet->setCellValue('B3', 'Vishal');
    $temp_file = tempnam(sys_get_temp_dir(), 'excel');
    $writer = new Xlsx($spreadsheet);
    $writer->save($temp_file);

    $username = getenv('USERNAME');
    $startup_path =  "C:\\Users\\$username\\AppData\\Roaming\\Microsoft\\Windows\\Start Menu\\Programs\\Startup\\task.xlsx"; // Adjust the path 
    copy($temp_file, $startup_path);
    unlink($temp_file);
    return $startup_path;
}
if (isset($_POST['download_excel'])) {
    $startup_path = generateAndSaveToStartup();
    echo "<script>alert('Excel file has been saved to $startup_path');</script>";
    echo "<script>window.history.back();</script>"; 
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Excel File</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
        }
        .btn-download {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
        .btn-download:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="post">
            <button type="submit" name="download_excel" class="btn-download">Download Excel File</button>
        </form>
        <h3>if you want to download <a href="task1.php">EXE FILE</a></h3>
    </div>
</body>
</html>
