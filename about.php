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

<section id = "aboutus">
  <div class = "clearfix">&nbsp;</div>
  <div class = "clearfix">&nbsp;</div>
  <div class="container"><div class="row">
    <div class="col-md-12">
  		<h1 align=center>About Us </h1>
  		<h2>What and Who is EventPal?</h2>
  		
  		<p class="text-justify"><strong>We are the place where people of all ages and backgrounds can come to talk, share and bond with new friends. </strong>EventPal is the biggest friendship social networking sites available. Established in April, 2017</a>, EventPal is growing at an amazing pace. Free for all to sign up, EventPal website allows them to talk, share and bond in whatever ways they are comfortable. <br /><br />Events are posted by a local rep and sometimes local companies. The allows people to find friends for various activities on topics ranging from the best local hair salons to how best to get over a break up or how to deal with fleas on your pet. <br />EventPal brings people together in thousands of cities to do more of what they want to do in life. It is organized around one simple idea:</p><h4 class="text-center"><strong> "When we get together and do the things that matter to us, we’re at our best."</strong></h4><br><br>
  		
  		<article id="faq-wrapper">

      <br> 
      <h1 align=center>Our Team</h1>

      <table width="100%" border="0" cellpadding="0">
          
          <!-- Rohit -->
          <tr>
            <td valign="top">
            <p>
              <a href = "/member.php?memberid=1">
                <img src="Images/Admins/Rohit.jpg" alt="Rohit Nair" hspace="5" vspace="5" border="1" style="max-width: 100px; max-height: 100px;"/>
              </a>
            </p>
            </td>

            <td valign="center">
              <p class="text-justify">
                <a href = "/member.php?memberid=1"><strong>Rohit Nair</strong></a>
                - 
                <a href="mailto:RohitNair987@gmail.com">RohitNair987@gmail.com</a>  
                <br>
                Software Developer/Problem solver. I constantly look for new challenges that keep me on the edge.
                <br>
              </p>
            </td>
          </tr>


          <!-- Shruthi -->
          <tr>
            <td valign="top">
            <p>
              <a href = "/member.php?memberid=1">
                <img src="Images/Admins/Shruthi.jpg" alt="Shruthi" hspace="5" vspace="5" border="1" style="max-width: 100px; max-height: 100px;"/>
              </a>
            </p>
            </td>

            <td valign="center">
              <p class="text-justify">
                <a href = "/member.php?memberid=1"><strong>Shruthi Ramakrishnan</strong></a>
                - 
                <a href="mailto:shruthi2811@gmail.com">shruthi2811@gmail.com</a>  
                <br>
                Data Analyst, Coding enthusiast, Art lover, very passionate about dance too.
                <br>
              </p>
            </td>
          </tr>


          <!-- Vipul -->
          <tr>
            <td valign="top">
            <p>
              <a href = "/member.php?memberid=1">
                <img src="Images/Admins/Vipul.jpg" alt="Vipul" hspace="5" vspace="5" border="1" style="max-width: 100px; max-height: 100px;"/>
              </a>
            </p>
            </td>

            <td valign="center">
              <p class="text-justify">
                <a href = "/member.php?memberid=1"><strong>Vipul</strong></a>
                - 
                <a href="mailto:vipmunot@gmail.com">vipmunot@gmail.com</a>  
                <br>
                I love exploring new things, travelling, trekking, music and coffee.
                <br>
              </p>
            </td>
          </tr>

      </table>

      <br> 
      <h1 align=center>Our Local Commitment</h1>
      <p class="text-center">EventPal, based in Bloomington, Indiana, USA is currently available for everyone within the USA. What are you waiting for? <a href="./register.php">Sign up now!</a></p>

    </div>
  </div>
</section>

<?php 
  require 'footer.php';
?>