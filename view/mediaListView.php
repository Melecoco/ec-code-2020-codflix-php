<?php ob_start(); ?>

<?php

include("../model/media.php");

//delete this
include("../model/database.php");

function getMediaFromApi(){

    $api_token = "eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJiMzYxNDkxNWM5OTQwNzQ5NjIxZDUzOTI1ZjQ0MDhjOSIsInN1YiI6IjVkMGI1OTc1YzNhMzY4NjJmYTFlNTJlYSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.jfYiZG-ydiK4hZuMWYgpUPTtp_dOnfWOuJz4WCbQo0E";

    $base_url = "https://api.themoviedb.org/3/";

    $dicover_url = "discover/movie?";

    $api_key = "api_key=b3614915c9940749621d53925f4408c9";

    $query_params = "&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=true&page=1"; 

    $headers = array(
        'Content-Type: application/json',
        sprintf('Authorization: Bearer %s', $api_token)
    );

    $curl = curl_init($base_url . $dicover_url . $api_key .$query_params);

    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = json_decode(curl_exec($curl));

    $results = $response->results;

    $poster_base_url = "https://image.tmdb.org/t/p/w300/";

    foreach($results as $media){

        $id = $media->id;
        $title = $media->title;
        $release_date = $media->release_date;
        $summary = $media->overview;
        $poster_url = $poster_base_url . $media->poster_path;
        $type = "film";
        //getTrailerByFilmId
        $trailer_url = "";
        //only one genre_id to stick to the database;
        $genre_ids = $media->genre_ids;
        $genre_id = $genre_ids[0];
        Media::addFilmToMediaTable($id, $genre_id, $type, $title, $release_date, $summary, $trailer_url, $poster_url);

    }
}
function getTVShowFromApi(){
    $api_token = "eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJiMzYxNDkxNWM5OTQwNzQ5NjIxZDUzOTI1ZjQ0MDhjOSIsInN1YiI6IjVkMGI1OTc1YzNhMzY4NjJmYTFlNTJlYSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.jfYiZG-ydiK4hZuMWYgpUPTtp_dOnfWOuJz4WCbQo0E";

    $base_url = "https://api.themoviedb.org/3/";

    $popular_tv_show_url = "tv/popular?";

    $api_key = "api_key=b3614915c9940749621d53925f4408c9";

    $query_params = "&language=en-US&page=1"; 

    $headers = array(
        'Content-Type: application/json',
        sprintf('Authorization: Bearer %s', $api_token)
    );

    $curl = curl_init($base_url . $popular_tv_show_url . $api_key .$query_params);

    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = json_decode(curl_exec($curl));

    $results = $response->results;

    $poster_base_url = "https://image.tmdb.org/t/p/w300/";

    foreach($results as $media){

        $id = $media->id;
        $name = $media->name;
        $first_air_date = $media->first_air_date;
        $summary = $media->overview;
        $poster_url = $poster_base_url . $media->poster_path;
        //getTrailerByFilmId
        $trailer_url = "";
        //only one genre_id to stick to the database;
        $genre_ids = $media->genre_ids;
        $genre_id = $genre_ids[0];
        $type = "série";

        echo 'id: ' . $id . '</br>';
        echo 'name: ' . $name . '</br>';
        echo 'first_air_date: ' . $first_air_date . '</br>';
        echo 'summary: ' . $summary . '</br>';
        echo 'poster_url: ' . $poster_url . '</br>';
        echo 'genre_id: ' . $genre_id . '</br>';
        Media::addFilmToMediaTable($id, $genre_id, $type, $name, $first_air_date, $summary, $trailer_url, $poster_url);

    }

};
//getMediaFromApi();
//getTVShowFromApi();
?>

<div class="row">
    <div class="col-md-6 d-flex p-1">
       
            <button class="btn btn-block filterType-btn m-1 m-2">Séries</button>
            <button class="btn btn-block filterType-btn m-1  m-2">Films</button>
        
    </div>

    <div class="col-md-6 p-1">
        <form method="get">
            <div class="form-group has-btn m-2">
                <input type="search" id="search" name="title" value="<?= $search; ?>" class="form-control"
                       placeholder="Rechercher un film ou une série">

                <button type="submit" class="btn btn-block bg-red">Valider</button>
            </div>
        </form>
    </div>
</div>

<div class="media-list justify-content-around mt-4">
    <?php foreach( $medias as $media ): ?>

        <a class="item <?php if($media['type'] === 'série') { echo 'serie'; }else{echo 'film';} ?>" href="../ec-code-2020-codflix-php/view/detailMediaView.php?media=<?=$media['id'];?>">
            <div class="video">
                <div>
                <!-- mettre imageFilm dans iframe -->
                   <!-- <iframe allowfullscreen="" frameborder="0"-->
                   <img src="<?= $media['poster_url']; ?>" alt="<?= $media['title']; ?>">
                            
                            
                           <!--  ></iframe> -->
                </div>
            </div>
            <div class="title"><?= $media['title']; ?></div>
            <div class="title"><?= $media['release_date']; ?></div>
        </a>
    <?php endforeach; ?>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>
