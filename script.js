const signUpButton =document.getElementById('signupButton');
const signInButton =document.getElementById('signinButton');
const signInForm=document.getElementById('signin');
const signUpForm=document.getElementById('signup');

signUpButton.addEventListener('click', function(){
    signInForm.style.display="none";
    signUpForm.style.display="block";
})

signInButton.addEventListener('click', function(){
    signInForm.style.display="block";
    signUpForm.style.display="none";
})