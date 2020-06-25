<?php

require_once( 'model/media.php' );

/***************************
* ----- LOAD HOME PAGE -----
***************************/

function mediaPage() {

  $search = isset( $_GET['title'] ) ? $_GET['title'] : null;
  $type="";
  $medias = Media::filter($search, $type);

  require('view/mediaListView.php');

};

//i did this to re-charge only a part of the page
//when the form for filetring the medias is called

function mediaListDisplayer() {
  $title = isset($_GET['search']) ? $_GET['search'] : null;
  $type = isset($_GET['type']) ? $_GET['type'] : null;
  $medias = Media::filter($title, $type);
  require('view/component/mediaListDisplayer.php');

}

