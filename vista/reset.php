<?php 
if( isset($_GET['correo'])  && isset($_GET['token']) ){
    $correo=$_GET['correo'];
    $token=$_GET['token'];
}else{
   
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MotorCycle</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body class="bg-primary">
    <form id="restablecer" action="verificar.php" method="POST">

        <div class="container-login">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="wrap-login">
                                        <span class="login-form-title">restablecer contra</span>
                                        <div class="card-body">
                                            <div class="wrap-input100">
                                                <label class="wrap-input100" for="inputEmailAddress"></label>
                                                <input class="input100" name="codigo" id="inputEmailAddress" type="number" placeholder="Ingrese su Codigo" required minlength="8" maxlength="30" />
                                                <input type="hidden" class="form-control" id="c" name="correo" value="<?php echo $correo;?>">
                                                <input type="hidden" class="form-control" id="c" name="token" value="<?php echo $token;?>">
                                                <span class="focus-efecto"></span>
                                            </div>
                                            
                                            <div class="container-login-form-btn">
                                                <div class="wrap-login-form-btn">
                                                    <div class="login-form-bgbtn"></div>
                                                    <button type="submit" name="restablecer" class="login-form-btn">Enviar</button>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </main>
        </div>
        </div>
    </form>
</body>

</html>