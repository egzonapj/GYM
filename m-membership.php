<?php include "inc/m-header.php"; ?>
  <main class="container">
    <div class="container-overlay">
      <section class="section">
        <h3 class="section-title">Membership</h3>
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
          $member_id=$_SESSION['member']['member_id'];
          $membershiptype=getMembershipType($member_id);     
          echo "<h5>" .  "Joining Date: ". "<span>"  . $membershiptype['joining_date']."</span>" . "</h5>";
          echo "<h5>" . "End of Membership: " . "<span>" .  $membershiptype['end_of_membership']."</span>" . "</h5>";
          echo "<h5>" . "Membership Type: " . "<span>" .  $membershiptype['type_name']."</span>" . "</h5>";
          echo "<h5>" . "Membership Description: " . "<span>" .  $membershiptype['type_description']."</span>" . "</h5>"; 
          echo "<h5>" . "Membership Fee: " . "<span>" .  $membershiptype['membership_fee'] . "&euro;" . "</span>" ."</h5>"; 
          echo "<h5><a id='change' class='section-btn' href='m-changemembership.php'>Change Membership Type</a></h5>";
          }
          ?>
          </div>
        </div>

      </section>
    </div>
  </main>

  <?php include "inc/footer.php"; ?>