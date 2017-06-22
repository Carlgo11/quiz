<?php

include_once 'res/init.php';
if ($_POST['1answer']) {
  $user_answers = [""];
  for ($i = 1; $i <= Mysql::getNumberOfQuestions(); $i++) {
    $user_answers[] = $_POST[$i . 'answer'];
  }
  unset($user_answers[0]);
  
  if(Mysql::postAnswers($_POST['group-name'], $user_answers)){
    print("true");
  }else{
    print("false");
  }
} else {
  print_r($_POST);
}
?>