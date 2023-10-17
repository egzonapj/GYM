<?php include "inc/t-header.php"; ?>
  <main class="container">
    <div class="container-overlay">
    <section class="section">
      <h3 class="section-title">Add Plan</h3>
      <div class="section-content">
      <?php
        if(isset($_GET['mid'])){
          $member_id=$_GET['mid'];
          $member= getMemberId($member_id);
        }
        echo "<h5>" . $member['member_firstname'] . ' ' . $member['member_lastname'] . "</h5>";
        if(isset($_POST['add'])){
          addWorkoutPlan($member_id, $_POST['workoutdate'],$_POST['starttime'],$_POST['endtime'],$_SESSION['member']['trainer_id'], $_POST['workouts']);
        }
      ?>
      <form method="POST" id="plan">
        <fieldset>
          <label for="workoutdate">Workout Date:</label>
          <input type="date" id="workoutdate" name="workoutdate">
        </fieldset>
        <fieldset>
          <label for="starttime">Start Time:</label>
          <input type="time" id="starttime" name="starttime">
        </fieldset>
        <fieldset>
          <label for="endtime">End Time:</label>
          <input type="time" id="endtime" name="endtime">
        </fieldset>
        <fieldset>
          <label for="workouts">Workout Name:</label>
          <select id="workouts" name="workouts">
           <option value="">Choose a Workout </option>
           <?php
           $workouts=getWorkouts();
           while ($workout = mysqli_fetch_assoc($workouts)) {
             $workout_id=$workout['workout_id'];
             $workout_name=$workout['workout_name'];
             echo "<option value='$workout_id'>$workout_name</option>";
           }  
          ?>
          </select>
        </fieldset>
        <input type="submit" name="add" id="add" value="Add">
      </form>
      </div>
    </section>
    </div>
  </main>
  
<?php include "inc/footer.php"; ?>