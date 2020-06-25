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