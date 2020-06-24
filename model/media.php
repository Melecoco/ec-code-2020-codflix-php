<?php

require_once( 'database.php' );

class Media {

  protected $id;
  protected $genre_id;
  protected $title;
  protected $type;
  protected $status;
  protected $release_date;
  protected $summary;
  protected $trailer_url;

  public function __construct( $media ) {

    $this->setId( isset( $media->id ) ? $media->id : null );
    $this->setGenreId( $media->genre_id );
    $this->setTitle( $media->title );
  }

  /***************************
  * -------- SETTERS ---------
  ***************************/

  public function setId( $id ) {
    $this->id = $id;
  }

  public function setGenreId( $genre_id ) {
    $this->genre_id = $genre_id;
  }

  public function setTitle( $title ) {
    $this->title = $title;
  }

  public function setType( $type ) {
    $this->type = $type;
  }

  public function setStatus( $status ) {
    $this->status = $status;
  }

  public function setReleaseDate( $release_date ) {
    $this->release_date = $release_date;
  }

  /***************************
  * -------- GETTERS ---------
  ***************************/

  public function getId() {
    return $this->id;
  }

  public function getGenreId() {
    return $this->genre_id;
  }

  public function getTitle() {
    return $this->title;
  }

  public function getType() {
    return $this->type;
  }

  public function getStatus() {
    return $this->status;
  }

  public function getReleaseDate() {
    return $this->release_date;
  }

  public function getSummary() {
    return $this->summary;
  }

  public function getTrailerUrl() {
    return $this->trailer_url;
  }

  /***************************
  * -------- GET LIST --------
  ***************************/

  public static function filter($title){

    
    $db   = init_db();

    if(empty($title)){
      $req = $db->prepare("SELECT * FROM media");
      $req->execute();

      // Close databse connection
      $db = null;
      return $req ->fetchALL();
    }
    else{
      $req = $db->prepare('SELECT * FROM media WHERE title LIKE "%' . $title . '%"');
      $req->execute();
    }
    
    // Close databse connection
    $db   = null;

    return $req->fetchAll();
  }


  public static function getMediaById($id){
    $db   = init_db();
    $req = $db->prepare("SELECT * FROM media WHERE id=$id");
    $req->execute();
    $db   = null;

    return $req->fetchAll();
  }

  public static function addFilmToMediaTable($id, $genre_id, $title, $release_date, $summary, $trailer_url, $poster_url){
    $type = "film";
    $status = "publié";
    //for now genre_id can only be 1, 2 or 3
    $genre_id = 3;
    $db = init_db();

    $request = "INSERT INTO `media`(`id`, `genre_id`, `title`, `type`, `status`, `release_date`, `summary`, `trailer_url`, `poster_url`) VALUES ($id,3, '$title','$type','$status','$release_date','$summary','$trailer_url','$poster_url')";
    $req = $db->prepare($request);

    $req->execute();

    $db = null;
  }

  public static function filterMedias( $title ) {

  //Open database connection
  $db   = init_db();

  $req  = $db->prepare("SELECT * FROM media WHERE title = ? ORDER BY release_date DESC" );
  $req->execute( array( '%' . $title . '%' ));

  //Close databse connection
  $db   = null;

  return $req->fetchAll();

  }

}
