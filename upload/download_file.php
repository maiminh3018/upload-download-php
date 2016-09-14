<?php
include 'download.php';
//$conn = mysqli_connect('localhost', 'root', '', 'oop');
//you have to change your file name that you have uploaded to database by upload.php
$fileNameDownload = 'ttt.txt';
?>
<!--This is link download file--> 
Here is your <a href="download.php?file=<?php echo $fileNameDownload; ?>"  style="color:red;">download </a> link.
<!--<h1>Recently files you have downloaded! </h1>-->
<?php 
////    show all files from database
//    $queryDown = "SELECT * FROM `uploads` WHERE 1";
//    $queryExcute = mysqli_query($conn,$queryDown);
//    $queryRows = mysqli_num_rows($queryExcute);
//    
//    if($queryRows != 0) {
//        $queryRes = mysqli_fetch_array($queryExcute);
//        
//        echo '<table>';
//        echo '<th>ID</th><th>Name</th><th>Type</th><th>Size(bytes)</th>';
//        foreach($queryRes as $value) {
//            echo '<tr>';
//            echo      '<td>'.$queryRes['id'].'</td>'
//                    . '<td>'.$queryRes['path'].'</td>'
//                    . '<td>'.$queryRes.['type'].'</td>'
//                    . '<td>'.$queryRes['size'].'</td>';
//            echo '</tr>';
//        }
//    }
?>
