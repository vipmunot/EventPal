<?php
	session_start();

	if(!isset($_SESSION['MemberId'])) {
		header("Location: register.php");
		exit();
	}

	require 'member_header.php';
	require 'Utils/DatabaseUtil.php';
?>

<section id ="myevents">
<div class = "clearfix">&nbsp;</div><div class = "clearfix">&nbsp;</div><div class = "clearfix">&nbsp;</div>
<div class="container">
<div class="row">
	<div class ="col-xs-12 col-sm-8 col-lg-12">
			<div class="row">
				<h3>Hi <?php echo $_SESSION['FirstName']; ?>!</h3>
				<div class="row">

					<?php $events = getEventsByOrganizerId($_SESSION['MemberId']); ?>

						<?php if(empty($events)) { ?>
								<h4>You have organized no events. Start now!</h4>
						<?php } else { ?>
								<h4>Events that you've organized:</h4>
								<div class="row">
									<?php foreach ($events as $event) { ?>
										<div class='col-md-4 col-sm-10 col-xs-11 wow bounceIn'>
											<figure class='effect'>
												<?php
													if(empty($event->Image)) {
					                                	$event->Image = 'Images/Default.png';
						                            }
												?>
												<img alt='Event Image' src='<?php echo $event->Image; ?>' /> 
												<figcaption>
													<h3><?php echo $event->Title; ?></h3>
													<p><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;April 25,2017</p>
													<p><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;<?php echo $event->StartTime . ' - ' . $event->EndTime; ?></p>

													<a href="event.php?eventid=<?php echo $event->EventId; ?>">View more</a>
													
													<span class='icon'> </span> 
												</figcaption>
											</figure>
										</div>

									<?php } //foreach ?>
								</div><!--/row-->
								
						<?php } //else ?>
							
				</div><!--/row-->

				

			</div><!--/row-->

		</div><!--/col-8-->
</div></div><!--/container and row-->
</section>
<?php
require 'footer.php';
?>

