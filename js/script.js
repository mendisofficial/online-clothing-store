// changing between signin and signup boxes
function changeView(){
    let signinBox = document.getElementById("signin-box");
    let signupBox = document.getElementById("signup-box");

    signinBox.classList.toggle("d-none");
    signupBox.classList.toggle("d-none");
}