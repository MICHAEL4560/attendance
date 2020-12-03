
<?php
      $title = 'View Record';
      require_once 'includes/header.php';
      require_once 'db/conn.php';

      if(isset($_GET['id'])){
          $id = $_GET['id'];
          $result = $crud->getAttendeeDetails($id);
      }else{
        include 'includes/errormessage.php';;
      }

      
    
 ?>
 <div class="card" style="width: 18rem;">
                <div class="card-body">

                <h5 class="card-title"><?php echo $result ['firstname'].' '. $result['lastname'];?></h5>

                <h6 class="card-subtitle mb-2 text-muted"><?php echo $result ['speaciality_id'];?></h6>

                <p class="card-text">
                        Date of birth:<?php echo $result ['dateofbirth'];?>
                </p>
                <p class="card-text">
                        Email Address:<?php echo $result ['emailaddress'];?>
                </p>
                <p class="card-text">
                        Cotact Number:<?php echo $result ['contactnumber'];?>
                </p>
               
                </div>








<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>
 