<?php
include("../model/class.php");
$student=new Scolarite();
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['loginS'])){
    $matricule=$_POST['matricule'];
    $password=$_POST['password'];
        if($student->loginS($matricule,$password)){
            $std=$student->loginS($matricule,$password);
            $matricule=$std['matricule'];
            header('location:../view/student/student.php?matricule='.$matricule);
            exit;
        }else{
            header('location:../view/student/loginStudent.php');
            exit;
        }
    }

      
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Envoyer']) ) {
        $matricule =$_POST['matricule'];
        $type_doc=$_POST['type_doc'];
        $other_doc = $_POST['other_doc'] ?? '';
        $student->addDemande($matricule,$type_doc,$other_doc);

}     
