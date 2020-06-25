<?php
include("../model/media.php");
echo 'coucou';
$id = $_GET['media'];
echo $id;

$data = Media::getMediaById($id);

$genre_id = $data[0]['genre_id'];
$title = $data[0]['title'];
$status = $data[0]['status'];
$type = $data[0]['type'];
$release_date = $data[0]['release_date'];
$summary = $data[0]['summary'];
$trailer_url = $data[0]['trailer_url'];

echo $genre_id . " " . $title . " " . $status . " " . $type . " " . $release_date . " " . $summary . " " . $trailer_url;
?>

<iframe allowfullscreen=""
    src="<?= $trailer_url; ?>" >
</iframe>