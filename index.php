<?php
    include 'header.php';
    require 'Utils/DatabaseUtil.php';
?>

    <section id='slider'>

        <?php
            $sliderImages = array(
                // Label, Description, ImagePath
                array('Watch Anime together', 'Dive into the wonder world of Dragon Ball', 'Images/Slider/Vegeta.jpg'),
                array('Intense Battle movies', 'Come discuss stories and predict the future with the like minded', 'Images/Slider/Naruto.jpg'),
                array('Cat person?', 'Play with pets and enjoy the company', 'Images/Slider/Cat.jpg')

            );

        ?>

        <div id='myCarousel' class='carousel slide' data-interval='2000' data-ride='carousel'>

            <!-- Carousel indicators -->
            <!-- To-do: make this dynamic -->
            <ol class='carousel-indicators'>
                <li data-target='#myCarousel' data-slide-to='0' class='active'></li>
                <li data-target='#myCarousel' data-slide-to='1'></li>
                <li data-target='#myCarousel' data-slide-to='2'></li>
            </ol>  

            <!-- Wrapper for carousel items -->
            <div class='carousel-inner'>

                <?php   $first = True; ?>

                <?php   foreach ($sliderImages as $imageDetails) { ?>
                            <div class='item<?php if($first) { echo ' active';} ?>'>
                                <br>
                                <img 
                                    <?php 
                                        if($first) { 
                                            $first = False; 
                                            echo ' class = "fill" ';
                                        } 
                                    ?> 
                                    src='<?php echo $imageDetails[2] . "?" . filemtime($imageDetails[2]) ?>' alt='Slider Image'
                                >

                                <div class='carousel-caption'>
                                  <h3><?php echo $imageDetails[0] ?></h3>
                                  <p><?php echo $imageDetails[1] ?></p>
                                  <a href='register.php' class='btn btn-primary' data-animation='animated fadeInDown'>Sign up</a>
                                </div>
                            </div>
                <?php   } ?>
                
            </div>

            <!-- Carousel controls -->
            <a class='carousel-control left' href='#myCarousel' data-slide='prev'>
                <span class='glyphicon glyphicon-chevron-left'></span>
            </a>
            <a class='carousel-control right' href='#myCarousel' data-slide='next'>
                <span class='glyphicon glyphicon-chevron-right'></span>
            </a>
            
        </div>
    </section>
    

    <section id = 'upcomingevents'>
    </section>
    

    <section id = 'categories'>
        <div class='container'>
            <div class='clearfix'>&nbsp;</div>
            <div class='row'> <h2 class='text-center'> What is on your mind? </h2>
            </div>
            <div class='clearfix'>&nbsp;</div>
    
            <?php

                $interests = getAllInterestsFromDB();

                if(empty($interests)) {
                    echo "Problem fetching interests. PLease try later<br><br>";
                }
                else {
                    $rowEleCount = 1;
                    echo "<div class='row'>";
                    
                    foreach ($interests as $interest) {
                        if($rowEleCount > MAX_ROW_SIZE) {
                            $rowEleCount = 1;
                            // start a new row
                            echo "</div>
                            <div class='row'>";
                        }
            
                        $rowEleCount = $rowEleCount + 1;

                        if(empty($interest->ImagePath)) {
                            $interest->ImagePath = "Images/Default.png";
                        }
            
                        ?>

                            <div class='col-md-4 col-sm-10 col-xs-11 wow bounceIn' id=<?php echo $interest->InterestId; ?> >
                                <figure class='effect'>
                                    <img alt='LMB Productions' src='<?php echo $interest->ImagePath; ?>' />
                                    <figcaption>
                                        <h3><?php echo $interest->Name; ?></h3>
                                        <p><?php echo $interest->Description; ?></p>
                                        <a href="search.php?interest=<?php echo $interest->InterestId; ?>">View more</a>
										<span class="icon"> </span>
                                    </figcaption>
                                </figure>
                                <h3 class='text-center'><?php echo $interest->Name; ?></h3>
                            </div>

                        <?php
                    }
            
                    echo "</div>"; //end last row
                }

            ?>
    
    
        </div>
    </section>
    
    
    
    <section id = 'testmonials'>
        <div class='carousel'>
            <div class='container'>
                <div class='row'>
                    <div class='col-md-8 col-md-offset-2'>
                        <div class='quote'><i class='fa fa-quote-left fa-4x'></i>
                        </div>
                        <div class='carousel slide' id='fade-quote-carousel' data-ride='carousel' data-interval='3000'>
                            <!-- Carousel indicators -->
                            <ol class='carousel-indicators'>
                                <li data-target='#fade-quote-carousel' data-slide-to='0'></li>
                                <li data-target='#fade-quote-carousel' data-slide-to='1'></li>
                                <li data-target='#fade-quote-carousel' data-slide-to='2' class='active'></li>
                                <li data-target='#fade-quote-carousel' data-slide-to='3'></li>
                                <li data-target='#fade-quote-carousel' data-slide-to='4'></li>
                                <li data-target='#fade-quote-carousel' data-slide-to='5'></li>
                            </ol>
                            <!-- Carousel items -->
                            <div class='carousel-inner'>
                            <div class='item'>
                                <div class='profile-circle' style='background-color: rgba(0,0,0,.2);'></div>
                                <blockquote>
                                    <p>"I'm a movie fanatic. I try to catch every movie that comes out in theaters, but I don't like going by myself. I want someone there with me who can enjoy the movie, then catch a bite to eat afterwards to talk about it. EventPal is great for me. I know have an endless supply of people to contact to go with me to the movies night or day. Thank you!" </p>
									<p>Steve M, Arizona</p>
                                </blockquote>   
                            </div>
                            <div class='item'>
                                <div class='profile-circle' style='background-color: rgba(77,5,51,.2);'></div>
                                <blockquote>
                                    <p>I must say this is a great site to get to meet very nice people and I have had learning enlightening experiences. I met some wonderful people and had a great click with a local lady who is a wonderful friend and we have exchanged many texts and had a great time.</p>
									<p>Peter Hue</p>
                                </blockquote>
                            </div>
                            <div class='active item'>
                                <div class='profile-circle' style='background-color: rgba(145,169,216,.2);'></div>
                                <blockquote>
                                    <p>I was having a hard time making friends once all my college friends moved away and I had felt like I tried everything. I went out a lot, tried meet ups, etc. but nothing was sticking. I remember joking with my mom one day how I wished there was site ...   </p>
									<p>Maria Jones</p>
                                </blockquote>
                            </div>
                            <div class='item'>
                                <div class='profile-circle' style='background-color: rgba(77,5,51,.2);'></div>
                                <blockquote>
                                    <p>EventPal is FANTASTIC! Making friends is easy now.</p>
									<p>John Mendel</p>
                                </blockquote>
                            </div>
                            <div class='item'>
                                <div class='profile-circle' style='background-color: rgba(77,5,51,.2);'></div>
                                <blockquote>
                                    <p>I'm so glad I joined EventPal although some people do not response to your requests in the beginning. I stayed on the site and now meet up with three lovely ladies. We meet up a once a month for a coffee or a meal and now we all enjoy our new social life. Thanks to EventPal!  </p>
									<p>Meena Patel</p>
                                </blockquote>
                            </div>
                            <div class='item'>
                                <div class='profile-circle' style='background-color: rgba(77,5,51,.2);'></div>
                                <blockquote>
                                    <p> I come from a background in classical dance, but through EventPal I've met some wonderful people who have taught me some amazing dances that I would have never thought of learning such as Irish dancing, tap dancing and even step dancing! What a marvelous website."</p>
									<p>Christina William</p>
                                </blockquote>
                            </div>
                            </div>
                        </div>
                    </div>                          
                </div>
            </div>
        </div>      
    </section>
  
<?php
    include 'footer.php';
?>