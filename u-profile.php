<?php include "inc/u-header.php"; ?>
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
         if (isset($_SESSION['user'])){
        $user_id = $_SESSION['user']['user_id'];
        $user = getUserId($user_id);
        $user_firstname = $user['user_firstname'];
        $user_lastname=$user['user_lastname'];
        $telephone=$user['telephone'];
        $email=$user['email'];
        $password=$user['password'];
        echo "<h3>" . "Full Name:  " . "<span>" . $user_firstname . ' ' . $user_lastname . "</span>" . "</h3>";
        echo "<h5>" . "Telephone:  " . "<span>" . $telephone . "</span>" . "</h5>";
        echo "<h5>" . "Email: " . "<span>" . $email . "</span>" . "</h5>";
        echo "<h5>" . "Password: " . "<span>" . $password . "<span>" . "</h5>";
        echo "<h5><a class='section-btn' href='u-modifyprofile.php'>Modify Profile</a></h5>";
      }
      ?>
      </div>
      </div>
    </section>
  </div>
</main>

<?php include "inc/footer.php"; ?>

