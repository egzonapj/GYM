<?php include "inc/t-header.php"; ?>
  <main class="container">
    <div class="container-overlay">
      <section class="section">
        <h3 class="section-title">Form for adding workout</h3>
        <div class="section-content">
          <?php
          if (isset($_POST['save'])) {
            addWorkout($_POST['workoutname'], $_POST['workoutdescription']);
          }
          ?>
          <form id="workout" method="POST">
            <fieldset>
              <label>Workout Name: </label>
              <input type="text" id="workoutname" name="workoutname">
            </fieldset>
            <fieldset>
              <label>Workout Description: </label>
              <input type="text" id="workoutdescription"  name="workoutdescription">
            </fieldset>
            <input type="submit" name="save" id="save" value="SAVE">
          </form>
        </div>
      </section>
    </div>
  </main>
  
<?php include "inc/footer.php"; ?>