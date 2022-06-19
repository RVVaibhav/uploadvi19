<?php 

require_once("spaces.php");


$key = "IFAE3JK7KC4O7ISSBBFM";
$secret = "GRAFLLJfcQIjL3YotXWYoVoGAHx0m4T+ANUX1osT2/U";

$space_name = "videoserver";
$region = "sgp1";

$space = new SpacesConnect($key, $secret, $space_name, $region);


$path_to_file = "image.jpg";

$space->UploadFile($path_to_file, "public");



$download_file = "image.jpg";
$save_as = "folder/downloaded-image.jpg";

$space->DownloadFile($download_file, $save_as);

?>