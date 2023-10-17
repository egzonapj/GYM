<?php include "inc/m-header.php"; ?>
  <main class="container">
    <div class="container-overlay"> 
      <section class="section">
        <h3 class="section-title">Your Profile</h3>
        <div class="section-content">
          <div class="center">
          <p id="message">
            <?php
                if(isset($_SESSION['message'])){
                    echo $_SESSION['message'];
                }
            ?>
          </p>
          <?php
          if (isset($_SESSION['member'])){
            $member_id = $_SESSION['member']['member_id'];
            $member = getMemberId($member_id);
            $member_firstname = $member['member_firstname'];
            $member_lastname=$member['member_lastname'];
            $telephone=$member['telephone'];
            $age=$member['age'];
            $gender=$member['gender'];
            $email=$member['email'];
            $password=$member['password'];
            echo "<h3>" . "Full Name:  " . "<span>" . $member_firstname .  ' ' . $member_lastname ."</span>" . "</h3>";
            echo "<h5>" . "Telephone:  " . "<span>" .$telephone . "</span>" ."</h5>";
            echo "<h5>" . "Age:  " . "<span>" .$age . "</span>" ."</h5>";
            echo "<h5>" . "Gender:  " . "<span>" .$gender . "</span>" ."</h5>";
            echo "<h5>" . "Email: " . "<span>" .$email . "</span>" ."</h5>";
            echo "<h5>" . "Password: " . "<span>" .$password . "</span>" ."</h5>";
            echo "<h5><a class='section-btn' href='m-modifyprofile.php'>Modify Profile</a></h5>";  
          }
          ?>
          </div>
        </div>
      </section>
    </div>
  </main>

  <?php include "inc/footer.php"; ?>