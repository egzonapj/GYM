<?php include "inc/t-header.php"; ?>
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
          $trainer_id = $_SESSION['member']['trainer_id'];
          $trainer = getTrainerId($trainer_id);
          $trainer_firstname = $trainer['trainer_firstname'];
          $trainer_lastname=$trainer['trainer_lastname'];
          $telephone=$trainer['telephone'];
          $email=$trainer['email'];
          $password=$trainer['password'];
          echo "<h3>" . "Full Name:  " . "<span>" . $trainer_firstname . ' ' . $trainer_lastname . "</span>" . "</h3>";
          echo "<h5>" . "Telephone:  " . "<span>" . $telephone . "</span>" . "</h5>";
          echo "<h5>" . "Email: " . "<span>" . $email . "</span>" . "</h5>";
          echo "<h5>" . "Password: " . "<span>" . $password . "</span>" . "</h5>";
          echo "<h5><a class='section-btn' href='t-modifyprofile.php'>Modify Profile</a></h5>";   
        }
        ?>
        </div>
        </div>
      </section>
    </div>
  </main>
  
<?php include "inc/footer.php"; ?>
  
  