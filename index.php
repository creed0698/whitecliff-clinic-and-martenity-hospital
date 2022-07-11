<?php
session_start();
error_reporting(0);
include("header.php");
$dt = date("Y-m-d");
$tim = date("H:i:s");
?>

<!-- Bnr Header -->
<section class="main-banner">
  <div class="tp-banner-container">
    <div class="tp-banner">
      <ul>

        <!-- SLIDE  -->
        <li data-transition="random" data-slotamount="7" data-masterspeed="300" data-saveperformance="off">
          <!-- MAIN IMAGE -->
          <img src="images/banner-bg.jpg" alt="slider" data-bgposition=" center center" data-bgfit="cover" data-bgrepeat="no-repeat">

          <!-- LAYER NR. 1 -->
          <div class="tp-caption sfl tp-resizeme" data-x="center" data-hoffset="0" data-y="center" data-voffset="-120" data-speed="800" data-start="800" data-easing="Power3.easeInOut" data-splitin="chars" data-splitout="none" data-elementdelay="0.03" data-endelementdelay="0.4" data-endspeed="300" style="z-index: 5; 
                      font-size:50px; 
                      font-weight:500; 
                      color:#fff;  
                      max-width: auto; 
                      max-height: auto; 
                      white-space: nowrap;">
            Whiteliff Clinic and Maternity Hospital
          </div>

          <!-- LAYER NR. 2 -->
          <div class="tp-caption sfr tp-resizeme" data-x="center" data-hoffset="0" data-y="center" data-voffset="-60" data-speed="800" data-start="1000" data-easing="Power3.easeInOut" data-splitin="chars" data-splitout="none" data-elementdelay="0.03" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 6; 
                      font-size:40px; 
                      font-weight:500; 
                      color:#f55262; 
                      white-space: nowrap;">
            Your family’s health is our primary concern
          </div>

          <!-- LAYER NR. 3 -->
          <div class="tp-caption sfb tp-resizeme" data-x="center" data-hoffset="0" data-y="center" data-voffset="0" data-speed="800" data-start="1200" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 7;  
                      font-size:22px; 
                      color:#fff; 
                      font-weight:500; 
                      max-width: auto; 
                      max-height: auto; 
                      white-space: nowrap;">
            Nothing but the best; Best care, best service
          </div>

          <!-- LAYER NR. 4 -->
          <div class="tp-caption lfb tp-resizeme scroll" data-x="center" data-hoffset="0" data-y="center" data-voffset="120" data-speed="800" data-start="1300" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" data-scrolloffset="0" style="z-index: 8;"><a href="patientappointment.php" class="btn">Book Now</a> </div>
        </li>
      </ul>
    </div>
  </div>
</section>

