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
const cpas_hidden = document.querySelector(".cpas_hidden");
const cpassword =document.querySelector("#cpassword");
let b;
function cpas(){
  if(b == 1){
     cpassword.type ='password';
     cpas_hidden.classList.remove("bi-eye-fill");
     cpas_hidden.classList.add("bi-eye-slash-fill");
     b=0;
  }else {
    cpassword.type ='text';
    cpas_hidden.classList.remove("bi-eye-slash-fill");
    cpas_hidden.classList.add("bi-eye-fill");
    b=1;
  }
}
cpas_hidden.addEventListener("click", cpas);