<?php

include 'config.php';

?>
<!DOCTYPE html>
<html lang="es">

	<head>

		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo TITLE; ?></title>

		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Font Awesome -->
		<link href="css/font-awesome.min.css" rel="stylesheet">

		<!-- Main -->
		<link href="css/main.css" rel="stylesheet">

	</head>

	<body>

		<div class="container">
			
			<div class="page-header">
			
				<h1 class="pull-left"><?php echo TITLE; ?></h1>

				<div class="helper-links pull-right">
					
					<?php foreach ( $helper_buttons as $button ) : ?>

						<a href="<?php echo $button['url']; ?>" class="btn <?php echo $button['style']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['text']; ?></a>

					<?php endforeach; ?>

				</div>

				<div class="clearfix"></div>

			</div>

		</div>

		<div class="container">
			
			<div class="row">
				
				<?php foreach ( new DirectoryIterator( ROOT_PATH ) as $site ) : ?>

					<?php if ( $site->isDot() || $site->getFilename() == 'home' ) continue; ?>

					<?php if ( $site->isDir() ) : ?>

						<div class="col-md-4">
				
							<div class="panel panel-default">
								
								<div class="panel-body">

									<span class="favicon pull-left">
										
										<span class="fa fa-globe"></span>

									</span>

									<a href="<?php echo URL_PREFIX . $site->getFilename() . URL_SUFIX; ?>" class="pull-left"><?php echo $site->getFilename(); ?></a>

									<?php if ( file_exists( ROOT_PATH . $site->getFilename() . '/' . WWW_FOLDER . '/wp-admin' ) ) : ?>

										<a href="<?php echo URL_PREFIX . $site->getFilename() . URL_SUFIX . '/wp-admin'; ?>" class="btn btn-default btn-xs pull-right btn-wordpress"><span class="fa fa-wordpress"></span></a>

									<?php endif; ?>

									<div class="clearfix"></div>

								</div>

								<div class="panel-footer">

									<span class="small pull-left">Created: <?php echo date( DATE_FORMAT, $site->getCTime() ); ?></span>
									
									<div class="btn-group pull-right">
										
										<!--<a href="#" class="btn btn-default btn-xs"><span class="fa fa-download"></span></a>-->

									</div>

									<div class="clearfix"></div>

								</div>

							</div>

						</div>

					<?php endif; ?>

				<?php endforeach; ?>

			</div>

			<div class="row">
				
				<div class="col-md-12">
					
					<hr>

					<p class="text-muted">Made with <a href="http://getbootstrap.com"> Bootstrap</a> and <a href="http://fortawesome.github.io/Font-Awesome/">Font Awesome</a></p>

				</div>

			</div>

		</div>

		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<!-- Bootstrap -->
		<script src="js/bootstrap.min.js"></script>
		<!-- Main -->
		<script src="js/main.js"></script>
		
	</body>

</html>