var oa_first_name = document.getElementById('oa_first_name');
var oa_last_name = document.getElementById('oa_last_name');
var oa_username = document.getElementById('oa_username');
var fd_email = document.getElementById('fd_email');

oa_first_name.addEventListener("input", function(){oa_first_nameListener()});
oa_last_name.addEventListener("input", function(){oa_last_nameListener()});
oa_username.addEventListener("input", function(){oa_usernameListener()});
fd_email.addEventListener("input", function(){fd_emailListener()});

function oa_first_nameListener() {
    let errormsg = document.getElementById('oa_first_name_val');
    if (validateName(oa_first_name.value)) {
        errormsg.innerHTML = 'Valid First Name!';
        errormsg.style.color = 'green';
    } else {
        errormsg.innerHTML = 'Invalid First Name!';
        errormsg.style.color = 'red';
    }
}

function oa_last_nameListener() {
    let errormsg = document.getElementById('oa_last_name_val');
    if (validateName(oa_last_name.value)) {
        errormsg.innerHTML = 'Valid Last Name!';
        errormsg.style.color = 'green';
    } else {
        errormsg.innerHTML = 'Invalid Last Name!';
        errormsg.style.color = 'red';
    }
}

function oa_usernameListener() {
    let errormsg = document.getElementById('oa_username_val');
    if (validateUsername(oa_username.value)) {
        errormsg.innerHTML = 'Valid Username!';
        errormsg.style.color = 'green';
    } else {
        errormsg.innerHTML = 'Invalid Username!';
        errormsg.style.color = 'red';
    }
}

function fd_emailListener() {
    let errormsg = document.getElementById('fd_email_val');
    if (validateEmail(fd_email.value)) {
        errormsg.innerHTML = 'Valid Email Address!';
        errormsg.style.color = 'green';
    } else {
        errormsg.innerHTML = 'Invalid Email Address!';
        errormsg.style.color = 'red';
    }
}

function oa_checkAll(){
    let error_count=0;
    if (!validateName(oa_first_name.value)) {
        error_count++;
        oa_first_nameListener();
    }
    if (!validateName(oa_last_name.value)) {
        error_count++;
        oa_last_nameListener();
    }
    if (!validateUsername(oa_username.value)) {
        error_count++;
        oa_usernameListener();
    }

    if (!validateEmail(oa_email.value)) {
        error_count++;
        oa_emailListener();
    }

    console.log(error_count);
    if(error_count==0){
        document.getElementById('oa_signup_form').submit();
    }else{
        alert('Enter the correct details');
    }
}

function validateName(name){
    let pattern = /^(([A-Z])|([a-z]))([a-z]+)$/;
    return (pattern.test(name));
}

function validateUsername(name){
    let pattern = /^([\w\W\d]+){1,}$/;
    return (pattern.test(name));
}

function validateEmail(email) {
    let pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return (pattern.test(email));
}