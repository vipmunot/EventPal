<?php 
    session_start();
    if(isset($_SESSION['MemberId'])) {
        require 'member_header.php';
    }
    else {
        require 'header.php';
    }
?>
	<script language="JavaScript" src="js/gen_validatorv4.js" type="text/javascript"></script>

<section id="section-contact">
    <div class="container">
    <div class = "clearfix">&nbsp;</div>
    <div class = "clearfix">&nbsp;</div>
    <div class = "clearfix">&nbsp;</div>
      <h1 class="text-center">We'd love to hear from you.</h1>
      <div class="row">
        

        <div class="col-md-10 col-sm-8" >
          <!--////////// CONTACT FORM STARTS HERE ///////////-->
          <div class="contact-form">
            <form id="contact-form" class="form-horizontal" name="lform" action="emailcontact.php" method="post">
              <div class="row">
                <div class="form-group">
                  <label for="name" class="col-md-3 control-label">&nbsp;</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Hello, what's your name?"  >
                  </div>
                </div><!-- end form-group -->
              </div><!-- /row -->

              <div class="row">
                <div class="form-group">
                  <label for="name" class="col-md-3 control-label">&nbsp;</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" id="email" name="email" placeholder="What's your email address?">
                    </div>
                </div><!-- end form-group -->
              </div><!-- /row -->

              <div class="row">
                <div class="form-group textarea">
                  <label for="name" class="col-md-3 control-label">&nbsp;</label>
                  <div class="col-md-9">
                    <textarea class="form-control" id="message" name="message" rows="4" placeholder="How can we help you?" ></textarea>
                  </div>
                <div id='lform_errorloc' class='error_strings text-right'></div>
                </div><!-- end form-group -->
                <button class="btn btn-large btn-primary contact-submit pull-right" type="submit" name="submit">Send Away!</button>
              </div><!-- /row -->
            </form>
          </div><!-- /contact-form -->
          <!-- ////////// END CONTACT FORM -->
        </div><!-- /col-md-7 -->
      </div><!-- /row -->
    </div><!-- end container -->
<script language="JavaScript" type="text/javascript">
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("lform");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 
  frmvalidator.addValidation("name","req","Please enter your First Name");
  frmvalidator.addValidation("email","req");
  frmvalidator.addValidation("email","email");  
  frmvalidator.addValidation("message","req");

</script>
    
  </section>

<?php 
require 'footer.php';
?>