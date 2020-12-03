<?php

    class crud{

        private $db;

        function __construct($conn){
            $this->db = $conn;
        }

        public function insert($firstname, $lastname, $dob, $email, $phone, $speaciality){
            try{

                $sql ="INSERT INTO attendee (firstname,lastname,dateofbirth,emailaddress,contactnumber,speaciality_id) VALUES
                 (:firstname,:lastname,:dob,:email,:phone,:speaciality)";
                $stmt =$this->db->prepare($sql);

                $stmt->bindparam(':firstname',$firstname);
                $stmt->bindparam(':lastname',$lastname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':phone',$phone);
                $stmt->bindparam(':speaciality',$speaciality);
                

                $stmt->execute();
                return true;
                
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }

        }

        public function editAttendee($id,$firstname, $lastname, $dob, $email, $phone, $speaciality){
            try{  $sql ="UPDATE `attendee` SET `firstname`=:firstname,`lastname`=:lastname,`dateofbirth`=:dob,
                `emailaddress`=:email,`contactnumber`=:phone,`speaciality_id`=:speaciality WHERE attendee_id=:id"; 
    
                $stmt = $this->db->prepare($sql);
    
                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':firstname',$firstname);
                $stmt->bindparam(':lastname',$lastname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':phone',$phone);
                $stmt->bindparam(':speaciality',$speaciality);
    
                $stmt->execute();

                return true;

            }catch(PDOException $e){
                echo $e->getMessage();
                return false; 

            }

           


        }

        public function getAttendees(){

            $sql = "SELECT * FROM `attendee`a inner join speacialities s on a.speaciality_id = s.speaciality_id";
            $result=$this->db->query($sql);
            return $result;
        }

        public function getSpecialities(){

            $sql = "SELECT * FROM `speacialities`";
            $result=$this->db->query($sql);
            return $result;


        }

        public function getAttendeeDetails($id){

            $sql="select * from attendee where attendee_id =:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            $result =$stmt->fetch();

            return $result;
        }


        public function deleteAttendee($id){

            try {
                $sql="delete from attendee where attendee_id=:id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                return true;

            }catch(PDOException $e){
                echo $e->getMessage();
                return false; 
            }


        }

    }


?>