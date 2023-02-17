<?php $total=0?>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="http://localhost/ecommerce/router/index">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
                    <?php foreach($prods as $prod):
                        $prix = $prod->prix; 

                    ?> 
						<tr id="prod<?= $prod->id?>">
							<td class="cart_product">
								<a href=""><img width="80" height="100" src="http://localhost/ecommerce/images/<?php echo $prod->img[0]->file?>" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?= $prod->libelle ?></a></h4>
								<p><?= $prod->descri ?></p>
							</td>
							<td class="cart_price">
								<p id="prix<?= $prod->id?>" ><?= $prod->prix ?></p> <p class="d-inline">MAD</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<button class="cart_quantity_up" data-decr='decr' data-id-prod="<?= $prod->id?>"> - </button>
									<input class="cart_quantity_input qty" data-id-prod="<?= $prod->id?>" data-qty="<?= 'qty'.$prod->id?>" type="text" value="<?= $prod->qty ?>" autocomplete="off" size="2">
									<button class="cart_quantity_down" data-incr='incr' data-id-prod="<?= $prod->id?>"> + </button>
								</div>
							</td>
							<td class="cart_total cart_total_price">
								<p class="cart_total_price d-inline" data-prod-total="prodTotal" data-total="<?= 'total'.$prod->id?>"><?= $prod->qty*$prix ?></p> MAD
							</td>
							<td class="cart_delete">
							<button class="cart_quantity_delete" data-del="del" data-id-prod="<?= $prod->id?>"><i class="fa fa-times"></i></button>
							</td>
						</tr>
                    <?php endforeach; ?>
					
				</div>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
	<section id="do_action">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Total <span data-total-price='totalPrice'></span> MAD</li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
