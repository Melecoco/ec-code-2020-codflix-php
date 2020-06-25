<?php ob_start(); ?>

<?php

include("../model/media.php");

?>

<script>
    let typeSelected;
    function setType(type){
    
        typeSelected = type;
        onFormChange()
    }

	function onFormChange(){
		const title = document.getElementById('search');
        
        let queryParams = "";
        const titleValue = title.value;

        if(typeSelected) queryParams += `&type=${typeSelected}`;

		if (titleValue.length) queryParams += `&search=${title.value}`;
		const url = `http://localhost:8888/ec-code-2020-codflix-php/index.php?action=mediaListDisplayer${queryParams}`;

		fetch(url)
			.then(data => data.text())
			.then(innerHTML => {
				const node = document.createElement("div");
				node.innerHTML = innerHTML;
				document.querySelector('.media-list').replaceWith(node);
			})
	}
</script>
        
<div class="row">
    <div class="col-md-6 d-flex p-1">
       
            <button onclick="setType('serie')" class="btn btn-block filterType-btn m-1 m-2">Séries</button>
            <button onclick="setType('film')" class="btn btn-block filterType-btn m-1  m-2">Films</button>
        
    </div>
    <div class="col-md-6 p-1">
        <form method='get' id='filterForm' >
            <div class="form-group has-btn m-2">
                <input type="search" id="search" name="title" onkeydown="onFormChange()" value="<?= $search; ?>" class="form-control"
                       placeholder="Rechercher un film ou une série">

                <button class="btn btn-block bg-red">Valider</button>
            </div>
        </form>
    </div>
</div>

<?php require('component/mediaListDisplayer.php')?>

<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>
