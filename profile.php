<?php

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

		<?php

			$memberId = getQueryStringValue("memberid");
			$member = getMemberDetailsById($memberId);

			if(empty($member)) { 
		?>
				<div class ="col-xs-4 col-lg-3">
					<div class = "row">
						<br><p align="center">No such member exists.</p><br>
					</div>
				</div>

		<?php 	
			} else { 
		?>
				<div class ="col-xs-4 col-lg-3">
					<div class = "row">
						<?php
							if(empty($member->ImagePath)) {
								$member->ImagePath = "Images/Default.png";
							}
						?>
						<img alt="Member Image" src = "<?php echo $member->ImagePath; ?>" class="img-responsive center-block" />
					</div>
					<!--/row-->
					<div class = "row text-center">
						<ul class="profile">
							<?php 	if(!empty($member->FacebookUrl)) { ?>
										<li><a href="<?php echo $member->FacebookUrl; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
							<?php 	}
								 	if(!empty($member->TwitterUrl)) { ?>
										<li><a href="<?php echo $member->TwitterUrl; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
							<?php 	} ?>
							<li><a href="mailto:<?php echo $member->EMail; ?>" target="_blank"><i class="fa fa-envelope"></i></a></li>
						</ul>
					</div>
					<!--/row-->
				</div>
				<!--/col-4-->

				<div class ="col-xs-12 col-sm-6 col-lg-8">
					<div class = "row">
						<h3><?php echo $member->FirstName . " " . $member->LastName; ?></h3>
						<p><i class="fa fa-map-marker">&nbsp;<?php echo $member->Address->City . " " . $member->Address->State; ?></i></p>
						<p class="text-justify"><?php echo $member->Bio; ?></p>
					</div>
					<!--/row-->
				</div>
				<!--/col-8-->
		<?php 	} ?>

	</div>
	<!--/container-->
</section>


<?php 
	require 'footer.php';
?>