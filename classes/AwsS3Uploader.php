<?php
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

class AwsS3Uploader {
    private $access_key;
    private $secret_key;
    private $bucket_name;
    private $bucket_region;
    private $s3;

    public function __construct($access_key, $secret_key, $bucket_name,$bucket_region) {
        $this->access_key = $access_key;
        $this->secret_key = $secret_key;
        $this->bucket_name = $bucket_name;
        $this->bucket_region = $bucket_region;
        $this->s3 = S3Client::factory(array(
            'version' => 'latest',
            'region' => $this->bucket_region,
            'credentials' => [
                'key' => $this->access_key,
                'secret' => $this->secret_key,
            ],
        ));
    }

    public function uploadFile($file) {
        $filename = $file['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $s3_filename = uniqid('', true) . ".$ext";
        $s3_path = "uploads/$s3_filename";
        try {
            $result = $this->s3->putObject([
                'Bucket' => $this->bucket_name,
                'Key' => $s3_path,
                'SourceFile' => $file['tmp_name'],
                'ACL' => 'public-read',
            ]);
            $s3_url = $result['ObjectURL'];
            return $s3_url;
        } catch (S3Exception $e) {
            return $e->getMessage();
        }
    }
}