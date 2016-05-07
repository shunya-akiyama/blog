<?php
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
 ?>
<!DOCTYPE html>
<html lang="en">
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
	<?php echo $this->Html->css('bootstrap'); ?>
	<?php echo $this->Html->css('style'); ?>
  <?php echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js') ?>
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
	<header class="row col-xs-12">
				<div class="container col-xs-12">
						<ul class="row">
							<li class="col-xs-2 active"><a href="#">Home</a></li>
							<li class="col-xs-2"><a href="#test">Test</a></li>
							<li class="col-xs-2"><a href="#about">About</a></li>
							<li class="col-xs-2"><a href="#contact">Contact</a></li>
						</ul>
				</div>
	</header>

	<div class="container">
<div class="row">
		<div class="col-xs-12 col-md-8">
			<h1>Blog</h1>
			<p>
				BlogTest Page
			</p>
		</div>
</div>
		<div class="row">
			<article class="col-xs-12 col-md-8">

				<?php echo $this->Session->flash(); ?>

				<?php echo $this->fetch('content'); ?>
      </article>
			<aside class="col-xs-6 col-md-4">
        <?php $list=$this->requestAction('/posts/find'); ?>
        <?php echo $this->element('sidebar',array('tag'=>$tag)); ?>
      </aside>
			</div>
		</div>
	</div> <!-- /container -->
</div> <!-- /containerfluid -->
	<!-- Le javascript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<?php echo $this->Html->script('bootstrap'); ?>
	<?php echo $this->fetch('script'); ?>

</body>
</html>
