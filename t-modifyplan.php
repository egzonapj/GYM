<?php include "inc/t-header.php"; ?>
  <main class="container">
    <div class="container-overlay">
    <section class="section">
      <h3 class="section-title">Workout Plan</h3>
      <div class="section-content">
      <?php
        if(isset($_GET['mid']) and isset($_GET['date'])){
          $member_id=$_GET['mid'];
          $member=getMemberId($member_id);
          $workout_date=$_GET['date'];
          $workout=getWorkoutIdDate($member_id,$workout_date);
          $start_time=$workout['start_time'];
          $end_time=$workout['end_time'];
          $workout_name=$workout['workout_name'];
          $workout_id=$workout['workout_id'];

        }
        echo "<h5>" . $member['member_firstname'] . ' ' . $member['member_lastname'] . "</h5>";
        if(isset($_POST['save'])){
          modifyWorkoutPlan($member_id, $_POST['workoutdate'],$_POST['starttime'],$_POST['endtime'], $_POST['workouts']);
        }
      ?>
      <form method="POST">
        <fieldset>
          <label for="workoutdate">Workout Date</label>
          <input type="date" id="workoutdate" name="workoutdate" value="<?php if(!empty($workout_date)) echo $workout_date; ?>">
        </fieldset>
        <fieldset>
          <label for="starttime">Start Time</label>
          <input type="time" id="starttime" name="starttime" value="<?php if(!empty($start_time)) echo $start_time; ?>">
        </fieldset>
        <fieldset>
          <label for="endtime">End Time</label>
          <input type="time" id="endtime" name="endtime" value="<?php if(!empty($end_time)) echo $end_time;?>">
        </fieldset>
        <fieldset>
          <label for="workouts">Workout Name</label> <br>
          <select id="workouts" name="workouts">
           <?php
           $workouts=getWorkouts();
           if (isset($member_id)) {
            echo "<option value='$workout_id'>$workout_name</option>";
          } else {
            echo "<option value=''>Choose a workout</option>";
          }
           while ($workout = mysqli_fetch_assoc($workouts)) {
             $workoutId=$workout['workout_id'];
             $workoutName=$workout['workout_name'];
             if (isset($member_id)) {
              if ($workoutId!= $workout_id) {
                echo "<option value='$workoutId'>$workoutName</option>";
              }
             } else {
              echo "<option value='$workoutId'>$workoutName</option>";
             }
           }  
          ?>
          </select>
        </fieldset>
        <input type="submit" name="save" id="save" value="save">
      </form>
      </div>
    </section>
    </div>
  </main>
  
<?php include "inc/footer.php"; ?>