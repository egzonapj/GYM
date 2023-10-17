<?php include "inc/m-header.php"; ?>
<main class="container">
    <div class="container-overlay">
      <?php 
          if(isset($_POST['continue'])){
            $membership_id=$_POST['membership'];
            $joiningdate=$_POST['joiningdate'];
            header("Location: payment.php?mshid=$membership_id&jd=$joiningdate");
          }
            
          // if(isset($_POST['pay'])){
          //   if(isset($_SESSION['member'])){
          //     $member_id=$_SESSION['member']['member_id'];
          //   }
          //   $paymentdate=date('Y-m-d');
          //   updateMembership($member_id,$membership_id,$joiningdate);
          //   paymentId($member_id,$membership_fee,$paymentdate);
          //   }
      ?>
      <section class="section">
        <h3 class="section-title">Membership</h3>
        <div class="section-content" id="show">
          <form id="ch-membership" method="POST">
            <fieldset>
              <label for="membership">Memberships:</label>
                <select id="membership" name="membership">
                  <option value="">Choose Membership</option>
                  <?php
                  $memberships=getMemberships();
                  while ($membership = mysqli_fetch_assoc($memberships)){
                    $type_id=$membership['type_id'];
                    $type_name=$membership['type_name'];
                    echo "<option value='$type_id'>$type_name</option>";
                  }  
                  ?>
              </select>
            </fieldset>
            <fieldset>
              <label>Joining Date: </label>
              <input type="date" id="joiningdate" name="joiningdate">
            </fieldset>
            <input type="submit" name="continue" id="continue" value="CONTINUe">
          </form>
        </div>
      </section>
    </div>
  </main>
  
<?php include "inc/footer.php"; ?>