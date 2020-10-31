<?php
session_start();
$question_no=$_POST['question_no'];
$radiovalue=$_POST['radiovalue'];
$_SESSION["answer"][$question_no]=$radiovalue;
?>