let list = document.querySelectorAll(".menu-item");
let home = document.querySelector(".home");
let adder = document.querySelector(".add");
for (let i = 0; i < list.length; i++) {
    list[i].addEventListener("click", () => {
        document.querySelector(".active")?.classList.remove("active");
        list[i].classList.add("active");
        console.log(i);
    });

    list[i].addEventListener("mouseover", () => {
        document.querySelector(".active")?.classList.remove("active");
        list[i].classList.add("active");
    });
}

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
 
function confirm_rem(id){
  if(confirm("Ջնջել")){
    window.location.href = "app?rem="+id;
  }
}

const toastLiveExample = document.getElementById('liveToast2');
const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
const toastLiveExample1 = document.getElementById('liveToast1');
const toastBootstrap1 = bootstrap.Toast.getOrCreateInstance(toastLiveExample1);
const toastLiveExample2 = document.getElementById('liveToast3');
const toastBootstrap2 = bootstrap.Toast.getOrCreateInstance(toastLiveExample2);