<?php include "inc/t-header.php"; ?>
  <main class="container">
    <div class="container-overlay">
    <?php
    if (isset($_POST['search1']) or isset($_POST['search2'])) {
      if (isset($_POST['membership'])){
        $member_id=$_POST['membership'];
        header("Location: t-memberplan.php?mid=$member_id");
      }
    }
    if(isset($_POST['search3'])){
      if (isset($_POST['searchdate'])){
        $date=$_POST['searchdate'];
        header("Location: t-memberplan.php?date=$date");
      }
    }
    ?>
    <section class="section">
      <h3 class="section-title">Workout Plans</h3>
      <div class="section-content workout-search">
      <form method="POST" id="first">
        <fieldset>
          <label for="membership">Members with a Workout Plan</label><br>
          <select id="wmembership" name="membership">
            <option value="">Choose a Member </option>
            <?php
            $membersWP=getMembersWP($_SESSION['member']['trainer_id']);
            while ($member = mysqli_fetch_assoc($membersWP)) {
              $member_id=$member['member_id'];
              $member_firstname=$member['member_firstname'];
              $member_lastname=$member['member_lastname'];
              if($member_last!=$member_id){
                echo "<option value='$member_id'>$member_firstname  $member_lastname</option>";
                $member_last=$member_id;
              }else {
                continue;
              }
            }  
            ?>
          </select>
        </fieldset>
        <input type="submit" name="search1" id="search" value="SEARCH">
      </form>
      <form method="POST" id="second">
        <fieldset>
          <label for="membership">Members without a Workout Plan</label> <br>
          <select id="nmembership" name="membership">
           <option value="">Choose a Member </option>
           <?php
           $membersNoP=getMembersNoP();
           while ($member = mysqli_fetch_assoc($membersNoP)) {
             $member_id=$member['member_id'];
             $member_firstname=$member['member_firstname'];
             $member_lastname=$member['member_lastname'];
             echo "<option value='$member_id'>$member_firstname  $member_lastname</option>";
           }  
          ?>
          </select>
        </fieldset>
        <input type="submit" name="search2" id="search" value="SEARCH">
      </form>
      <form method="POST" id="third">
        <fieldset>
          <label for="searchdate">Search By Date: </label><br>
          <input type="date" id="searchdate" name="searchdate">
        </fieldset>
        <input type="submit" name="search3" id="search" value="SEARCH">  
      </form>
      </div>
    </section>
    </div>
  </main>
  
<?php include "inc/footer.php"; ?>