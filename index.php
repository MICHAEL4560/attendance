
<?php
      $title = 'Index';
      require_once 'includes/header.php';
      require_once 'db/conn.php';

      $results =$crud->getSpecialities();
 ?>

    <h1 class="text-center">Registration for IT Confrence</h1>
      

    <form method ="post" action ="success.php">

    <div class="form-group">
          <label for="firstname">First Name</label>
          <input type="text" class="form-control" id="firstname" name="firstname">
          <small id="emailHelp" >
    </div>


    <div class="form-group">
          <label for="lastname">Last Name</label>
          <input type="text" class="form-control" id="lastname"  name="lastname">
          <small id="emailHelp" >
     </div>


     <div class="form-group">
          <label for="firstname">Date Of Birth</label>
          <input type="date" class="form-control" id="dob" name="dob">
          <small id="emailHelp" >
     </div>


      <div class="form-group">
          <label for="speaciality">Select Speciality</label>
          <select class="form-control" id="speaciality" name="speaciality">
            <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) {?>

            <option value= "<?php echo $r['speaciality_id']?>"><?php echo $r['name']; ?></option>


            <?php }?>
          </select>
     </div>
        
    <div class="form-group">
          <label for="email">Email address</label>
          <input type="text" class="form-control" id="email" name="email"
           aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-muted">We'll never
           share your email with anyone else.</small>
     </div>


        <div class="form-group">
          <label for="phone">Contact Number</label>
          <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp">
          <small id="phoneHelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
        </div>
        
        <button type="submit" name = "submit" class="btn btn-primary">Submit</button>
</form>


<br>
<br>
<br>


<?php require_once 'includes/footer.php'; ?>
   