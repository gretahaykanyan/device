<?php include(__DIR__ ."\..\config.php"); ?>
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
    <link rel="stylesheet" href="<?=ROOT?>css\style_signup.css?v=<?php echo time(); ?>" />
    <title>Գրանցվել</title>
  </head>
  <body>

  <div class="container-fluid row m-0">
    <div class="forms-container col-md-6 col-12 mt-md-5 pt-5">   
     <form name ="subUp" method ="post" class="sign-up-form d-flex align-items-center justify-content-center flex-column needs-validation" id="form" novalidate>  
   
              <div class=" alert-success text-center " role="alert">
                <div class="response_success"></div>
              </div>
                 
             <div class=" alert-danger text-center " role="alert">
                <div class="response_error"></div>
              </div>
                
          
        <h2 class="title">Գրանցվել</h2> 
            <div class="input-field">
              <i class="bi bi-person-fill"></i>
              <input class="form-control" type="text" name ="username" placeholder="Մուտքանուն"  required/>
            </div>
            <div class="input-field">
              <i class="bi bi-envelope-at-fill"></i>
              <input class="form-control" type="email" name ="email" placeholder="էլ. հասցե" required/>
            </div>
            <div class="input-field">
              <i class="bi bi-lock-fill"></i>
              <input class="form-control" type="password" name ="password" placeholder="Գաղտնաբառ" id="password" required/>
              <i class="bi bi-eye-slash-fill pas_hidden"></i>
            </div>
            <button  class="btn signUP "  id ="submit" >Գրանցվել</button> 
          </form>
    </div>

    <div class="panels-container col-md-6 col-12 mt-md-5">
      <div class="panel right-panel">
            <div class="content">
              <h3>Գրանցվա՞ծ եք</h3>
              <p>
                  Մուտքագրեք ձեր անձնական տվյալները՝ կայքի բոլոր հնարավորություններից օգտվելու համար
              </p>
              <a href ="signin" class="btn transparent" id="sign-in-btn">
                Մուտք գործել
              </a>
            </div>
            <img src="<?=ROOT?>img/signup.png" class="image" alt="" />
          </div>
      </div>
    </div>
    <script src="<?=ROOT?>js/action_user.js?v=<?php echo time(); ?>"></script>
    <script src="<?=ROOT?>js/user.js?v=<?php echo time(); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>