<?php
session_start();
error_reporting(0);
include("header.php");
if (isset($_POST['submit'])) {
  $message = "<strong>Dear $_POST[name],</strong><br />
				<strong>Your Email ID is :</strong> $_POST[email]<br />
				<strong>Message :-</strong> $_POST[comment]
				";
  sendmail("", "Mail from Appoint My Doctor", $message);
}

function sendmail($toaddress, $subject, $message)
{
  require 'PHPMailer-master/PHPMailerAutoload.php';
  $mail = new ('PHPMailer');

  //$mail->SMTPDebug = 3;                               // Enable verbose debug output

  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = '';  // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = '';                 // SMTP username
  $mail->Password = '';                           // SMTP password
  $mail->SMTPSecure = '';                            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = '';                                    // TCP port to connect to

  $mail->From = '';
  $mail->FromName = '';
  $mail->addAddress($toaddress, '');     // Add a recipient
  $mail->addAddress($toaddress);               // Name is optional
  $mail->addReplyTo('', 'Information');
  $mail->addCC('');
  $mail->addBCC('');

  $mail->addAttachment('');         // Add attachments
  $mail->addAttachment('/', '');    // Optional name
  $mail->isHTML(true);                                  // Set email format to HTML

  $mail->Subject = $subject;
  $mail->Body    = $message;
  $mail->AltBody = $subject;

  if (!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
    echo '<center><strong><font color=green>Mail sent.</font></strong></center>';
  }
}

?>
<!-- Content -->
<div id="content">

  <!-- Contact Us -->
  <section class="p-t-b-150">
    <!-- CONTACT FORM -->
    <div class="container">
      <!-- Tittle -->
      <div class="heading-block">
        <h4>CONTACT US</h4>
        <hr>
      </div>
      <div class="contact">
        <div class="contact-form">
          <!-- FORM  -->
          <form role="form" id="contact_form" class="contact-form" method="post" onSubmit="return false">
            <div class="row">
              <div class="col-md-6">
                <ul class="row">
                  <li class="col-sm-12">
                    <label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="* Name">
                    </label>
                  </li>
                  <li class="col-sm-12">
                    <label>
                      <input type="text" class="form-control" name="email" id="email" placeholder="* Email">
                    </label>
                  </li>
                  <li class="col-sm-12">
                    <label>
                      <input type="text" class="form-control" name="company" id="company" placeholder="Phone">
                    </label>
                  </li>
                </ul>
              </div>
              <div class="col-md-6">
                <ul class="row">
                  <li class="col-sm-12">
                    <label>
                      <input type="text" class="form-control" name="website" id="website" placeholder="Branch">
                    </label>
                  </li>
                  <li class="col-sm-12">
                    <label>
                      <textarea class="form-control" name="message" id="message" rows="5" placeholder="* Message"></textarea>
                    </label>
                  </li>
                  <li class="col-sm-12 no-margin">
                    <button type="submit" value="submit" class="btn" id="btn_submit" onClick="proceed();">SEND MESSAGE</button>
                  </li>
                </ul>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- BOXES -->
  <section class="contact-box">
    <div class="container">
      <div class="row">

        <!-- Shop Location -->
        <div class="col-md-8">
          <div class="boxes-in">
            <h6>CONTACT</h6>
            <ul class="location">
              <li> <i class="fa fa-location-arrow"></i>
                <p>199 Whitecliff, Whitecliff, Harare</p>
              </li>
              <li><i class="fa fa-phone"></i>
                <p>0772853040, 0714199183</p>
                <p>0777775826</p>
                <p></p>
              </li>
              <li> <i class="fa fa-envelope"></i>
                <p>priscakanyenze@gmail.com</p>
              </li>
              <li> <i class="fa fa-clock-o"></i>
                <p>Mon-Fri: 00:00 - 00:00</p>
                <p>Sat-Sun: 00:00 - 00:00</p>
              </li>
            </ul>
          </div>
        </div>

        <!-- NEWSLETTER -->
        <div class="col-md-4">
          <div class="boxes-in">
            <h6>SOCIAL LINKS</h6>

            <!--======= FOOTER ICONS =========-->
            <ul class="social_icons">
              <li class="facebook"><a href=""><i class="fa fa-facebook"></i></a></li>
              <li class="twitter"><a href=""><i class="fa fa-twitter"></i></a></li>
              <li class="linkedin"><a href=""><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Footer -->

<?php include 'footer.php'; ?>