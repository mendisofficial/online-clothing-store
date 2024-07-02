// changing between signin and signup boxes
function changeView(){
    let signinBox = document.getElementById("signin-box");
    let signupBox = document.getElementById("signup-box");

    signinBox.classList.toggle("d-none");
    signupBox.classList.toggle("d-none");
}

// signup function
function signup(){
    let firstname = document.getElementById("firstname");
    let lastname = document.getElementById("lastname");
    let email = document.getElementById("email");
    let mobile = document.getElementById("mobile");
    let username = document.getElementById("username-signup");
    let password = document.getElementById("password-signup");

    let form = new FormData();
    form.append("firstname", firstname.value);
    form.append("lastname", lastname.value);
    form.append("email", email.value);
    form.append("mobile", mobile.value);
    form.append("username", username.value);
    form.append("password", password.value);

    let request = new XMLHttpRequest();
    request.open("POST", "processors/signup.php", true);
    request.send(form);

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let response = request.responseText;
            if(response == "Success"){
                document.getElementById("signup-msg-box").innerHTML = "Signup successful. You can now login.";
                document.getElementById("signup-msg-box").className = "alert alert-success";
                document.getElementById("signup-msg-div").classList.remove("d-none");

                firstname.value = "";
                lastname.value = "";
                email.value = "";
                mobile.value = "";
                username.value = "";
                password.value = "";
            } else {
                document.getElementById("signup-msg-box").innerHTML = response;
                document.getElementById("signup-msg-box").className = "alert alert-danger";
                document.getElementById("signup-msg-div").classList.remove("d-none");
            }
        }
    }
}