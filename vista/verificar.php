<?php 
    include "../controlador/conexion.php";
    $correo =$_POST['correo'];
    $token =$_POST['token'];
    $codigo =$_POST['codigo'];


    $Db =Db ::Conectar();//cadena de conexion
$sql = $Db->query("SELECT * from passwords where 
Correo='$correo' and token='$token' and codigo=$codigo");//defirnir busqueda    ueda consulta
$sql->execute();//ejecutar consulta
Db ::CerrarConexion($Db);    
$prueba= $sql->rowCount();//retorna un registr
    $nr = $prueba; 
    $correcto=false;
   if ($nr > 0){
        $fila = $sql->rowCount();
        $fecha =$fila[4];
        $fecha_actual=date("Y-m-d h:m:s");
        $seconds = strtotime($fecha_actual) - strtotime($fecha);
        $minutos=$seconds / 60;
       /* if($minutos > 10 ){
            echo "token vencido";
        }else{
            echo "todo correcto";
        }*/     
        $correcto=true;
    }else{
       
        $correcto=false;
        
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
    <form id="restablecer" action="cambiarcontr.php" method="POST">

        <div class="container-login">
            <div id="layoutAuthentication_content">
            <!--<//?php if($correcto){ ?>-->
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="wrap-login">
                                        <span class="login-form-title">Ingresa tu nueva Contraseña</span>
                                        <div class="card-body">
                                            <div class="wrap-input100">
                                                <label class="wrap-input100" for="inputEmailAddress"></label>
                                                <input class="input100" name="p1" id="inputEmailAddress" type="password" placeholder="Ingrese su Contraseña"/>
                                                
                                                <span class="focus-efecto"></span>
                                            </div>
                                            <div class="wrap-input100">
                                                <label class="wrap-input100" for="inputEmailAddress"></label>
                                                <input class="input100" name="p2" id="inputEmailAddress" type="password" placeholder="Repita su Contraseña"/>
                                                <input type="hidden" class="form-control" id="c" name="correo" value="<?php echo $correo?>">
                                                <span class="focus-efecto"></span>
                                            </div>
                                            
                                            <div class="container-login-form-btn">
                                                <div class="wrap-login-form-btn">
                                                    <div class="login-form-bgbtn"></div>
                                                    <button type="submit" name="restablecer" class="login-form-btn">Cambiar</button>
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
    <!--<//?php }else{ ?>
                <div class="alert alert-danger" >Código incorrecto o vencido</div>
            <//?php } ?>-->
</body>

</html>
   
   