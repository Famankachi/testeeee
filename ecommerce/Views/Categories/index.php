<h1 class="">Categories</h1>
<div class="">
    <?php foreach($cats as $cat): ?>
        <div class="">
            <div class="">
                <h2 class="">Title : <?= $cat->nom_cat ?></h2><br>
                <span class="">Image : <img src="<?= $cat->img_cat ?>" alt=""></span><br>
                <a class="" href="./read/<?= $cat->id ?>">read →</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>