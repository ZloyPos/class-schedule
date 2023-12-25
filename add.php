<?php
if(!empty($_POST["teacher"]) && !empty ($_POST["subject"]) && !empty ($_POST["group"]) && !empty ($_POST["date"]) && !empty ($_POST["time"])){
    include("connect.php");
    $teacher=$_POST["teacher"];
    $subject=$_POST["subject"];
    $group=$_POST["group"];
    $date=$_POST["date"];
    $time=$_POST["time"];
    $dateTime = $date . ' ' . $time;
    $sql="INSERT INTO schedule(id_teacher,id_subject,id_group,time) VALUES('$teacher','$subject','$group','$dateTime')";
    mysqli_query($conn,$sql); 
}
header("location: index.php");
?>