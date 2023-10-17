<?php include "inc/u-header.php"; ?>
<main class="container">
 <div class="container-overlay">
  <section  class="section">
    <h3 class="section-title">Form for Membership Modification</h3>
  <?php
    if (isset($_GET['mtid'])) {
      $membership=getMembershipId($_GET['mtid']);
      $membership_id=$membership['type_id'];
      $membership_name=$membership['type_name'];
      $membership_description=$membership['type_description'];
      $membership_period=$membership['membership_period'];
      $membership_fee=$membership['membership_fee'];
      $membership_type=$membership['membership_type'];
    }
    if (isset($_POST['save'])) {
        modifyMembership($_POST['membershipid'],$_POST['membershipname'], $_POST['membershipdescription'],$_POST['membershipperiod'],$_POST['membershipfee'],$_POST['membershiptype']);
    }
    ?>
    <div class="section-content">
    <form id="membership" method="POST">
        <input type="hidden" id="membershipid" name="membershipid" value="<?php if(!empty($membership_id)) echo $membership_id; ?>">
        <fieldset>
            <label>Membership Name: </label>
            <input type="text" id="membershipname" name="membershipname" value="<?php if(!empty($membership_name)) echo $membership_name; ?>">
        </fieldset>
        <fieldset>
            <label>Membership Description: </label>
            <input type="text" id="membershipdescription" name="membershipdescription" value="<?php if(!empty($membership_description)) echo $membership_description; ?>">
        </fieldset>
        <fieldset>
            <label>Membership Period: </label>
            <input type="text" id="membershipperiod" name="membershipperiod" value="<?php if(!empty($membership_period)) echo $membership_period; ?>">
        </fieldset>
        <fieldset>
            <label>Membership Fee: </label>
            <input type="text" id="membershipfee" name="membershipfee" value="<?php if(!empty($membership_fee)) echo $membership_fee; ?>">
        </fieldset>
        <fieldset>
            <label>Membership Type: </label>
            <input type="text" id="membershiptype" name="membershiptype" value="<?php if(!empty($membership_type)) echo $membership_type; ?>">
        </fieldset>
        <input type="submit" name="save" id="save" value="SAVE">
    </form>  
    </div>  
  </section>
  </div>
</main>

<?php include "inc/footer.php"; ?>