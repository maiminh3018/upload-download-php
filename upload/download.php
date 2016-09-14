<?php
//connect to database
$conn = mysqli_connect('localhost', 'root', '', 'oop');
//display error when they cant download because it can be some error occurred
$error = 'Your file you want to download is not exist or are allowed to download!';

if(isset($_GET['file'])  && basename($_GET['file']) == $_GET['file']) {
    //if your system is window or so on, you have to change $path to $path = 'upload/storage/'
    $path = '/var/www/html/upload/storage/'; //in linux system
    $filename = $_GET['file'];
    $path = $path.$filename;
    $queryDown = "SELECT path FROM uploads where path='".$path."' ";
    $queryExcute = mysqli_query($conn,$queryDown);
    $queryRes = mysqli_fetch_array($queryExcute);
//    var_dump($queryRes);
    
    if(file_exists($path) && is_readable($path)){
        $fileSize = filesize($path);
        //send header to browser
        header('Content-Type: application/octet-stream');
        header('Content-Length: '.$fileSize);
        header('Content-Disposition: attachment; filename='.$filename);
        header('Content-Transfer-Encoding: binary');

    //    open file in read-only binary mode
        $file = @fopen($path,'rb');
        if($file) {
            fpassthru($file);
        }
        else {
            echo $error; //display error
        }
    }

}
mysqli_close($conn);
?>






