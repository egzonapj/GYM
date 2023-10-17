<?php include "inc/header.php"; ?>
  <main>
    <!-- banner section starts -->
    <section class="banner">
      <div class="image-overlay">
        <div class="main-content">
          <h2>
            Get Your Body
          </h2>
          <h1>
            Fitness Here
          </h1>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do   eiusmod tempor incididunt ut
            labore et dolore magna aliqua. Ut enim ad minim veniam
          </p>
          <div class="btn-container">
            <a href="" class="btn-1 btn-box">
              Read More
            </a>
            <a href="" class="btn-2 btn-box">
              Get A Quote
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- banner section ends -->

    <!-- about section starts -->
    <section class="about" id="about">
      <div class="about-heading">
        <h2>
          About Gym Power
        </h2>
      </div>
      <div class="about-content">
        <div class="img-box">
          <img src="images/about-img.png" alt="">
        </div>
        <div class="about-detail">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis
          </p>
          <a href="" class="btn-3 btn-box">
            Read More
          </a>
        </div>
      </div>
    </section>
    <!-- about section ends -->

    <!-- services section starts -->
    <section class="services" id="services">
      <div class="services-all">
        <h2>Our Services</h2>
        <div class="services-container">
          <div class="service-box">
            <a href="">
              <img src="images/s-1.jpg" alt="">
              <h6 class="visible-heading">crosfit training</h6>
            </a>
            <div class="section-hover">
              <img src="images/link.png" alt="">
              <h6>crosfit training</h6>
            </div>
          </div>
          <div class="service-box">
            <a href="">
              <img src="images/s-2.jpg" alt="">
              <h6 class="visible-heading">fitnes</h6>
            </a>
            <div class="section-hover">
              <img src="images/link.png" alt="">
              <h6>fitnes</h6>
            </div>

          </div>
          <div class="service-box">
            <a href="">
              <img src="images/s-3.jpg" alt="">
              <h6 class="visible-heading">dynamic strength training</h6>
            </a>
            <div class="section-hover">
              <img src="images/link.png" alt="">
              <h6>dynamic strength training</h6>
            </div>
          </div>
          <div class="service-box">
            <a href="">
              <img src="images/s-4.jpg" alt="">
              <h6 class="visible-heading">health</h6>
            </a>
            <div class="section-hover">
              <img src="images/link.png" alt="">
              <h6>health</h6>
            </div>
          </div>
          <div class="service-box">
            <a href="">
              <img src="images/s-5.jpg" alt="">
              <h6 class="visible-heading">workout</h6>
            </a>
            <div class="section-hover">
              <img src="images/link.png" alt="">
              <h6>workout</h6>
            </div>
          </div>
          <div class="service-box">
            <a href="">
              <img src="images/s-6.jpg" alt="">
              <h6 class="visible-heading">strategies</h6>
            </a>
            <div class="section-hover">
              <img src="images/link.png" alt="">
              <h6>strategies</h6>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- services section ends -->

    <!-- memberships section starts -->
    <section class='memberships' id='memberships'>
      <h2 class="title">Memberships</h2>
      <div class="slider autoplay">
          <?php
          $memberships = getMemberships();
          while ($membership = mysqli_fetch_assoc($memberships)) {
            $type_id=$membership['type_id'];
            $type_name=$membership['type_name'];
            $membership_period=$membership['membership_period'];
            $type_description=$membership['type_description'];
            $membership_fee=$membership['membership_fee'];
            $membership_type=$membership['membership_type'];
            echo "<div class='membership-box'>";
            echo "<h4 class='section-title'>{$type_name}</h4>";
            echo "<article class='membership-content'>";
            echo "<p>{$type_description}</p>";
            echo "<a href='login_register.php' class='btn-1 btn-box'>Pay {$membership_fee} &euro;</a>";
            echo "</article>";
            echo "</div>";
          }
          ?>
      </div>
    </section>
    <!-- memberships section ends -->


    <!-- contact section starts -->
    <section class="contact" id="contact">
      <div class="contact-container">
        <h2>Get In Touch</h2>
        <div class="contact-content">
          <form action="" class="contact-form">
            <input type="text" name="name" id="name" placeholder="Name"><br>
            <input type="email" name="email" id="email" placeholder="Email"><br>
            <textarea name="message" id="c-message" cols="22" rows="4" placeholder="Message"></textarea><br>
            <input type="submit">
          </form>
          <iframe id='location' src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2926.4619916906527!2d20.969753575451733!3d42.82085400586654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13535bc290bcae53%3A0xc76f56ddad9b2e34!2sPower%20GYM%20vushtri!5e0!3m2!1sen!2s!4v1685280734864!5m2!1sen!2s" width="450" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </section>
    <!-- contact section ends -->
  </main>

  <?php include "inc/footer.php"; ?>
