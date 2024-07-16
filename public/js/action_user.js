
form = document.querySelector("#form");
form.onsubmit = function (e){
    e.preventDefault();

	let form_data =new FormData(form) ;

	let request = new XMLHttpRequest();
   
	request.open('POST', '../public/post.php');

    document.querySelector(".response_error").parentElement.classList.remove("alert");
    document.querySelector(".response_error").textContent="";
    document.querySelector(".response_success").parentElement.classList.remove("alert");
    document.querySelector(".response_success").textContent="";

	request.onreadystatechange = function()
	{
        
		if(request.readyState == 4 && request.status == 200)
		{   console.log(request.responseText);
            let response = JSON. parse( request.responseText );
            console.log(response.ok) ;
            if(!response.ok){
                if(response.error != '')
                {
                    document.querySelector(".response_error").parentElement.classList.add("alert");
                    document.querySelector(".response_error").textContent= response.error;

                }else if(response.success != '')
                {
                    document.querySelector(".response_success").parentElement.classList.add("alert");
                    document.querySelector(".response_success").textContent= response.success;
                   
                }else{
                    console.log("not send") ;
                }
            }else{
                location.href = '../public/'+response.success;
               
            }
		}
	}
    request.send(form_data);
	
}