<?php ob_start(); ?>

<?php
function getMediaFromApi(){

$api_key = "b3614915c9940749621d53925f4408c9";
$api_url_example = "https://api.themoviedb.org/3/movie/550?api_key=";
$api_token = "eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJiMzYxNDkxNWM5OTQwNzQ5NjIxZDUzOTI1ZjQ0MDhjOSIsInN1YiI6IjVkMGI1OTc1YzNhMzY4NjJmYTFlNTJlYSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.jfYiZG-ydiK4hZuMWYgpUPTtp_dOnfWOuJz4WCbQo0E";
$xml = file_get_contents("http://www.example.com/file.xml");

  $headers = array(
    'Content-Type: application/json',
    sprintf('Authorization: Bearer %s', $api_token)
  );

  $curl = curl_init($api_url_example . $api_key);

  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

  $result = json_decode(curl_exec($curl));

  var_dump($result);
}
getMediaFromApi();
?>

<div class="row">
    <div class="col-md-4 offset-md-8">
        <form method="get">
            <div class="form-group has-btn">
                <input type="search" id="search" name="title" value="<?= $search; ?>" class="form-control"
                       placeholder="Rechercher un film ou une série">

                <button type="submit" class="btn btn-block bg-red">Valider</button>
            </div>
        </form>
    </div>
</div>

<div class="media-list">
    <?php foreach( $medias as $media ): ?>

        <a class="item" href="../ec-code-2020-codflix-php/view/detailMediaView.php?media=<?=$media['id'];?>">
            <div class="video">
                <div>
                <!-- mettre imageFilm dans iframe -->
                   <!-- <iframe allowfullscreen="" frameborder="0"
                            src="<?= $media['trailer_url']; ?>" 
                            -->
                            ></iframe>
                </div>
            </div>
            <div class="title"><?= $media['title']; ?></div>
        </a>
    <?php endforeach; ?>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>
