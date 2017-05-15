<?php
    
    session_start();
    include 'Constants.php';
    include 'Utils/DatabaseUtil.php';

    if(isset($_SESSION['MemberId'])) {
        require 'member_header.php';
    }
    else {
        require 'header.php';
    }

?>

<script src='js/search.js'></script>

<div class="clearfix">&nbsp;</div>
<section id = "categories">
    <div class="col-md-4"></div>
    <div class = "container">
        <div class="clearfix">&nbsp;</div>
        <div class = "row">
            <h2 class="text-center"> What is on your mind? </h2>
        </div>

        <div class="clearfix">&nbsp;</div>

        <div class ="row">
            <div class="col-md-4">
                <h2>Search Options</h2>
            <!--
                <br/>
                <label>Sort by</label>
                <select>
                    <option value="Best Match" selected>Best Match</option>
                    <option value="Members">Members</option>
                    <option value="Newest">Newest</option>
                    <option value="Closest">Closest</option>
                </select>
            -->
                <br/><label>Filter by interest(s)</label>
                
                <?php   $interests = getAllInterestsFromDB(); ?>

                        <ul type = 'None' id ='searchbar'>
                            <?php   foreach ($interests as $interest) { ?>
                                        <li>
                                            <input type='checkbox' name='interests' value='<?php echo $interest->InterestId; ?>'>
                                            <?php echo $interest->Name; ?>
                                        </li>
                            <?php   } ?>
                        </ul>


				<br/><label>Filter by day(s)</label>
				<ul type = 'None' id = 'searchbar'>
    				<li><input type = 'checkbox' name = 'days' value ="Monday">Monday</li>
    				<li><input type = 'checkbox' name = 'days' value ="Tuesday">Tuesday</li>
    				<li><input type = 'checkbox' name = 'days' value ="Wednesday">Wednesday</li>
    				<li><input type = 'checkbox' name = 'days' value ="Thursday">Thursday</li>
    				<li><input type = 'checkbox' name = 'days' value ="Friday">Friday</li>
    				<li><input type = 'checkbox' name = 'days' value ="Saturday">Saturday</li>
    				<li><input type = 'checkbox' name = 'days' value ="Sunday">Sunday</li>
				</ul>


                <button type="button" onclick="applyFilter()">
                    Update
                </button>

            </div> <!-- End of the filters column -->


            <div class="col-md-8">

                <?php
                    $eventsArray = array();
                            
                    $parts = parse_url($_SERVER['REQUEST_URI']);
                    parse_str($parts['query'], $queryString);

                    $interestIds = $queryString['interests'];
                    $days = $queryString['days'];
                   
                    $daysArray = array();
                    if(!empty($days)) {
                        $daysArray = explode(",", $days);
                    }

                    if(empty($interestIds)) {
                        $eventsArray = getAllEventsFromDB();
                    }
                    else {
                        foreach (explode(",", $interestIds) as $interest) {
                            foreach (getEvents($interest) as $event) {
                                if(!empty($days)) {
                                    foreach ($daysArray as $day) {
                                        if (strpos($event->Days, $day) !== false) {
                                            array_push($eventsArray, $event);
                                            break;
                                        }
                                    }
                                }
                                else {
                                    array_push($eventsArray, $event);
                                }
                            }
                        }
                    }

                    if(empty($eventsArray)) {
                        echo '<div><h4>There are currently no events listed under the interest(s) you have selected. Please select other interests.</h4></div>';
                    }
                    else {
                        $count = 0;
                        echo "<div class='row'>";
                        foreach($eventsArray as $event) {
                            if(empty($event->Image)) {
                                $event->Image = 'Images/Default.png';
                            }

                            if($count > 2) {
                                echo "</div><div class='row'>";
                                $count = 1;
                            }
                            else {
                                $count += 1;
                            }

                            echo '
                                <div class="col-md-4 col-sm-10 col-xs-11 wow bounceIn">
                                    <figure class="effect">
                                        <img alt="Event" src="'.$event->Image.'" />
                                        <figcaption>
                                            <h3>'.$event->Title.'</h3>
                                            <a href="event.php?eventid='.$event->EventId.'">View more</a> <span class="icon"> </span> 
                                        </figcaption>
                                    </figure>
                                </div>
                            ';
                            
                        }
                        if($count != 0) {
                            echo "</div>";
                        }
                    }
                ?>

            </div>
            <!--End col-md-8-->
        </div>
        <!--End row-->
    </div>
    <!--End container-->
</section>

<?php
    include 'footer.php';
?>