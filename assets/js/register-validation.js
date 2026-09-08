document.querySelector("form").addEventListener("submit", function(e){


    let name = document.querySelector("[name='name']").value.trim();

    let email = document.querySelector("[name='email']").value.trim();

    let password = document.querySelector("[name='password']").value;

    let confirm = document.querySelector("[name='confirm_password']").value;

    let phone = document.querySelector("[name='phone']").value;



    if(name === "")
    {
        alert("Please enter your name");
        e.preventDefault();
        return;
    }



    if(!email.includes("@"))
    {
        alert("Enter a valid email");
        e.preventDefault();
        return;
    }



    if(password.length < 6)
    {
        alert("Password must be at least 6 characters");
        e.preventDefault();
        return;
    }



    if(password !== confirm)
    {
        alert("Password does not match");
        e.preventDefault();
        return;
    }



    if(phone.length < 10)
    {
        alert("Enter valid phone number");
        e.preventDefault();
        return;
    }



});