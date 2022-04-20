var fd_first_name = document.getElementById('fd_first_name');
var fd_last_name = document.getElementById('fd_last_name');
var fd_username = document.getElementById('fd_username');
var fd_email = document.getElementById('fd_email');

fd_first_name.addEventListener("input", function(){fd_first_nameListener()});
fd_last_name.addEventListener("input", function(){fd_last_nameListener()});
fd_username.addEventListener("input", function(){fd_usernameListener()});
fd_email.addEventListener("input", function(){fd_emailListener()});

function fd_first_nameListener() {
    let errormsg = document.getElementById('fd_first_name_val');
    if (validateName(fd_first_name.value)) {
        errormsg.innerHTML = 'Valid First Name!';
        errormsg.style.color = 'green';
    } else {
        errormsg.innerHTML = 'Invalid First Name!';
        errormsg.style.color = 'red';
    }
}

function fd_last_nameListener() {
    let errormsg = document.getElementById('fd_last_name_val');
    if (validateName(fd_last_name.value)) {
        errormsg.innerHTML = 'Valid Last Name!';
        errormsg.style.color = 'green';
    } else {
        errormsg.innerHTML = 'Invalid Last Name!';
        errormsg.style.color = 'red';
    }
}

function fd_usernameListener() {
    let errormsg = document.getElementById('fd_username_val');
    if (validateUsername(fd_username.value)) {
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

function fd_checkAll(){
    let error_count=0;
    if (!validateName(fd_first_name.value)) {
        error_count++;
        fd_first_nameListener();
    }
    if (!validateName(fd_last_name.value)) {
        error_count++;
        fd_last_nameListener();
    }
    if (!validateUsername(fd_username.value)) {
        error_count++;
        fd_usernameListener();
    }

    if (!validateEmail(fd_email.value)) {
        error_count++;
        fd_emailListener();
    }

    console.log(error_count);
    if(error_count==0){
        document.getElementById('fd_signup_form').submit();
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

