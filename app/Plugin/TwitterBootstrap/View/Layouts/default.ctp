<?php
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
 ?>
<!DOCTYPE html>
<html lang="utf−8">
<head>
	<meta charset="utf-8">
	<title>
		<?php echo __('CakePHP: the rapid development php framework:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Le styles -->
  <?php echo $this->Html->css('http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css'); ?>
  <?php echo $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css'); ?>
	<?php echo $this->Html->css('bootstrap'); ?>
  <?php echo $this->Html->css('style'); ?>
  <?php echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js') ?>
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!-- Le fav and touch icons -->
	<!--
	<link rel="shortcut icon" href="/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="/ico/apple-touch-icon-57-precomposed.png">
	-->
  <?php
	echo $this->fetch('meta');
	echo $this->fetch('css');
	?>
</head>

<body>
<div class="container-fluid">
	<header>
    <?php echo $this->element('head_menu',array('tag'=>$tag)); ?>
	</header>

<div class="container">
		<div class="row">
			<article class="col-xs-12 col-md-12 col-lg-12">

				<?php echo $this->Session->flash(); ?>

				<?php echo $this->fetch('content'); ?>
      </article>
			</div>
    </div><!-- /container -->
	</div> <!-- /containerfluid -->
<div class="footer">
</div>
	<!-- Le javascript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<?php echo $this->Html->script('bootstrap'); ?>
  <?php echo $this->Html->script('search'); ?>
<?php echo $this->fetch('script'); ?>

</body>
</html>
