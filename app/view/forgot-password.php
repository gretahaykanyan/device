<?php include(__DIR__ ."\..\config.php");?>
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
   <link rel="stylesheet" href="<?=ROOT?>css\style_forgetp.css?v=<?php echo time(); ?>" />
    <title>Գաղտնաբառի վերականգնում</title>
  </head>
  <body>

    <div class="container-fluid row m-0">
      <div class="panels-container  col-12 ">
          <div class="panel left-panel left-panel d-inline-flex row justify-content-around">
              <div class="content col-md-6 col-12 align-self-start">
                  <h3>Դեռ գրանցվա՞ծ չեք</h3>
                  <p>Գրանցվեք ձեր անձնական տվյալներով՝ կայքի բոլոր հնարավորություններից օգտվելու համար</p>
                  <a href = "signup" class="btn transparent" id="sign-up-btn">Գրանցվել</a>
              </div>
              <img src="<?=ROOT?>img/password.png" class="image col-md-6 col-12" style="width: 45%;" alt="" />
          </div>
      </div>
      <div class="forms-container row col-12  pt-3 justify-content-center text-center">   
        <form action="" method ="post" class=" forgetPas pas needs-validation" id="form" novalidate>
            <h2 class="title text-center pb-sm-4">Մուտքագրեք Ձեր Էլ. հասցեն</h2>
            <div class="input-field m-auto">
              <i class="fas fa-envelope"></i>
              <input class="form-control" type="email" name ="email" placeholder="էլ. հասցե" required/>
            </div>
            <div class=" alert-success text-center " role="alert">
                <div class="response_success"></div>
            </div>
            <div class=" alert-danger text-center " role="alert">
              <div class="response_error"></div>
            </div>
            
            <button class="btn solid subPass" name = "check-email">Հաստատել</button>
        </form>
     </div>  
    </div>
<script >
  (function () {
    'use strict'
    var forms = document.querySelectorAll('.needs-validation')

    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('input', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
        form.classList.add('was-validated')
        }, false)
      })
  })()  
</script>
<script src="<?=ROOT?>js/action_user.js?v=<?php echo time(); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>