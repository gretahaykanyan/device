
let form = document.querySelector("#form");
let edit_form = document.querySelector("#editform");

form.onsubmit = function (e){
    e.preventDefault();
	ajax('POST',form,'../public/post.php');
	
}
edit_form.onsubmit = function (e){
    e.preventDefault();
	ajax('POST',edit_form,'../public/post.php');
	
}

document.querySelector("body").onload =function(e){
    e.preventDefault();
	ajax('POST',form,'../public/post.php');
}

document.querySelector('#selectform').onchange = function (e){
   
    e.preventDefault();
    let form_data = "selectdevice="+document.querySelector('.device').value + "&& selectbrand="+document.querySelector('.brand').value;
    console.log(form_data);
	let request = new XMLHttpRequest();
   
	request.open('POST', '../public/post.php');
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    document.querySelector(".fetch").textContent = "";
	request.onreadystatechange = function()
	{
        
		if(request.readyState == 4 && request.status == 200)
		{   console.log(request.responseText);
            let response = JSON. parse( request.responseText );
            console.log(response) ;
            if(response.fetch){
                let fetch =response.fetch;  
                let src= 'uploads/';
                
                for(let i=0; i < fetch.length;i++){
                   
                document.querySelector(".fetch").innerHTML += 
              
                ` <tr>
                    <th scope="row">${i}</th>
                    <td> ${fetch[i].Device}</td>
                    <td>${fetch[i].Brand}   ${fetch[i].Model} </td>
                    <td><img src="${src}${fetch[i].Img}" ></td>
                    <td>${fetch[i].Price} դր</td>
                    <td  >
                        <a href="?more=${fetch[i].Id}" type="button" class="btn btnn me-3 mb-1" style="--i:#20a2a052;--l:var(--green)"><i class="bi bi-eye-fill" ></i></a>
                        <a href="?edit=${fetch[i].Id}" type="button" class="btn btnn me-3 mb-1"  style="--i:#fbe1753d;--l:#FBE175;"><i class="bi bi-pencil-fill" ></i></a>
                        <button onclick ="confirm_rem(${fetch[i].Id})" class="btn btnn mb-1"  style="--i:#fab7c757;--l:#FAB7C7;"><i class="bi bi-trash3-fill" ></i></button>
                    </td>
                 </tr>`
                }
            }else{
                console.log("error fetch") ;
            }
		}
	}

    request.send(form_data);
	
}
let ajax= function(metod,form,src){
    

	let form_data =new FormData(form) ;

	let request = new XMLHttpRequest();
   
	request.open(metod, src);

    document.querySelector(".error").parentElement.classList.remove("show");
    document.querySelector(".error").textContent="";
    document.querySelector(".success").parentElement.classList.remove("show");
    document.querySelector(".success").textContent="";
    document.querySelector(".fetch").textContent = "";

	request.onreadystatechange = function()
	{
        
		if(request.readyState == 4 && request.status == 200)
		{   console.log(request.responseText);
            let response = JSON. parse( request.responseText );
            console.log(response) ;
            
                if(response.error != '')
                {
                    document.querySelector(".error").parentElement.classList.add("show");
                    document.querySelector(".error").textContent=response.error;
                    console.log(response.error) ;
                }else if(response.success != '')
                {
                    document.querySelector(".success").parentElement.classList.add("show");
                    document.querySelector(".success").textContent=response.success;
                    console.log(response.success) ;
                }else{
                    console.log("not send") ;
                }
            if(response.fetch){
                let fetch =response.fetch;  
                let src= 'uploads/';
                
                for(let i=0; i < fetch.length;i++){
                   
                document.querySelector(".fetch").innerHTML += 
              
                ` <tr>
                    <th scope="row">${i}</th>
                    <td> ${fetch[i].Device}</td>
                    <td>${fetch[i].Brand}   ${fetch[i].Model} </td>
                    <td><img src="${src}${fetch[i].Img}" ></td>
                    <td>${fetch[i].Price} դր</td>
                    <td  >
                        <a href="?more=${fetch[i].Id}" type="button" class="btn btnn me-3 mb-1" style="--i:#20a2a052;--l:var(--green)"><i class="bi bi-eye-fill" ></i></a>
                        <a href="?edit=${fetch[i].Id}" type="button" class="btn btnn me-3 mb-1"  style="--i:#fbe1753d;--l:#FBE175;"><i class="bi bi-pencil-fill" ></i></a>
                        <button onclick ="confirm_rem(${fetch[i].Id})" class="btn btnn mb-1"  style="--i:#fab7c757;--l:#FAB7C7;"><i class="bi bi-trash3-fill" ></i></button>
                    </td>
                 </tr>`
                }
            }else{
                console.log("error fetch") ;
            }
		}
	}

    request.send(form_data);
}