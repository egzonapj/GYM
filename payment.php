<?php include "inc/header.php"; ?>
<main class="container">
  <div class="container-overlay">
    <section class="payment section">
    <?php
    if(isset($_GET['membership'])){
      $membership_id=$_GET['membership'];
      $membership=getMembershipId($membership_id);
      $membership_fee=$membership['membership_fee'];
      $firstname=$_GET['firstname'];
      $lastname=$_GET['lastname'];
      $telephone=$_GET['telephone'];
      $email=$_GET['email'];
      $password=$_GET['password'];
      $age=$_GET['age'];
      $gender=$_GET['gender'];
      $joiningdate=$_GET['joiningdate'];
    }
    if(isset($_GET['mshid'])&isset($_GET['jd'])){
      $membership_id=$_GET['mshid'];
      $joiningdate=$_GET['jd'];
      $membership=getMembershipId($membership_id);
      $membership_fee=$membership['membership_fee'];
    }
    if(isset($_POST['pay'])){
      $paymentdate=date('Y-m-d');
      if(!isset($_SESSION['member'])){
        register($firstname, $lastname, $telephone,$email,$password,$age,$gender,$membership_id,$joiningdate,$membership_fee,$paymentdate);
        payment($email,$membership_fee,$paymentdate);
      } else {
        changeMembership($_SESSION['member']['member_id'],$membership_id,$joiningdate);
        chPayment($_SESSION['member']['member_id'],$membership_fee,$paymentdate);
      }
    }
    ?>
      <h3 class="section-title">Payment Form</h3>
      <div class="section-content">
        <form id="payment" method="POST">
          <fieldset>
            <label>Account Number: </label>
            <input type="text" id="accountnr" name="accountnr">
          </fieldset>
          <fieldset>
            <label>Expiry Date: </label>
            <input type="text" id="expirydate" name="expirydate" placeholder="month-year / 12-23">
          </fieldset>
          <fieldset>
            <label>Security Number: </label>
            <input type="text" id="securitynr" name="securitynr">
          </fieldset>
          <input type="submit" name="pay" id="pay" value="<?php echo "Paguaj " . $membership_fee . " euro" ?>">
        </form>
      </div>
    </section>
  </div>
  </main>
  <?php include "inc/footer.php"; ?>
