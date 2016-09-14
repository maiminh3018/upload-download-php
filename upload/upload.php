<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//    echo '<pre>';
//    //you can see properties of $_FILE
//    var_dump($file);
//    echo '</pre>';
    $file = $_FILES["file"];
    $name = $file['name'];
    $type = $file['type'];
    $size = $file['size']; //bytes unit
    $tmp_name = $file['tmp_name'];
    // max file size you are uploaded
    $maxSize = 1024 * 1024 * 2;
    // file extension are allowed to upload
    $allowedExts = 'gif,jpg,jpeg,mp3,doc,docx,ppt,pptx,txt,pdf';
    // convert file input to fetch extension
    $inputExt = substr($name, strrpos($name, '.') + 1);

    $individualExt = explode(',', $allowedExts); // convert string extension into array
    //comparing between 2 value
    if (!in_array($inputExt, $individualExt)) {
        echo "Only the file as $allowedExts are allowed to upload";
    }
    // rule max file size you can check (and can set in file configuration php.ini
    if ($size > $maxSize) {
        echo "Only file size less than 2MB is available";
    }
    //if your system is window, you have to change directory is /upload/storage
    $uploadDir = "/var/www/html/upload/storage/";
    $uploadPath = $uploadDir . basename($name);

    //move and save path to database
    if (move_uploaded_file($tmp_name, $uploadPath)) {
        $conn = mysqli_connect('localhost', 'root', '', 'oop');
        $insertFile = "INSERT INTO `uploads`(`path`, `type`, `size`) VALUES ('" . $uploadPath . "','" . $type . "',$size)";
        mysqli_query($conn, $insertFile);
        echo 'Your file is <b style="color:red;">' . $name . '</b> Upload file successfully!';
        mysqli_close($conn);
    } else {
        echo 'Cant upload file, some errors occured';
    }
} else {
    echo 'Select your file is less than 2MB';
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
    <input type="file" name="file" />
    <input type="submit" name="submit" value="Upload"/>
    <input type="hidden" name="MAX_FILE_SIZE" value="20000" />
</form>