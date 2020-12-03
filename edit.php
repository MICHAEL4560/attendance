
<?php
      $title = 'Edit';
      require_once 'includes/header.php';
      require_once 'db/conn.php';

      $results =$crud->getSpecialities();

      if(!isset($_GET['id']))
      {
            include 'includes/errormessage.php';
            header("Location: viewrecords.php");
      }

      else{
        $id =$_GET['id'] ; 
        $attendee=$crud->getAttendeeDetails($id);

      
     

 ?>

    <h1 class="text-center">Edit Record</h1>
      

    <form method ="post" action ="editpost.php">

    <input type="hidden" name="id" value="<?php echo $attendee['attendee_id']?>" />

    <div class="form-group">
          <label for="firstname">First Name</label>
          <input type="text" class="form-control"value = "<?php echo $attendee['firstname']?>"id="firstname" name="firstname">
          <small id="emailHelp" >
    </div>


    <div class="form-group">
          <label for="lastname">Last Name</label>
          <input type="text" class="form-control"value = "<?php echo $attendee['lastname']?>" id="lastname"  name="lastname">
          <small id="emailHelp" >
     </div>


     <div class="form-group">
          <label for="dateofbirth">Date Of Birth</label>
          <input type="date" class="form-control"value = "<?php echo $attendee['dateofbirth']?>" id="dob" name="dob">
          <small id="emailHelp" >
     </div>


      <div class="form-group">
          <label for="speaciality">Select Speciality</label>
          <select class="form-control"value = "<?php echo $attendee['speaciality']?>" id="speaciality" name="speaciality">
            <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) {?>

            <option value= "<?php echo $r['speaciality_id']?>"<?php if($r['speaciality_id']==
                   $attendee['speaciality_id'])echo 'selected' ?>>
                   <?php echo $r['name'];?>
            </option>


            <?php }?>
          </select>
     </div>
        
    <div class="form-group">
          <label for="email">Email address</label>
          <input type="text" class="form-control"value = "<?php echo $attendee['emailaddress']?>" id="email" name="email"
           aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-muted">We'll never
           share your email with anyone else.</small>
     </div>


        <div class="form-group">
          <label for="phone">Contact Number</label>
          <input type="text" class="form-control"value = "<?php echo $attendee['contactnumber']?>" id="phone" name="phone" aria-describedby="phoneHelp">
          <small id="phoneHelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
        </div>
        
        <a href="viewrecords.php" class "btn btn-default">Back To List</a>
        <button type="submit" name = "submit" class="btn btn-success">Submit Changes</button>
</form>

<?php }?>
<br>
<br>
<br>


<?php require_once 'includes/footer.php'; ?>
   