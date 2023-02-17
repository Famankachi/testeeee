<div class="">
    <h2 class=""><?= $prod->nom_prod ?></h2><br>
    <span class="">Libelle : <?= $prod->libelle ?></span><br>
    <span class="">Prix : <?= $prod->prix ?></span>
    <br><br>
    <?php foreach($images as $image): 
        if($image->principal){
    ?>
        <h2>Image principal : </h2>
        <span><?= $image->file ?></span><br><br>
    <?php } 
        else{
    ?>
        <span><?= $image->file ?></span><br>
    <?php } ?>
    <?php endforeach;?>
</div>