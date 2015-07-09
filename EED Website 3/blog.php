<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='utf-8'>
<title>News and Updates - Grab a copy of the Energy Access Review (EAR) Newsletter perfectly put together by the EED Consultants</title>
<meta name='viewport' content='width=device-width, initial-scale=1.0' />
<meta name='description' content='Energy Access Review is a quartery magazine by EED Advisory that reviews secondary information related to the energy access in Africa' />

<!-- css -->
<link href='css/bootstrap.min.css' rel='stylesheet' />
<link href='css/fancybox/jquery.fancybox.css' rel='stylesheet'>
<link href='css/jcarousel.css' rel='stylesheet' />
<link href='css/flexslider.css' rel='stylesheet' />
<link href='css/style.css' rel='stylesheet' />


<!-- Theme skin -->
<link href='skins/default.css' rel='stylesheet' />

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src='http://html5shim.googlecode.com/svn/trunk/html5.js'></script>
    <![endif]-->

</head>
<body>
<div id='wrapper'>
	<!-- start header -->
	<header>
        <div class='navbar navbar-default navbar-static-top'>
            <div class='container bigsquare'>
                <div class='navbar-header'>
                    <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                    </button>
                    <a class='navbar-brand' href='index.html'><h2><span>EED</span> Advisory</h2></a>
                </div>
                <div class='navbar-collapse collapse '>
                    <ul class='nav navbar-nav'>
                        <li ><a href='index.html'>Home</a></li>
                        <li><a href="ourWork.html">What we do</a></li>
                        <li><a href='typography.html'>Our Team</a></li>
                        <li><a href='portfolio.html'>Portfolio</a></li>
                        <!--<li class='dropdown'>
                            <a href='#' class='dropdown-toggle ' data-toggle='dropdown' data-hover='dropdown' data-delay='0' data-close-others='false'>Portfolio<b class=' icon-angle-down'></b></a>
                            <ul class='dropdown-menu'>
                                <li><a href='typography.html'>About Us</a></li>
                                <li><a href='components.html'>Components</a></li>
								<li><a href='pricingbox.html'>Pricing box</a></li>
                            </ul>
                        </li>-->
                        
                        <li class='active'><a href='blog.php'>Blog</a></li>
                        <li><a href='contact.html'>Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
	</header>
	<!-- end header -->
	<section id='inner-headline'>
	<div class='container'>
		<div class='row'>
			<div class='col-lg-12'>
				<ul class='breadcrumb'>
					<li><a href='#'><i class='fa fa-home'></i></a><i class='icon-angle-right'></i></li>
					<li class='active'>Blog</li>
				</ul>
			</div>
		</div>
	</div>
	</section>
	<section id='content'>
	<div class='container'>
		<div class='row'>
			<div class='col-lg-8'>
				<?php
					require_once('connect.php');


					$query = "SELECT * FROM blog
							   ORDER BY postID DESC
								LIMIT 0,4";
					
					$result = mysql_query($query);

					if(!$result)
					{
						die(mysql_error());
					}
					while($row = mysql_fetch_array($result))
					{
					  /*$name = $row['name'];
					  $email = $row['email'];
					  $website = $row['website'];
					  $comment = $row['comment'];
					  $timestamp = $row['timestamp'];*/
					  $postID = htmlspecialchars($row['postID'],ENT_QUOTES);
					  $title = htmlspecialchars($row['postTitle'],ENT_QUOTES);
					  $intro = htmlspecialchars($row['intro'],ENT_QUOTES);
					  $post = htmlspecialchars($row['content'],ENT_QUOTES);
					  $datePosted = htmlspecialchars($row['datePosted'],ENT_QUOTES);
					  $author = htmlspecialchars($row['author'],ENT_QUOTES);
					  $tag_one = htmlspecialchars($row['tag_one'],ENT_QUOTES);
					  $tag_two = htmlspecialchars($row['tag_two'],ENT_QUOTES);


					  $query2 = mysql_query("SELECT * FROM upload_data WHERE post_id = '$postID' AND file_name LIKE '%.jpg%'");
					   if (!$query2)
					   {
					   		die(mysql_error());
					   }
					   while($row2 = mysql_fetch_array($query2)){
					   	$filename = htmlspecialchars($row2['file_name'],ENT_QUOTES);


					  //$comment = htmlspecialchars($row['comment'],ENT_QUOTES);
					  echo "
					  <article>
						<div class='post-image'>
							<div class='post-heading'>
								<h3><a href='#'>$title</a></h3>
							</div>
							<img src='uploads/$filename' alt='' />
						</div>
						<p>
							$intro
						</p>
						<div class='bottom-article'>
							<ul class='meta-post'>
								<li><i class='icon-calendar'></i><a href='#'>$datePosted</a></li>
								<li><i class='icon-user'></i><a href='#'> $author</a></li>
								<li><i class='icon-folder-open'></i><a href='#'> $tag_one</a></li>
								<li><i class='icon-folder-open'></i><a href='#'> $tag_two</a></li>
								<li><i class='icon-comments'></i><a href='#'>4 Comments</a></li>
							</ul>
							<a href='show_article.php?id=" . $row['postID'] . "' class='pull-right'>Continue reading <i class='icon-angle-right'></i></a>
						</div>
				</article>
				";
			}
					 
					}
					?>

				
				
				
				<div id='pagination'>
					<span class='all'>Page 1 of 3</span>
					<span class='current'>1</span>
					<a href='blog2.php' class='inactive'>2</a>
					<a href='#' class='inactive'>3</a>
				</div>
			</div>
			<div class='col-lg-4'>
				<aside class='right-sidebar'>
				<div class='widget'>
					<form class='form-search'>
						<input class='form-control' type='text' placeholder='Search..'>
					</form>
				</div>
				<div class='widget'>
					<h5 class='widgetheading'>Categories</h5>
					<ul class='cat'>
						<li><i class='icon-angle-right'></i><a href='#'>Energy</a><span> (20)</span></li>
						<li><i class='icon-angle-right'></i><a href='#'>Renewable Energy</a><span> (11)</span></li>
						<li><i class='icon-angle-right'></i><a href='#'>Climate Change</a><span> (9)</span></li>
						<li><i class='icon-angle-right'></i><a href='#'>Natural Resource</a><span> (12)</span></li>
						<li><i class='icon-angle-right'></i><a href='#'>Call for Proposals</a><span> (18)</span></li>
						<li><i class='icon-angle-right'></i><a href='#'>Development</a><span> (18)</span></li>
						<li><i class='icon-angle-right'></i><a href='#'>Technology</a><span> (18)</span></li>
						<li><i class='icon-angle-right'></i><a href='#'>Others</a><span> (18)</span></li>
					</ul>
				</div>
				
				<div class='widget'>
					<h5 class='widgetheading'>Popular tags</h5>
					<ul class='tags'>
						<li><a href='#'>Energy</a></li>
						<li><a href='#'>Renewable Energy</a></li>
						<li><a href='#'>Natural Resource</a></li>
						<li><a href='#'>Call for Proposals</a></li>
						<li><a href='#'>Technology</a></li>
						<li><a href='#'>Development</a></li>
					</ul>
				</div>
				</aside>
			</div>
		</div>
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
<a href='#' class='scrollup'><i class='fa fa-angle-up active'></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src='js/jquery.js'></script>
<script src='js/jquery.easing.1.3.js'></script>
<script src='js/bootstrap.min.js'></script>
<script src='js/jquery.fancybox.pack.js'></script>
<script src='js/jquery.fancybox-media.js'></script>
<script src='js/google-code-prettify/prettify.js'></script>
<script src='js/portfolio/jquery.quicksand.js'></script>
<script src='js/portfolio/setting.js'></script>
<script src='js/jquery.flexslider.js'></script>
<script src='js/animate.js'></script>
<script src='js/custom.js'></script>
</body>
</html>";

?>