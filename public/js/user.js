const pas_hidden = document.querySelector(".pas_hidden");
const container = document.querySelector(".container");
const password =document.querySelector("#password");
let a;
pas_hidden.addEventListener("click", () => {
  if(a == 1){
     password.type ='password';
     pas_hidden.classList.remove("bi-eye-fill");
    pas_hidden.classList.add("bi-eye-slash-fill");
     a=0;
  }else {
    password.type ='text';
    
    pas_hidden.classList.remove("bi-eye-slash-fill");
     pas_hidden.classList.add("bi-eye-fill");
    a=1;
  }
 
});

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