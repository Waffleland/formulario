<?php
    $error="";
    $mensajeExito="";

    if($_POST){
        //comprobaciones de campos
        if(!$_POST["email"]){
            $error .="Es obligatorio una dirección de email.<br>";
        }
        if(!$_POST["contenido"]){
            $error .="Es obligatorio escribir un mensaje.<br>";
        }
        if(!$_POST["asunto"]){
            $error .="Es obligatorio escribir un asunto.<br>";
        }
        if(!$_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false){
            $error .="Correo electrónico no válido.<br>";
        }
        if($error != ""){
            $error="<div class=\"alert alert-danger\" role=\"alert\"><strong>Hubo algún error en el formulario".$error."</strong></div>";
        }
        else{
            $emailA="waffleland.ok@gmail.com";
            $asunto= $_POST['asunto'];
            $contenido= $_POST['contenido'];
            $cabeceras= "From: ".$_POST['email'];
            if(mail($emailA,$asunto,$contenido,$cabeceras)){
                $mensajeExito="<div class=\"alert alert-success\" role=\"alert\">Mensaje enviado con éxito, nos pondremos en contacto pronto.</div>";
            }
            else{
                $error="<div class=\"alert alert-danger\" role=\"alert\"><strong>El mensaje no pudo ser enviado, por favor, intentelo más tarde</strong></div>";
            }
        }
    }

?>


<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <meta charset="utf-8">
        <script src="jquery-.min.js"></script>
        <style type="text/css">

        </style>
    </head>
    <body>
        <form method="POST">
            <div class="container">
                <h1>Contacta con nosotros</h1>
                <div id="error"><? echo $error.$mensajeExito; ?></div>
                <div class="form-group">
                <label for="email">Dirección de Email</label>
                <input type="email" class="form-control" id="email" placeholder="Introduce tu email" name="email">
                <small class="text-muted">Nunca compartiremos tu email con nadie.</small>
                </div>
                <div class="form-group">
                <label for="asunto">Asunto</label>
                <textarea type="text" class="form-control" id="asunto"  placeholder="Asunto" name="asunto"></textarea>
                </div>
                <div class="form-group">
                    <label for="Contenido">¿Qué te gustaría preguntarnos?</label>
                    <textarea type="text" class="form-control" id="contenido"  name="contenido"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" id="submit">Enviar</button>
          </div>
        </form>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script type="text/javascript">
        $("form").submit(function (e){
            var error="";
            if($("#email").val() == ""){
                    error += "Campo email obligatorio.<br>";
                }
            if($("#asunto").val() == ""){
                error += "Campo asunto obligatorio.<br>";
                }
            if($("#contenido").val() == ""){
                error += "Campo contenido obligatorio.<br>";
                }
            if (error!=""){
                $("#error").html("<div class=\"alert alert-danger\" role=\"alert\"><strong>"+error+"</strong></div>");
                return false;
                }
                else{
                    return true;
                }
        })
        </script>
    </body>
</html>