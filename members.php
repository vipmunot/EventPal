<?php
	//ini_set('display_errors', 1);
	session_start();

	if(!isset($_SESSION['MemberId'])) {
		header("Location: index.php");
		exit();
	}

	require 'member_header.php';
	require 'Utils/Helpers.php';
	require 'Utils/DatabaseUtil.php';
?>

<section id = "members">
	<div class = "container">
		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
		<div class ="col-xs-12 col-sm-6 col-lg-8">
			<div class="row">
				<div class="row">
				<div class="col-lg-4"><img alt="Member Image" class="img-responsive center-block" src="<?php echo $_SESSION['ImagePath']; ?>" /></div>
				<div class="col-lg-4"><h3>Hi <?php echo $_SESSION['FirstName']; ?>!</h3></div>
				</div>
				
				<div class="row">

					<?php $suggestedEventIds = array(); ?>
					
					<?php $events = getMemberRegisteredEventsByMemberEMail($_SESSION['EMail']); ?>

						<?php if(empty($events)) { ?>
								<h4>You have no Registered Events. Start now!</h4>
						<?php } else { ?>
								<h4>Your Upcoming Events:</h4>
								<div class="row">
									<?php foreach ($events as $event) { ?>
										<?php array_push($suggestedEventIds, $event->EventId); ?>
									
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

		

		<div class ="col-xs-6 col-lg-4">
			<br><br><br>

			<div class="row">
				
				<!-- Suggested events for the user -->
				<?php
					$suggestedEvents = getSuggestedEventsByMemberId($_SESSION['MemberId']);
					
					if(!empty($suggestedEvents)) {
						echo "<h4>Events you might like</h4>";
						foreach ($suggestedEvents as $event) {
							array_push($suggestedEventIds, $event->EventId);
				?>
							<div class="row">
								<ul type="none">
									<li>
										<h3><a href="event.php?eventid=<?php echo $event->EventId; ?>"><?php echo $event->Title; ?></a></h3>
									</li>
									<li><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;<?php echo $event->StartDate; ?></li>
									<li><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;<?php echo $event->StartTime . " - " . $event->EndTime; ?></li>
									
								</ul>
							</div>
				<?php
						}
					}
				?>

				<br>

				<!-- Other events for the user to explore new domains -->
				<?php

					$otherEvents = getAllEventsFromDB();

					if(!empty($otherEvents)) {
						$firstEvent = True;
						foreach ($otherEvents as $event) {
							if(!in_array($event->EventId, $suggestedEventIds)) {
								if($firstEvent) {
									echo "<h4>Try something new</h4>";
									$firstEvent = False;
								}
				?>
								<div class="row">
									<ul type="none">
										<li>
											<h3><a href="event.php?eventid=<?php echo $event->EventId; ?>"><?php echo $event->Title; ?></a></h3>
										</li>
										<li><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;<?php echo $event->StartDate; ?></li>
										<li><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;<?php echo $event->StartTime . " - " . $event->EndTime; ?></li>
									</ul>
								</div>
				<?php
							}
						}
					}
				?>
				

											
			</div>
			<!--/row-->
		</div>
	</div>
	<!--/container-->
</section>


<?php 
require 'footer.php';
?>