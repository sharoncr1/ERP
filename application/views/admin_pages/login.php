<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url()?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url()?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>


   <div class="section section-signup" style="background-image: url('<?php echo base_url()?>assets/img/bg11.jpg'); background-size: cover; background-position: top center; min-height: 700px;">
                <div class="container">
                    <div class="row">
                        <div class="card card-signup" data-background-color="orange">
                            <form class="form" method="post" action="">
                                <div class="header text-center">
                                    <h4 class="title title-up">Admin Sign In</h4>
                                    <div class="social-line">
                                        <a href="#pablo" class="btn btn-neutral btn-facebook btn-icon btn-round">
                                            <i class="fa fa-facebook-square"></i>
                                        </a>
                                        <a href="#pablo" class="btn btn-neutral btn-twitter btn-icon btn-lg btn-round">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="#pablo" class="btn btn-neutral btn-google btn-icon btn-round">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <?php if($_SESSION['emsg']!=''){
                                    echo "
                                      <div class='alert alert-danger' role='alert' >
                                              <div class='container' >".$_SESSION['emsg']."</div>
                                      </div>";
                                }
                                ?>
                                <div class="card-body">
                                    <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="now-ui-icons users_circle-08"></i>
                                        </span>
                                        <input type="text" name='userid' class="form-control" placeholder="User Name...">
                                    </div>
                                    <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="now-ui-icons text_caps-small"></i>
                                        </span>
                                        <input type="password" name='password' placeholder="Password..." class="form-control">
                                    </div>
                                    
                                    <!-- If you want to add a checkbox to this form, uncomment this code -->
                                    <div class="checkbox">
	  								<input id="checkboxSignup" type="checkbox">
	  									<label for="checkboxSignup">
	  									    Remember me
	  									</label>
	  						  		</div>
                                </div>
                                <div class="footer text-center">
                                    <button type="submit" name="submit" value="submit" class="btn btn-neutral btn-round btn-lg">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- <div class="col text-center">
                        <a href="<//?php echo base_url('welcome/lRegister'); ?>" class="btn btn-simple btn-round btn-white btn-lg" target="_blank">Register a New Account</a>
                    </div> -->
                </div>
            </div>
                            




    <!-- <body class="bg-black">
  
        <div class="form-box" id="login-box">
            <div class="header">Administrator Sign In</div>
            <form action="" method="post">
                <div class="body bg-gray">
                   <span style="color:red;font-size:115%;"> <?//php echo $_SESSION['emsg']; ?> </span>
                    <div class="form-group">
                        <input type="text" name="userid" class="form-control" placeholder="User ID" required/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required/>
                    </div>          
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Sign me in</button>  
                    
                    <p><a href="#">I forgot my password</a></p>
                    
                </div>
            </form>

            <div class="margin text-center">
                <span>Sign in using social networks</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div>
        </div>


        <!-- jQuery 2.0.2 -->
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> -->
        <!-- Bootstrap -->
          

    </body>
</html> -->