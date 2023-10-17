<?php include "inc/u-header.php"; ?>
<main class="container">
  <div class="container-overlay">
  <section class="section">
    <h3 class="section-title">Form for Adding Memberships</h3>
  <?php
    if (isset($_POST['add'])) {
      addMembership($_POST['membershipname'], $_POST['membershipdescription'],$_POST['membershipperiod'],$_POST['membershipfee'],$_POST['membershiptype'],$_SESSION['user']['user_id']);
    }
    ?>
    <div class="section-content">
    <form id="membership" method="POST">
        <fieldset>
            <label>Membership Name: </label>
            <input type="text" id="membershipname" name="membershipname">
        </fieldset>
        <fieldset>
            <label>Membership Description: </label>
            <input type="text" id="membershipdescription" name="membershipdescription">
        </fieldset>
        <fieldset>
            <label>Membership Period: </label>
            <input type="text" id="membershipperiod" name="membershipperiod">
        </fieldset>
        <fieldset>
            <label>Membership Fee: </label>
            <input type="text" id="membershipfee" name="membershipfee">
        </fieldset>
        <fieldset>
            <label>Membership Type: </label>
            <input type="text" id="membershiptype" name="membershiptype">
        </fieldset>
        <input type="submit" name="add" id="add" value="Add">
    </form>  
    </div>  
  </section>
  </div> 
</main>

<?php include "inc/footer.php"; ?>