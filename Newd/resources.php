<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Resources </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Energy Access Review is a quarterly newsletter prepared by EED Advisory consultants" />

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

.bs-example{
	font-size: 15px;
	line-height: 1.5em;
}
.intro{
	font-size: 15px;
	line-height: 1.5em;
}
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
                        <li class="active"><a href="index.html">Home</a></li>
                        <li><a href="ourWork.html">Practice Lines</a></li>
                        <li><a href="team.html">Team</a></li>
                        <li><a href="portfolio.html">Sample Projects</a></li>
                       <!-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Portfolio<b class=" icon-angle-down"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="typography.html">About Us</a></li>
                                <li><a href="components.html">Components</a></li>
								<li><a href="pricingbox.html">Pricing box</a></li>
                            </ul>
                        </li>-->
                        
                        <li><a href="resources.php">Resources</a></li>
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
					<li><a href="index.html"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
					
					<li class="active">Resources</li>
				</ul>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	<div class="container">
		<div class="">
<p class= "intro"></p>
<br/>
<div class="bs-example">

    <ul class="nav nav-tabs" id="myTab">
        <li><a data-toggle="tab" href="#sectionA">Energy Access Review NewsLetter</a></li>
        <li><a data-toggle="tab" href="#sectionB">News and Updates</a></li>
    </ul>
    <div class="tab-content">
        <div id="sectionA" class="tab-pane fade in active">
            <p>Energy Access Review is a quarterly Newsletter prepared by EED Advisory Consultants focusing on the emerging trends in energy</p> <br><br>
            
            <div class="col-sm-4"><img src="img/dummies/EARpic.jpg" alt="Betti"/></div>
        <?php
        require_once("connect.php");
        $result = mysql_query("SELECT * FROM file_details ORDER BY file_id DESC");
        while($row = mysql_fetch_array($result))
         {

           
            $filename = $row['file_name'];
            $filepath = $row['file_path'];
            echo "<div class='col-sm-8'>"; 

            echo "<p>"; echo "$filename"; 
            ?> <a href= "<?php echo $filepath; ?>">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Download</a> <?php echo "</p>";

            echo "</div>";

         }

        ?>

        </div>
            

			  
        <div id="sectionB" class="tab-pane fade">
        <h3></h3>
        <?php
        require_once("connect.php");
        $result = mysql_query("SELECT * FROM news_updates ORDER BY news_id DESC");
        while($row = mysql_fetch_array($result))
         {

            $newstitle = $row['news_title'];
            $newsbody = $row['news_body'];
            $filename = $row['file_name'];
            $filepath = $row['file_path'];
            echo "<div class='col-sm-8'>"; 

            echo "<p>"; echo "<h4> <strong> $newstitle </strong> </h4></p>"; 
            echo "<p> $newsbody";
            ?> <a href= "<?php echo $filepath; ?>">&emsp;Download the full document here</a> <?php echo "</p><br>";

            echo "</div>";

         }

        ?>
        </div>
        
        
    </div>
</div>
  
      
			
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
						<li><a href="resources.php">News and updates</a></li>
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