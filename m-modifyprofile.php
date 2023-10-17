<?php include "inc/m-header.php"; ?>
  <main class="container">
    <div class="container-overlay">
    <section class="section">
      <h3 class="section-title">Form for modifying profile</h3>
      <?php
      if (isset($_SESSION['member'])){
        $member= array();
        $member= $_SESSION['member'];
        $member_id=$member['member_id'];
        $member_firstname = $member['member_firstname'];
        $member_lastname=$member['member_lastname'];
        $telephone=$member['telephone'];
        $age=$member['age'];
        $gender=$member['gender'];
        $email=$member['email'];
        $password=$member['password'];
      }
      if (isset($_POST['save'])) {
        modifyMemberProfile($_POST['member_id'],$_POST['telephone'],$_POST['age'], $_POST['gender'], 
        $_POST['email'], $_POST['password']);
      }

      ?>
      <div class="section-content">
      <div class="center">
      <form id="m-profile" method="POST">
        <input type="hidden" id="member_id" name="member_id" value="<?php if(!empty($member_id)) echo $member_id; ?>">
        <fieldset>
          <label>First name: </label>
            <input disabled type="text" id="firstname" name="firstname" value="<?php if(!empty($member_firstname)) echo $member_firstname; ?>">
        </fieldset>
        <fieldset>
          <label>Last Name: </label>
          <input disabled type="text" id="lastname" name="lastname" value="<?php if(!empty($member_lastname)) echo $member_lastname; ?>">
        </fieldset>
        <fieldset>
          <label>Telephone: </label>
          <input type="text" id="telephone" name="telephone" value="<?php if(!empty($telephone)) echo $telephone; ?>">
        </fieldset>
        <fieldset>
          <label>Age: </label>
          <input type="text" id="age" name="age" value="<?php if(!empty($age)) echo $age; ?>">
        </fieldset>
        <fieldset>
          <label>Gender: </label>
          <input type="text" id="gender" name="gender" value="<?php if(!empty($gender)) echo $gender; ?>">
        </fieldset>
        <fieldset>
          <label>Email: </label>
          <input type="email" id="email" name="email" value="<?php if(!empty($email)) echo $email; ?>">
        </fieldset>
        <fieldset>
          <label>Password: </label>
          <input type="password" id="password" name="password" value="<?php if(!empty($password)) echo $password; ?>">
        </fieldset>
        <input type="submit" name="save" id="save" value="SAVE">
        </div>
        </div>
      </form>
    </section>
    </div>
  </main>
  
<?php include "inc/footer.php"; ?>
  