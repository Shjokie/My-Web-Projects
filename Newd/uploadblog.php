<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>EED Advisory - Upload Blog Post</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://bootstraptaste.com" />
<!-- css -->
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="css/jcarousel.css" rel="stylesheet" />
<link href="css/flexslider.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />


<!-- Theme skin -->
<link href="skins/default.css" rel="stylesheet" />

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<style>


</style>


</head>
<body>
<div id="wrapper">
	<!-- start header -->
	<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container bigsquare">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><h2><span>EED</span> Advisory</h2></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li><a href="index.html">Home</a></li>
                         <li><a href="ourWork.html">What we do</a></li>
                        <li class="active"><a href="typography.html">Our Team</a></li>
                        <li><a href="portfolio.html">Portfolio</a></li>
                        <!--<li class="dropdown">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Portfolio<b class=" icon-angle-down"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="typography.html">About Us</a></li>
                                <li><a href="components.html">Components</a></li>
								<li><a href="pricingbox.html">Pricing box</a></li>
                            </ul>
                        </li>-->
                        
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
	</header>
	<!-- end header -->
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
					
					<li class="active">Our Team</li>
				</ul>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	<div class="container">
		<div class="row">
					<form class="form-horizontal" method="POST" action="newsupload.php"  enctype='multipart/form-data'>
						<fieldset>

						<!-- Form Name -->
						<legend>UPLOAD A NEWS PIECE :-)</legend>

						<!-- Text input-->
						<div class="control-group">
						  <label class="control-label" for="postTitle">Title</label>
						  <div class="controls">
						    <input id="postTitle" class="form-control" name="postTitle" type="text" placeholder="Type the Title of the Post" class="input-large" required="">
						    
						  </div>
						</div>

						

						<!-- Textarea -->
						<div class="control-group">
						  <label class="control-label" for="content">News Post</label>
						  <div class="controls">                     
						    <textarea id="content" class="form-control" name="content" required="">Type the post here</textarea>
						  </div>
						</div>

						<!-- File Button --> 
						<div class="control-group">
						  <label class="control-label" for="myPhoto">Upload document to be attached</label>
						  <div class="controls">
						    <input type="file" name="fileToUpload" id="fileToUpload">
						  </div>
						</div>
						<!-- File Button  
						<div class="control-group">
						  <label class="control-label" for="myFile">Attach File</label>
						  <div class="controls">
						    <input id="myFile" class="form-control" name="myFile" class="input-file" type="file">
						  </div>
						</div>-->
						<!-- Button -->
						<div class="control-group">
						  <label class="control-label" for="submit">Post</label>
						  <div class="controls">
						    <button id="submit"  name="submit" class="btn btn-primary">Button</button>
						  </div>
						</div>


						</fieldset>
					</form>


			
		</div> <!--row-->
		
	</div>
	</section>
	<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="widget">
					<h5 class="widgetheading">Get in touch with us</h5>
					<address>
					<strong>EED Advisory Ltd.</strong><br>
					 6 Nas Court Apartments<br>
					 Milimani Road, Nairobi </address>
					<p>
						<i class="icon-phone"></i> 254 202574927 / 202376122 <br>
						<i class="icon-envelope-alt"></i> contact@eedadvisory.com
					</p>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="widget">
					<h5 class="widgetheading">Quick Links</h5>
					<ul class="link-list">
						<li><a href="blog.php">News and updates</a></li>
						<li><a href="privacy.php">Privacy policy</a></li>
						<li><a href="careers.php">Career</a></li>
						<li><a href="contact.html">Contact us</a></li>
					</ul>
				</div>
			</div>
			
			
		</div>
	</div>
	<div id="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="copyright">
						<p>
							<span>&copy; EED Advisory 2014 All right reserved.</span>
						</p>
					</div>
				</div>
				<div class="col-lg-6">
					<ul class="social-network">
						<li><a href="https://www.facebook.com/pages/EED-Advisory/662490923762346" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
						<li><a href="https://twitter.com/eedadvisory" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a href="https://www.linkedin.com/company/eed-advisory" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
						
						<li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script>
<script src="js/google-code-prettify/prettify.js"></script>
<script src="js/portfolio/jquery.quicksand.js"></script>
<script src="js/portfolio/setting.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>
</body>
</html>