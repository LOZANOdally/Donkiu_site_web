
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


<div id="contact" class="container4">

<div class="div-title">
        <h2 >Contáctanos </h2>
        <h3>para todo tipo de proyecto o cotización</h3>
</div>

<div class="form-div">

    <form id="formulaire" method="post" >
    <div class="form-item">
            <input type="text" name="first_name" id="nombre" placeholder="Nombre">


        </div>
        <div class="form-item">
            <input type="text" name="last_name" id="apellido" placeholder="Apellido">
        </div>
   
        <div class="form-item">
    
            <input type="text" name="email" id="email" placeholder="Email">
             
        </div>
        

        <div class="form-item">
            <input type="text" name="phone" id="phone" placeholder="Celular">
        </div>

        <div class="form-item">
            <textarea name="msg" id="msg" cols="30" rows="10" placeholder="Mensaje"></textarea>
        </div>

        <div class="form-item">
            <button class="send" type="submit"> Enviar</button>
        </div>
       <div>  </div>
    </form>
</div>
</div>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



if(isset($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['phone'] , $_POST['msg'])){


    $firstName = trim($_POST['first_name']);
    $lastName = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $msg = trim($_POST['msg']);



    $erreur = false;



   
   

    if(empty($firstName) || empty($lastName) || empty($email) || empty($phone) || empty($msg)){

        $erreur = true;
    }
    if( iconv_strlen($firstName) < 2 || iconv_strlen($firstName) > 20 && iconv_strlen($lastName) < 2 || iconv_strlen($lastName) > 20){

        echo '<div style = "background-color: gray; color: white; padding: 20px;">El nombre o el apellido no son validos </div><br>';

    }

    $verifCaractere = preg_match('#^[a-zA-Z._-]+$#', $firstName);
    
  
    if($verifCaractere == false ) {
        
        $erreur = true;
        echo'<div style="background-color: gray; color: white; padding: 20px;">Su nombre o apellido débe contiener solo letras!</div><br>';
    }
    $verifCaractere = preg_match('#^[a-zA-Z._-]+$#', $lastName);
    if($verifCaractere == false) {
        
        $erreur = true;
        echo'<div style="background-color: gray; color: white; padding: 20px;">Su nombre o apellido débe contener solo letras!</div><br>';
    }

    if(!is_numeric($phone)){
        $erreur = true;
        echo'<div style="background-color: gray; color: white; padding: 20px;">Su numero de celular no es valido! </div><br>';
    }

    if(iconv_strlen($phone) < 9 || iconv_strlen($phone) > 9 ){
        $erreur = true;
        echo'<div style="background-color: gray; color: white; padding: 20px;">El numero de celular no es valido! </div><br>';
    }
  
    
    if(filter_var($email, FILTER_VALIDATE_EMAIL) == false)
    {
        $erreur = true;
        echo '<div style="background-color: gray; color: white; padding: 20px;">Su email no es valido!</div>';
    }
    


    if($erreur == false){    

        require_once 'phpMailer/Exception.php';
        require_once 'phpMailer/PHPMailer.php';
        require_once 'phpMailer/SMTP.php';
        
        $mail = new PHPMailer(true);
        

        try{
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'informes@donkiu.pe';
            $mail->Password = 'jdpt qfip pglv suwm';
            $mail->SMTPSecure = 'TLS';
            $mail->Port = 587; 
        
            //receptions
            
            $mensajeinfo="Enviado por," . "<br>" . "
           <b> Nombre: </b> " . $firstName . "<br>" . "
           <b> Apellido: </b> " . $lastName .  "<br>" . "
            <b> Cel: </b> " . $phone . "<br>" . "
           <b> Email : </b> " . $email . "<br>" . "
           <b> Mensaje :</b> " . $msg;

            $mail->setFrom($email, 'Donkiu.pe');
            $mail->addAddress('informes@donkiu.pe', $firstName);
            $mail->addReplyto($email);
            
            
            $mail->isHTML(true);
            $mail->Subject = 'Mensaje enviado desde contacto';
            $mail->Body = ($mensajeinfo);
           // $mail->AltBody = $mensajeinfo; 

            $mail->send();
            echo'<div style="background-color: gray; color: white; padding: 20px;">Mensaje enviado! </div><br>';



        }catch(Exception $e){
            echo "Error, vuelva a intentarlo... " ; //. ($mail->ErrorInfo);

        }
        
}
}
?>

