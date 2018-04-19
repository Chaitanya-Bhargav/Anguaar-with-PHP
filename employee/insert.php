<?php
/**
 * Created by PhpStorm.
 * User: Chaitanya.Padamati
 * Date: 4/8/2018
 * Time: 9:22 PM
 */
include_once 'config.php';
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
print_r($request);exit();
$ename= $request->ename;
$email= $request->email;
$mobile= $request->phone;
$gender=$request->gender;
$experience=$request->experience;
$company= $request->company;
$source=$request->source;
$position=$request->position;
$round=$request->round;
$date=$request->date;
$time=$request->time;
$comments= $request->comments;

 try{
        $query= "insert into emptable (EmpName,email,mobile,gender,experience,prev_company,about_jd,position_applied,
        round,interview_date,interview_time,comments) VALUES ('$ename','$email','$mobile','$gender',
        '$experience','$company','$source','$position','$round','$date','$time','$comments')";

        $conn->query($query);
    }
 catch(PDOException $e)
    {
        echo $e->getMessage();
    }

    $conn = null;
?>