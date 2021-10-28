<?php 
        include '../includes/linksnew.php';
?>
<?php

        
        if(isset($_POST['btn-iniciar'])){
                
                include("conexion-bd.php");
                $email= $_POST['email'];
                $pass= $_POST['password'];
                $consulta="SELECT * FROM inicio WHERE email='$email' AND pass='$pass' AND status=1";
                $resultado=mysqli_query($conexion,$consulta);
                $filas=mysqli_num_rows($resultado);

                if($filas==1){
                        session_start();
                        $nombre="SELECT * FROM inicio WHERE email='$email'";
                        $ejecutar_nombre=mysqli_query($conexion, $nombre);
                        $mostrar_nombre=mysqli_fetch_array($ejecutar_nombre);
                        $_SESSION['usuario']=$mostrar_nombre['name'];
                        mysqli_free_result($resultado); 
                        mysqli_close($conexion);
                        header("location:../vistasnew/index.php");
                }  else{
                        
                        mysqli_free_result($resultado); 
                        mysqli_close($conexion);
                        
        ?>
                               <div class="overlay_error">
                                        <div class="error_ini">
                                                <h3>Correo o contraseña erroneos. <br> 
                                                o posiblemente esté deshabilitado.
                                                <br><br><a class="enla_ok" href="../index.php">OK</a></h3>
                                        </div>
                                </div>
                        <?php
                        
                }   
        }
?>