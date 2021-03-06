<?php

/**
 * Submit the answers to the database and validate the answers.
 */

include_once 'res/init.php';
if (filter_has_var(INPUT_POST, '1answer')) {
    $user_answers = [""];
    for ($i = 1; $i <= MySQL::getNumberOfQuestions(); $i++) {
        $user_answers[] = filter_input(INPUT_POST, $i . 'answer');
    }
    unset($user_answers[0]);
    //error_log($_POST['group-name']);
    (MySQL::postAnswers(filter_input(INPUT_POST, 'group-name'), $user_answers));
} else {
    die("Whoops! It doesn't look like you sent the answers.");
}
