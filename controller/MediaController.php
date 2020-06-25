<?php

require_once( 'model/media.php' );

/***************************
* ----- LOAD HOME PAGE -----
***************************/

function mediaPage() {

  $search = isset( $_GET['title'] ) ? $_GET['title'] : null;
  $medias = Media::filter( $search);

  require('view/mediaListView.php');

};

function mediaListDisplayer() {
  $title = isset($_GET['search']) ? $_GET['search'] : null;
  $type = isset($_GET['type']) ? $_GET['type'] : null;

  //$gender_id = isset($_GET['gender_id']) ? $_GET['gender_id'] : null;
  //$type = isset($_GET['type']) ? $_GET['type'] : null;
  //$release_date = isset($_GET['release_date']) ? $_GET['release_date'] : null;
  $medias = Media::filter($title, $type);
  require('view/component/mediaListDisplayer.php');

}

