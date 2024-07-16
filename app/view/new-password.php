<?php include(__DIR__ ."\..\config.php");

 if($_SESSION['email'] == false){
  header('Location: signin');
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="<?=ROOT?>css\style_login.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="<?=ROOT?>css\new_pass.css?v=<?php echo time(); ?>" />
    <title>Ծածկագրի ստուգում </title>
  </head>
  <body>

    <div class="container-fluid row m-0">
      <div class="panels-container  col-12 ">
          <div class="panel left-panel left-panel d-inline-flex row justify-content-end" style="width: 100%;">
              <img src="<?=ROOT?>img/new_password.png" class="image col-8"  alt="" />
          </div>
      </div>
     <div class="forms-container row col-12  pt-3 justify-content-center text-center" style="margin-top: -100px;">   
        <form action="" method ="post" class=" forgetPas pas w-auto" id="form">
          <h2 class="title text-center pb-sm-4">Նոր գաղտնաբառ </h2>

            <div class=" alert-success text-center " role="alert">
                <div class="response_success"></div>
                
            </div>
              <div class=" alert-danger text-center " role="alert">
              <div class="response_error"></div>
             
           </div>      
          <div class="input-field m-auto " >
            <i class="bi bi-lock-fill"></i>
            <input id ="password" type="password" name="password" placeholder="Ստեղծել նոր գաղտնաբառ" required />
            <i class="bi bi-eye-slash-fill pas_hidden"></i>
          </div><br>
          <div class="input-field m-auto ">
            <i class="bi bi-lock-fill"></i>
            <input id ="cpassword" type="password" name="cpassword" placeholder="Հաստատել գաղտնաբառը" required />
            <i class="bi bi-eye-slash-fill cpas_hidden"></i>
          </div>

         

            <button class="btn solid " name = "change-password">Հաստատել</button>
           
        </form>
      </div>
    </div>
<script src="<?=ROOT?>js/action_user.js?v=<?php echo time(); ?>"></script>
<script src="<?=ROOT?>js/pass.js?v=<?php echo time(); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>