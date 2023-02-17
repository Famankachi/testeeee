<section id="form"><!--form-->
	<div class="container">
		<div class="row">
            <div class="col-sm-3 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                    <form action="../verifier/<?= $from?>" method="POST">
                        <input type="text" name="username" id=""/>
                        <input type="password" name="password" id=""/>
                        <button type="submit" name="login" id=""class="btn btn-default" >Login</button>
                    </form>
                    <?php if(isset($err)){?>
                        <span>Username or password incorrect !</span>
                    <?php } ?>
                </div><!--/login form-->
            </div>
        </div>
    </div>
</section><!--/form-->