document.querySelector("form").addEventListener("submit", function(e){


let email = document.querySelector("[name='email']").value.trim();

let password = document.querySelector("[name='password']").value;



if(email=="")
{

alert("Enter your email");

e.preventDefault();

return;

}



if(password=="")
{

alert("Enter your password");

e.preventDefault();

return;

}



});