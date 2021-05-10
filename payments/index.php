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
				<h1><a href="http://nosecreekweb.ca/" title="Nose Creek Web Design Airdrie" rel="home"><img src="//nosecreekweb.ca/img/logo@2x.png" alt="Nose Creek Web Design Airdrie" /></a></h1>
			</div>
			
			<nav>
				<ul>
					<li id="menu-item-6"><a href="http://nosecreekweb.ca/#webdesign">Web Design</a></li>
					<li id="menu-item-5"><a href="http://nosecreekweb.ca/#portfolio">Portfolio</a></li>
					<li id="menu-item-7"><a href="http://nosecreekweb.ca/#seo">Other Services</a></li>
					<li id="menu-item-9"><a href="http://nosecreekweb.ca/#contact">Contact</a></li>
				</ul>
			</nav>
			
		</header>
		
		<section id="webdesign">
			<h2>Make a Payment</h2>
			
			<form id='contactform' method='post' action='charge.php' style="left:0;float:left;">
				
				<input placeholder="Your Business Name" id="thename" name='thename' size='25' type='text' />
				<input placeholder="Payment Amount" id="amount" name='amount' size='25' type='text' />
				
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js" type="text/javascript"></script>
				<script src="https://checkout.stripe.com/checkout.js"></script>
				<button name='stripeButton' id="stripeButton" class='submit-button' style="left:0;float:none;">Make a Credit Card Payment</button>
				<script>
				  var handler = StripeCheckout.configure({
					key: "<?php echo $stripe['publishable_key']; ?>",
					//image: '/img/documentation/checkout/marketplace.png',
					locale: 'auto',
					token: function(token) {
					  // Use the token to create the charge with a server-side script.
					  // You can access the token ID with `token.id`
					   $('#contactform').append($('<input type="hidden" name="stripeToken" />').val(token.id));
						$('#contactform').append($('<input type="hidden" name="stripeEmail" />').val(token.email));
						$('#contactform').get(0).submit();
					}
				  });

				  $('#stripeButton').on('click', function(e) {
					if(!isNaN($('#amount').val()) && $('#amount').val() != 0) {
						// Open Checkout with further options
						handler.open({
						  name: $('#thename').val(),
						  description: 'Invoice Payment',
						  allowRememberMe: false,
						  currency: "cad",
						  amount: Math.abs($('#amount').val()) * 100
						});
					}
					e.preventDefault();
				  });

				  // Close Checkout on page navigation
				  $(window).on('popstate', function() {
					handler.close();
				  });
				</script>
			</form>
			
			<div id="other-2">
				<p>Cheques should be made payable to "Dustin Lammiman" and mailed to:</p>
				<p>
					931 Woodside Lane<br>
					Airdrie, AB T4B 2K2
				</p>
				<p>&nbsp;</p>
				<p>
					Interac e-Transfers can be sent to <a href="mailto:payments@nosecreekweb.ca">payments@nosecreekweb.ca</a>
				</p>
			</div>
		</section>
		
		
		<footer id="footer" itemscope itemtype="http://schema.org/LocalBusiness">
			&copy;2012-<?php echo date("Y"); ?> <a href="http://www.nosecreekweb.ca/" itemprop="name">Nose Creek Web Design</a>. All rights reserved.
			<span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
				<span itemprop="addressLocality">Airdrie</span>, 
				<span itemprop="addressRegion">AB</span>
				<span itemprop="addressCountry">Canada</span>.
			</span>
			<a href="https://plus.google.com/100303134264800323712" target="_blank">Find us on Google+</a>.
		</footer>
		
	</body>
</html>

