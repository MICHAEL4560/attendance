<?php
    require_once 'db/conn.php';
 

    if(!$_GET['id']){

        include 'includes/errormessage.php';;
    }else{
        //get ID values
        $id=$_GET['id'];

        //Call delete function
        $result = $crud ->deleteAttendee($id);
        //redirect to list

        if($result)
        {
            header("Location:viewrecords.php");
        }

        else{
            echo'';
        }


        



    }




 ?>