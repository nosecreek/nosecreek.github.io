<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage thecreek
 */
 
$dev = false; //Set to false when site is ready to deploy!

require_once('config.php');
				
?><!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class=""> <!--<![endif]-->
	<head>
		
		<meta charset="UTF-8" />
		
		<title>Nose Creek Web Design Airdrie:  Quality, Affordable Website Design in Airdrie, AB.</title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
		<link rel="shortcut icon" href="//nosecreekweb.ca/img/favicon.ico" />
		
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		<link rel="stylesheet" type="text/css" media="all" href="//nosecreekweb.ca/style.css" />
	
	</head>

	<body>
		
		<header id="header">
			
			<div id="logo">
				<h1><a href="/" title="Nose Creek Web Design Airdrie" rel="home"><img src="/img/logo@2x.png" alt="Nose Creek Web Design Airdrie" /></a></h1>
			</div>
			
			<nav>
				<ul>
					<li id="menu-item-6"><a href="#webdesign">Web Design</a></li>
					<li id="menu-item-5"><a href="#portfolio">Portfolio</a></li>
					<li id="menu-item-7"><a href="#seo">Other Services</a></li>
					<li id="menu-item-9"><a href="#contact">Contact</a></li>
				</ul>
			</nav>
			
		</header>
		
		<section id="webdesign">
			<h2>Thank You!</h2>
			<?php
			  $token  = $_POST['stripeToken'];
			  
			  $amount = $_POST['amount'];
			  if(is_nan($amount)){ die('Invalid Payment Amount'); }
			  $amount = intval(abs($amount) * 100);

			  $customer = \Stripe\Customer::create(array(
				  'email' => $_POST['stripeEmail'],
				  'card'  => $token
			  ));

			  $charge = \Stripe\Charge::create(array(
				  'customer' => $customer->id,
				  'amount'   => $amount,
				  'currency' => 'cad',
				  'description' => 'Invoice payment for ' . $_POST['thename']
			  ));
			  
			  $amount = substr($amount,0,strlen($amount)-2).".".substr($amount,-2);

			  echo '<h1>Successfully charged $'.$amount.'!</h1>';
			?>
		</section>
		
		
		<footer id="footer" itemscope itemtype="http://schema.org/LocalBusiness">
			&copy;2012-<?php echo date("Y"); ?> <a href="http://www.nosecreekweb.ca/" itemprop="name">Nose Creek Web Design</a>. All rights reserved.<?php if($isnotindia): ?> <span itemprop="telephone" class="contact-info">403.370.2313</span>. <?php endif; ?>
			<span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
				<span itemprop="addressLocality">Airdrie</span>, 
				<span itemprop="addressRegion">AB</span>
				<span itemprop="addressCountry">Canada</span>.
			</span>
			<a href="https://plus.google.com/100303134264800323712" target="_blank">Find us on Google+</a>.
		</footer>
		
	</body>
</html>

