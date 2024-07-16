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
   <link rel="stylesheet" href="<?=ROOT?>css\reset_code.css?v=<?php echo time(); ?>" />
    <title>Ծածկագրի ստուգում </title>
  </head>
  <body>
    <div class="container-fluid row m-0">
      <div class="panels-container mt-sm-0 mt-5 col-12 ">
          <div class="panel left-panel left-panel d-inline-flex row justify-content-between" style="width: 100%;">
              <div class="content col-4 align-self-start">
                  <a href = "forgotpass" class="btn_left" id="sign-up-btn">
                  <i class="bi bi-arrow-left"></i>
                  </a>
              </div>
              <img src="<?=ROOT?>img/verification.png" class="image col-8" style="width: 40%;" alt="" />
          </div>
      </div>
      <div class="forms-container row col-12  pt-3 justify-content-center text-center" style="margin-top: -100px;">   
        <form action="" method ="post" class=" forgetPas pas w-auto" id="form">
            <h2 class="title text-center pb-sm-4">Ստուգող ծածկագիր </h2>
            <?php 
               if(isset($_SESSION['info'])  && $_SESSION['info'] !=''){?>
                 <div class="alert alert-info text-center  alert-dismissible " role="alert" style="padding: 0.4rem 0.4rem">
                    <div><?php echo $_SESSION['info'];  unset($_SESSION['info']); ?></div>                
                   
                 </div>
            <?php
               }?>
                   
            <div class="input-field m-auto">
            <i class="bi bi-envelope-arrow-up-fill"></i>
              <input type="number" name="code" placeholder="Ներմուծեք ծածկագիրը" required />
            </div>

            <div class=" alert-success text-center " role="alert">
              <div class="response_success"></div>
            </div> 
            <div class=" alert-danger text-center " role="alert">
              <div class="response_error"></div>
            </div>

            <button class="btn solid " name = "reset-code">Հաստատել</button>
        </form>
      </div>
    </div>
<script src="<?=ROOT?>js/action_user.js?v=<?php echo time(); ?>"></script>
<script src="<?=ROOT?>js/user.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>