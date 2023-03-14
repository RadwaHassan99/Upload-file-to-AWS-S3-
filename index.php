<?php

require_once('vendor/autoload.php'); 
require_once("views/form.php");

$s3 = new AwsS3Uploader(_ACCESS_KEY_,_SECRET_KEY_,_BUCKET_NAME_,_BUKET_REGION_);

if(isset($_POST['submit'])) {
    $file = $_FILES['file'];
    $s3_url = $s3->uploadFile($file);
    if(!is_string($s3_url)) {
        echo '<p>Error uploading file: ' . $s3_url . '</p>';
    } else {
        echo '<p>File uploaded successfully to S3 Bucket! File URL: <a href="' . $s3_url . '">' . $s3_url . '</a></p>';
    }
}
