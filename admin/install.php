<?php
 include './header.php';
 include '../lang.php';
?>

 <body>
        <div class="container" style="margin-top: 80px">
            <div class="text-center"><h1>Welcome to Quiz!</h1><h3> This setup will only take a minute and then you're good to go!</h3></div>
            <form class="form-inline" role="form" action="" method="POST">
                <h4>Database setup:</h4>
                <div class='form-group' style="margin-bottom: 20px">
                    <div class='input-group'>
                        <div class="input-group-addon">Mysql url</div>
                        <input type='text' class="form-control" id="mysql-url" placeholder="">
                    </div>
                </div>
                <br>
                <div class='form-group' style="margin-bottom: 20px">
                    <div class='input-group'>
                        <div class="input-group-addon">Mysql username</div>
                        <input type='text' class="form-control" id="mysql-url" placeholder="">
                    </div>
                </div>
                <br>
                <div class='form-group' style="margin-bottom: 20px">
                    <div class='input-group'>
                        <div class="input-group-addon">Mysql password</div>
                        <input type='password' class="form-control" id="mysql-url" placeholder="">
                    </div>
                </div>
                <br>
                <div class='form-group' style="margin-bottom: 20px">
                    <div class='input-group'>
                        <div class="input-group-addon">Mysql database</div>
                        <input type='text' class="form-control" id="mysql-url" placeholder="">
                    </div>
                </div>
                <br>
                <hr>
                <h4>Language selection:</h4>
                <div class='radio'>
                    <label>
                        <input type="radio" name='lang-en' id='lang-en' value='English' checked="">English
                        
                        
                    </label>
                </div>
                <br>
                <div class='radio'>
                    <label>
                        <input type="radio" name='lang-se' id='lang-se' value='Swedish'> Swedish
                       
                        
                    </label>
                </div>
                <br>
                <div class='alert alert-warning' style="width: 40%">
                    <h5><strong>Missing a language?</strong></h5>
                    <p>Contribute by adding new language packs via our <a href="https://github.com/carlgo11/quiz">GitHub</a>.</p>
                </div>
                <hr>
                <h4>Quiz settings:</h4>
                <div class='form-group' style="margin-bottom: 20px">
                    <div class='input-group'>
                        <div class="input-group-addon">Questions</div>
                        <input type='number' class="form-control" id="questions" placeholder="" min="1" step="1">
                    </div>
                </div>
                <br>
                <hr>
                <h4>Done?</h4>
                <div class="btn btn-success">Install</div>
            </form>

