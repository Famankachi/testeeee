
<div class="container">
			<div class="row">
                <div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
                                <?php foreach($cats as $ca): ?>
								<div class="panel-heading">
									<h4 class="panel-title"><a href="http://localhost/ecommerce/categorie/read/<?= $ca->id ?>"> <?= $ca->nom_cat ?></a></h4>
								</div>
                                <?php endforeach; ?>
							</div>
						</div><!--/category-products-->
					</div>
				</div>
<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center"><?= $cat->nom_cat ?></h2>
    <?php foreach($prods as $prod): ?><!-- boucle pour tous les postes de dans la base de donne-->
        <div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
                                            <!--  -->
											<img src="http://localhost/ecommerce/images/<?php echo $prod->img[0]->file?>" alt="" />
											<h2><?php echo $prod->prix?> dh</h2>
											<p><?php echo $prod->libelle ?></p>
											<button class="btn btn-default add-to-cart" data-cart ="addToCart" data-id-prod="<?= $prod->id ?>"></i>Add to cart</button>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2><?php echo $prod->prix?> dh</h2>
												<p><?php echo $prod->libelle ?></p>
												<button class="btn btn-default add-to-cart" data-cart ="addToCart" data-id-prod="<?= $prod->id ?>"></i>Add to cart</button>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
									</ul>
								</div>
							</div>
						</div>
    <?php endforeach; ?>
    </div>
    </div>
    </div>
</div>