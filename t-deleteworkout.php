<?php include "inc/t-header.php"; ?>
  <main class="container">
    <div class="container-overlay">
      <section class="section">
        <h3 class="section-title">Form for workout modification</h3>
        <div class="section-content">
          <?php
            if (isset($_GET['wid'])) {
              $workout=getWorkoutId($_GET['wid']);
              $workout_id=$workout['workout_id'];
              $workout_name=$workout['workout_name'];
              $workout_description=$workout['workout_description'];
            }
            if (isset($_POST['delete'])) {
              deleteWorkout($_POST['workoutid']);
            }
          ?>
          <form id="workout" method="POST">
              <input type="hidden" id="workoutid" name="workoutid" value="<?php if(!empty($workout_id)) echo $workout_id; ?>">
              <fieldset>
                <label>Workout Name: </label>
                <input disabled type="text" id="workoutname" name="workoutname"       value="<?php if(!empty($workout_name)) echo $workout_name; ?>">
              </fieldset>
              <fieldset>
                  <label>Workout Description: </label>
                  <input disabled type="text" id="workoutdescription" name="workoutdescription" value="<?php if(!empty($workout_description)) echo $workout_description; ?>">
              </fieldset>
              <input type="submit" name="delete" id="delete" value="Delete">
          </form>
        </div>
      </section>
    </div>
    </main>
    
<?php include "inc/footer.php"; ?>