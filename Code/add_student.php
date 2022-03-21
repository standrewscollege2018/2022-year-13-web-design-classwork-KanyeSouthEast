

<?php

// Check to see if user is logged in

if(!isset($_SESSION['admin'])) {
  // Not logged in, redirect back to index page
  header("Location: index.php");
}

 ?>
<div class="container-fluid">
  <div class="row">
    <div class="col p-3">
      <p class="display-2">Enter new student</p>
      <!-- When form is submitted, post information to the enterstudent page -->
      <form class="" action="index.php?page=enterstudent" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <!-- Get the tutor's name -->
          <label for="firstname" class="form-label">First name</label>
          <input type="text" name="firstname" class="form-control" id="firstname" aria-describedby="firstname">
        </div>
        <div class="mb-3">
          <!-- Get the 3-letter tutor code -->
          <label for="lastname" class="form-label">Last name</label>
          <input type="text" name="lastname" class="form-control" id="lastname" aria-describedby="lastname">
        </div>
        <div class="mb-3">
          <!-- Select tutor group -->
          <?php
            // YOUR TASK: Get all tutor groups available for selection
            $tutor_sql = "SELECT tutorgroupID, tutorcode FROM tutorgroup";
            $tutor_qry = mysqli_query($dbconnect, $tutor_sql);
            $tutor_aa = mysqli_fetch_assoc($tutor_qry);
           ?>
           <!-- Display tutorgroups in a select menu -->
           <label for="tutorcode" class="form-label">Select tutor group</label>
           <select name="tutorgroupID" class="form-select" aria-label="tutorgroup">
             <!-- YOUR TASK: display each tutor group code in an option target,
           with value of tutorgroupID -->
            <?php
            do {
              $tutorcode = $tutor_aa['tutorcode'];
              $tutorgroupID = $tutor_aa['tutorgroupID'];
              ?>
              <option value="$tutorgroupID"> <?php echo $tutorcode  ?>  </option>

              <?php
            } while ($tutor_aa = mysqli_fetch_assoc($tutor_qry));



             ?>

           </select>
        </div>
        <div class="mb-3">
          <!-- Select an image for the student -->
          <!-- YOUR TASK: go to W3 Schools and look up how to upload an image. -->


        Select image to upload:
          <input type="file" name="fileToUpload" id="fileToUpload">



        </div>
        <div class="mb-3">
          <?php
          // Check if there is an error being returned
            if(isset($_GET['error'])) {
              if ($_GET['error']=='type') {
                ?>
                <div class="ale rt alert-danger" role="alert">
                  Incorrect file type
                </div>
                <?php
              } else if ($_GET['error']=='size') {
                ?>
                <div class="ale rt alert-danger" role="alert">
                  File too large
                </div>
                <?php
              }
            // add more error types here
                          }
           ?>
        </div>
        <button type="submit" name="button" class="btn btn-primary">Add student</button>
      </form>

      <!-- Show alert if either the tutor name or code were not entered -->

    </div>
  </div>
</div>
