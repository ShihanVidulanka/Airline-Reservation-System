var fd_first_name = document.getElementById('fd_first_name');
var fd_last_name = document.getElementById('fd_last_name');
var fd_username = document.getElementById('fd_username');
var fd_email = document.getElementById('fd_email');
var fd_telephone = document.getElementById('fd_telephone');
var fd_telephone_numbers = document.getElementById('fd_telephone_numbers');

fd_first_name.addEventListener("input", function(){fd_first_nameListener()});
fd_last_name.addEventListener("input", function(){fd_last_nameListener()});
fd_username.addEventListener("input", function(){fd_usernameListener()});
fd_email.addEventListener("input", function(){fd_emailListener()});
fd_telephone.addEventListener("input", function(){fd_telephoneListener()});

function fd_first_nameListener() {
    let errormsg = document.getElementById('fd_first_name_val');
    if (validateFdName(fd_first_name.value)) {
        errormsg.innerHTML = 'Valid First Name!';
        errormsg.style.color = 'green';
    } else {
        errormsg.innerHTML = 'Invalid First Name!';
        errormsg.style.color = 'red';
    }
}

function fd_last_nameListener() {
    let errormsg = document.getElementById('fd_last_name_val');
    if (validateFdName(fd_last_name.value)) {
        errormsg.innerHTML = 'Valid Last Name!';
        errormsg.style.color = 'green';
    } else {
        errormsg.innerHTML = 'Invalid Last Name!';
        errormsg.style.color = 'red';
    }
}

function fd_usernameListener() {
    let errormsg = document.getElementById('fd_username_val');
    if (validateFdUsername(fd_username.value)) {
        errormsg.innerHTML = 'Valid Username!';
        errormsg.style.color = 'green';
    } else {
        errormsg.innerHTML = 'Invalid Username!';
        errormsg.style.color = 'red';
    }
}

function fd_emailListener() {
    let errormsg = document.getElementById('fd_email_val');
    if (validateFdEmail(fd_email.value)) {
        errormsg.innerHTML = 'Valid Email Address!';
        errormsg.style.color = 'green';
    } else {
        errormsg.innerHTML = 'Invalid Email Address!';
        errormsg.style.color = 'red';
    }
}

function fd_telephoneListener(){
    let errormsg = document.getElementById('fd_telephone_val');
    if (validateFdTelephoneNumber(fd_telephone.value)) {
        errormsg.innerHTML = 'Valid telephone!';
        errormsg.style.color = 'green';
        document.getElementById('fd_add').disabled = false;
    } else {
        errormsg.innerHTML = 'Invalid telephone!';
        errormsg.style.color = 'red';
        document.getElementById('fd_add').disabled = true;
    }
}

function fd_remove_telephone(){
    var x = document.getElementById('fd_telephone_numbers_list');
    x.remove(x.selectedIndex);
}

function fd_addTelephone(){
    let telephone = document.getElementById('fd_telephone');
    let errormsg = document.getElementById('fd_telephone_val');

    if (validateTelphoneNumber(telephone.value)) {
        let telephone_number_list = document.getElementById('fd_telephone_numbers_list');
        let option = document.createElement("option");
        option.text = telephone.value;
        // console.log(option.text);
        telephone_number_list.appendChild(option);
        // telephone_numbers.value += telephone.value + ',';
        telephone.value = '';
    } else {
        errormsg.innerHTML = 'Invalid telephone!';
        errormsg.style.color = 'red';
        document.getElementById('add').disabled = true;
    }
}

function fd_checkAll(){
    for (var option of document.getElementById("fd_telephone_numbers_list").options) {
        document.getElementById("fd_telephone_numbers").value+=option.value + ',';
    }

    let error_count=0;
    if (!validateFdName(fd_first_name.value)) {
        error_count++;
        fd_first_nameListener();
    }
    if (!validateFdName(fd_last_name.value)) {
        error_count++;
        fd_last_nameListener();
    }
    if (!validateFdUsername(fd_username.value)) {
        error_count++;
        fd_usernameListener();
    }

    if (!validateFdEmail(fd_email.value)) {
        error_count++;
        fd_emailListener();
    }

    if (fd_telephone_numbers.value == '') {
        error_count++;
        
        document.getElementById('fd_telephone_val').innerHTML = 'Empty telephone number!';
        document.getElementById('fd_telephone_val').style.color = 'red';
    }

    
    if(error_count==0){
        document.getElementById('fd_signup_form').submit();
    }else{
        alert('Enter the correct details');
    }
}

function validateFdName(name){
    let pattern = /^(([A-Z])|([a-z]))([a-z]+)$/;
    return (pattern.test(name));
}

function validateFdUsername(name){
    let pattern = /^([\w\W\d]+){1,}$/;
    return (pattern.test(name));
}

function validateFdEmail(email) {
    let pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return (pattern.test(email));
}

function validateFdTelephoneNumber(telephone_number){
    let pattern = /^[\+a-zA-Z0-9\-().\s]{10,15}$/;
    return (pattern.test(telephone_number));
}

