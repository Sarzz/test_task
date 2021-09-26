<?php require 'partials/head.php' ?>
<div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="/login" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Имя:</label><br>
                                <input type="text" name="username" id="username" class="form-control" required oninvalid="this.setCustomValidity('Имя пользователя не может быть пустым');" onchange="try{setCustomValidity('')}catch(e){};" >
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Пароль:</label><br>
                                <input type="password" name="password" id="password" class="form-control" required oninvalid="this.setCustomValidity('Пароль не может быть пустым');" onchange="try{setCustomValidity('')}catch(e){};">
                                <?php if(isset($error)){ ?> <spsn for="passwordError" class="text-danger"><?php echo $error; ?></span> <?php } ?>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