<!-- Content -->
<div id="content">

  <!-- Intro -->
  <section class="p-t-b-150">
    <div class="container">
      <div class="intro-main">
        <div class="row">

          <!-- Intro Detail -->
          <div class="col-md-8">
            <div class="text-sec">
              <h5>Health Check Up</h5>
              <!-- <p>Labaid Diagnostic Centre, in addition to providing world-class clinical lab services, it has a pool of specialists from various medical specialties who serve suffering patients as outpatients. They are all well-known and well-respected in their medical fields for excellent clinical management.</p> -->
              <ul class="row">
                <li class="col-sm-6">
                  <h6> <i class="lnr  lnr-checkmark-circle"></i> EMERGENCIES</h6>
                  <p>Whiteliff Clinic and Maternity Hospital provide reliable communications. </p>
                </li>
                <li class="col-sm-6">
                  <h6> <i class="lnr  lnr-checkmark-circle"></i> PROFESSIONAL SPECIALISTS</h6>
                  <p>Whiteliff Clinic and Maternity Hospital has licensed and qualified doctors! </p>
                </li>
                <li class="col-sm-6">
                  <h6> <i class="lnr  lnr-checkmark-circle"></i> ONLINE APPOINTMENT</h6>
                  <p>Online Appointment is supported. Check the appointment tab above. </p>
                </li>
                <li class="col-sm-6">
                  <h6> <i class="lnr  lnr-checkmark-circle"></i> FREE ACCESS TO MEDICAL COUNSELING</h6>
                  <p>Free medical counseling is provided by our specialists.</p>
                </li>
              </ul>
            </div>
          </div>

          <!-- Intro Timing -->
          <div class="col-md-4">
            <div class="timing"> <i class="lnr lnr-clock"></i>
              <ul>
                <li> Monday <span>00:00 - 00:00</span></li>
                <li> Tuesday <span>00:00 - 00:00</span></li>
                <li> Wednesday <span>00:00 - 00:00</span></li>
                <li> Thursday <span>00:00 - 00:00</span></li>
                <li> Friday <span>00:00 - 00:00</span></li>
                <li> Saturday <span>00:00 - 00:00</span></li>
                <li> Sunday <span>00:00 - 00:00</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>




  <!-- DOCTOR LIST -->
  <section class="p-t-b-150">
    <div class="container">

      <!-- Heading -->
      <div class="heading-block">
        <h2>Our Services</h2>
        <hr>
      </div>

      <!-- Services -->
      <div class="services">
        <div class="row">

          <!-- Services -->
          <div class="col-md-4">
            <article>
              <div class="media-left"> <i class="flaticon-doctor icon"></i> </div>
              <div class="media-body">
                <h6>24Hr General Counseling</h6>
                <p>Before recommending patients for laboratory or further tests, we always have a 
                  doctor (medical officer) assess and clinically examine them.</p>
              </div>
            </article>
          </div>

          <!-- Services -->
          <div class="col-md-4">
            <article>
              <div class="media-left"> <i class="flaticon-eye-2 icon"></i> </div>
              <div class="media-body">
                <h6>Martenity Booking</h6>
                <p>It is the cornerstone of maternal and neonatal care, with numerous advantages for 
                  both the mother and the baby. </p>
              </div>
            </article>
          </div>

          <!-- Services -->
          <div class="col-md-4">
            <article>
              <div class="media-left"> <i class="flaticon-pulse icon"></i> </div>
              <div class="media-body">
                <h6>Antenatal Care</h6>
                <p>Competent health-care professionals to ensure the optimal health 
                  circumstances for both mother and feotus during pregnancy.</p>
              </div>
            </article>
          </div>

          <!-- Services -->
          <div class="col-md-4">
            <article>
              <div class="media-left"> <i class="flaticon-health-care icon"></i> </div>
              <div class="media-body">
                <h6>Baby Scale</h6>
                <p>Regular weighing throughout the 
                  development to ensure that weight changes are within normal limits.</p>
              </div>
            </article>
          </div>

          <!-- Services -->
          <div class="col-md-4">
            <article>
              <div class="media-left"> <i class="flaticon-stethoscope icon"></i> </div>
              <div class="media-body">
                <h6>Immunisation</h6>
                <p>Your child's immune system requires assistance.
                  Immunization can protect you from certain infectious diseases.</p>
              </div>
            </article>
          </div>

          <!-- Services -->
          <div class="col-md-4">
            <article>
              <div class="media-left"> <i class="flaticon-heartbeat icon"></i> </div>
              <div class="media-body">
                <h6>Baby Examination</h6>
                <p>Within 72 hours of giving birth, all parents are offered a full physical 
                  examination for their infant.</p>
              </div>
            </article>
          </div>

          <!-- Services -->
          <div class="col-md-4">
            <article>
              <div class="media-left"> <i class="flaticon-surgeon icon"></i> </div>
              <div class="media-body">
                <h6>Covid Testing</h6>
                <p>Using samples from your nose or mouth, this test determines whether you are 
                  infected with SARS-CoV-2. </p>
              </div>
            </article>
          </div>

          <!-- Services -->
          <div class="col-md-4">
            <article>
              <div class="media-left"> <i class="flaticon-icu-monitor icon"></i> </div>
              <div class="media-body">
                <h6>Scan</h6>
                <p>Medical scans to assist doctors in determining the cause of everything from 
                  head trauma to foot pain. </p>
              </div>
            </article>
          </div>

          <!-- Services -->
          <div class="col-md-4">
            <article>
              <div class="media-left"> <i class="flaticon-operating-room icon"></i> </div>
              <div class="media-body">
                <h6>Laboratory Tests</h6>
                <p>Diagnosis, therapy planning, checking to see if treatment 
                  is effective, and tracking the disease through time. </p>
              </div>
            </article>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- main js -->
<script src="js/jquery.min.js"></script>
<script src="js/main.js"></script>

<!-- vendors js -->
<script src="js/vendors/bootstrap.min.js"></script>
<script src="js/vendors/color-switcher.js"></script>
<script src="js/vendors/jquery.cubeportfolio.min.js"></script>
<script src="js/vendors/jquery.downCount.js"></script>
<script src="js/vendors/jquery.isotope.min.js"></script>
<script src="js/vendors/jquery.magnific-popup.min.js"></script>
<script src="js/vendors/jquery.sticky.js"></script>
<script src="js/vendors/jquery.textillate.js"></script>
<script src="js/vendors/map.js"></script>
<script src="js/vendors/modernizr.js"></script>
<script src="js/vendors/owl.carousel.min.js"></script>
<script src="js/vendors/own-menu.js"></script>
<script src="js/vendors/wow.min.js"></script>

<!-- flexslider -->
<script src="js/vendors/flexslider/jquery.flexslider-min.js"></script>
<script src="js/vendors/flexslider/jquery.flexslider.js"></script>

<!-- jquery -->
<script src="js/vendors/jquery/jquery.min.js"></script>

<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="vendors/popper.js/dist/umd/popper.min.js"></script>

</body>

<!-- Footer -->
<?php include 'footer.php'; ?>



