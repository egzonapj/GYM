<?php include "inc/header.php"; ?>
<?php
if (isset($_POST['login'])) {
  if (isset($_POST['type'])){
    $type=$_POST['type'];
    if($type=='member'){
      loginMember($_POST['email'], $_POST['password']);
    }else if($type=='user'){
      loginUser($_POST['email'], $_POST['password']);
    }else if($type=='trainer'){
      loginTrainer($_POST['email'], $_POST['password']);
    }
  }else {
      echo "You must select a type";
  } 
}
if (isset($_POST['save'])) {
  $membership=$_POST['membership'];
  $firstname=$_POST['firstname'];
  $lastname=$_POST['lastname'];
  $telephone=$_POST['telephone'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $age=$_POST['age'];
  $age;
  $gender=$_POST['gender'];
  $joiningdate=$_POST['joiningdate'];
  header("Location: payment.php?membership=$membership&firstname=$firstname&lastname=$lastname&telephone=$telephone&email=$email&password=$password&age=$age&gender=$gender&joiningdate=$joiningdate");
}
?>
<main class="container">
  <div class="container-overlay">
    <section class="login-register" id="login-register">
      <div class="form-login section" id="sh-login">
        <form method="POST" id="login">
          <legend ><h3 class="section-title">Login Form</h3></legend>
          <div class="section-content">
            <fieldset>
              <label>Email: </label>
              <input type="email" id="email" name="email">
            </fieldset>
            <fieldset>
              <label>Password: </label>
              <input type="password" id="password" name="password">
            </fieldset>
            <fieldset>
              <input type="radio" id="member" name="type"   value="member">
              <label for="member">Member</label><br>
              <input type="radio" id="trainer" name="type"  value="trainer">
              <label for="trainer">Trainer</label><br>
              <input type="radio" id="user" name="type" value="user">
              <label for="user">Staff</label>
            </fieldset>   
            <input type="submit" name="login" id="login" value="Login">
          </div>
        </form>
      </div>
      <div class="form-register section" id="sh-register">
        <form id="register" method="POST">
          <legend><h3 class="section-title">Register Form</h3></legend>
          <div class="section-content">
            <fieldset>
              <label>First-name: </label>
              <input type="text" id="firstname" name="firstname">
            </fieldset>
            <fieldset>
              <label>Last-name: </label>
              <input type="text" id="lastname" name="lastname">
            </fieldset>
            <fieldset>
              <label>Telephone: </label>
              <input type="text" id="telephone" name="telephone">
            </fieldset>
            <fieldset>
              <label>Email: </label>
              <input type="email" id="email" name="email">
            </fieldset>
            <fieldset>
              <label>Password: </label>
              <input type="password" id="password" name="password">
            </fieldset>
            <fieldset>
              <label for="age">Age: </label>
              <input type="text" id="age" name="age">
            </fieldset>
            <fieldset>
              <label for="gender">Gender: </label>
              <select name="gender" id="gender">
                <option value="">Select Gender</option>
                <option value="female">Female</option>
                <option value="male">Male</option>
              </select>
            </fieldset>
            <fieldset>
              <label for="membership">Memberships:</label>
              <select id="membership" name="membership">
                <option value="">Choose Membership Type </option>
                <?php
                $memberships=getMemberships();
                while ($membership = mysqli_fetch_assoc($memberships)) {
                  $type_id=$membership['type_id'];
                  $type_name=$membership['type_name'];
                  $membership_type=$membership['membership_type'];
                  echo "<option value='$type_id'>$type_name</option>";
                }  
                ?>
              </select>
            </fieldset>
           <fieldset>
              <label>Joining Date: </label>
              <input type="date" id="joiningdate" name="joiningdate">
            </fieldset>
            <input type="submit" name="save" id="save" value="Save">
          </div>
        </form>
      </div>
      <section>
  </div>
</main>
<?php include "inc/footer.php"; ?>
