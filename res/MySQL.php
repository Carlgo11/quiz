<?php
class MySQL {

  /*
   * Get number of questions/rows in the questions table.
   * @return int
   */
  public static function getNumberOfQuestions() {
    global $conf;
    global $con;
    $rows = NULL;
    $query = $con->prepare("SELECT COUNT(`id`) FROM `" . $conf['mysql-questions-table'] . "`");
    $query->execute();
    $query->bind_result($rows);
    $query->fetch();
    $query->close();
    return $rows;
  }

  /*
   * Get the correct answers from the questions table.
   * @return array
   */
  public static function getQuestions() {
    global $conf;
    global $con;
    $query = $con->prepare("SELECT `answer` FROM `" . $conf['mysql-questions-table'] . "`");
    $query->execute();
    $result = $query->get_result();
    $answers = [NULL]; //Set key 0 to empty value
    unset($answers[0]); //Remove key 0
    while ($row = mysqli_fetch_array($result)) {
      $answers[] = $row['answer'];
    }
    $query->close();
    return $answers;
  }

 /*
  * Check if the user already exists.
  * @return boolean
  */
  public static function getUserExists($name){
    global $conf;
    global $con;
    $query = $con->prepare("SELECT `username` FROM `answers` WHERE `username` = ?");
    $bp = $query->bind_param("s", $name);
    if (false === $bp) {
      error_log('bind_param() failed: ' . htmlspecialchars($query->error));
      return false;
    }
    $bp = $query->execute();
    if (false === $bp) {
      error_log('execute() failed: ' . htmlspecialchars($query->error));
      return false;
    }

    $result = $query->get_result();

    while ($row = mysqli_fetch_array($result)) {
      if($row['username'] == $name){
        return true;
      }
    }
    $query->close();
    return false;
  }

  /*
   * Post the user's answers.
   * @param string $answers The user's answers
   * @return boolean
   */
  public static function postAnswers($name, $answers_array) {
    global $conf;
    global $con;
    $answers = implode(",",$answers_array);
    $correct = Validate::validateAnswers($answers_array);
    if(MySQL::getUserExists($name)){
       $query = $con->prepare("UPDATE `answers` SET `answers`=?, `correct`=? WHERE `username` = ?");
       if (false === $query) {
         error_log('prepare() failed: ' . htmlspecialchars($con->error));
         return false;
       }
       $bp = $query->bind_param("sss", $answers, $correct, $name);
    }else{
      $query = $con->prepare("INSERT INTO `" . $conf['mysql-answers-table'] . "` (`username`, `answers`, `correct`) VALUES (?, ?, ?)");
      if (false === $query) {
        error_log('prepare() failed: ' . htmlspecialchars($con->error));
        return false;
      }
      $bp = $query->bind_param("ssi", $name, $answers, $correct);
    }

    if (false === $bp) {
      error_log('bind_param() failed: ' . htmlspecialchars($query->error));
      return false;
    }

    $bp = $query->execute();
    if (false === $bp) {
      error_log('execute() failed: ' . htmlspecialchars($query->error));
      return false;
    }

    $query->close();
    return true;
  }

}
