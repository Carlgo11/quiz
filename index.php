<?php
include_once 'res/init.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="author" content="Carlgo11">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <link rel="icon" type="image/png" sizes="128x128" href="img/icon_128px.png">
    <link rel="icon" type="image/png" sizes="64x64" href="img/icon_64px.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/icon_32px.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/icon_16px.png">
  </head>

  <body>
    <div class="container" style="margin-top: 10%;margin-bottom: 5%">
      <div class="checkmark hidden" id="alert"><span class="glyphicon glyphicon-ok"></span></div>
      <form action="" enctype="multipart/form-data" method="POST" accept-charset="UTF-8" id="form">
        <div id="name" style="margin-bottom: 20px">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h2>Group name</h2>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-8" >
                  <input type="text" name="group-name" id="group-name" class="form-control" required autofocus placeholder="Group name">
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php
        for ($i = 1; $i <= MySQL::getNumberOfQuestions(); $i++) {
          ?>
          <div id="q<?php echo($i); ?>">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2>Question <?php echo($i); ?></h2>
              </div>
              <div class="panel-body">
                <div class="btn-group btn-group-justified" role="group" id="answer-group" style="margin-top: 5px;margin-bottom: 5px">
                  <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default answer-btn" id="<?php echo($i); ?>1" onclick="activate(<?php echo($i); ?>, '1')">1</button>
                  </div>
                  <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default answer-btn" id="<?php echo($i); ?>X" onclick="activate(<?php echo($i); ?>, 'X')">X</button>
                  </div>
                  <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default answer-btn" id="<?php echo($i); ?>2" onclick="activate(<?php echo($i); ?>, '2')">2</button>
                  </div>
                </div>
              </div>
              <input class="hidden" id="<?php echo($i); ?>answer" name="<?php echo($i); ?>answer">
            </div>
          </div>
        <?php } ?>

        <button class="btn btn-default btn-lg" id="submit" style="margin-top: 30px">Skicka <span class="glyphicon glyphicon-send" aria-hidden="true"></span></button>
      </form>
    </div>
  </body>
</html>
