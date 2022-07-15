var fd_first_name = document.getElementById('fd_first_name');
var fd_last_name = document.getElementById('fd_last_name');
var fd_username = document.getElementById('fd_username');
var fd_email = document.getElementById('fd_email');
var fd_telephone = document.getElementById('fd_telephone');
var fd_telephone_numbers = document.getElementById('fd_telephone_numbers');

var fd_used_username = false;

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

function fd_airportCodeListener() {
    let errormsg = document.getElementById('fd_airport_code_val');
    if (document.getElementById('fd_airport_code').value != 'all') {
        errormsg.innerHTML = 'Valid Airport Code!';
        errormsg.style.color = 'green';
    } else {
        errormsg.innerHTML = 'Invalid Airport Code!';
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

function fd_check_username(){
    let username = document.getElementById('fd_username').value;
    let errormsg = document.getElementById('fd_username_val');
    // console.log(username);
    if (username.length == 0) {
        errormsg.innerHTML = "Invalid Username";
        return;
    } else {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == 'error') {
                    errormsg.innerHTML = 'Username is already used!'
                    errormsg.style.color = 'red';
                    fd_used_username = true;
                } else {
                    fd_used_username = false;
                    if (validateFdUsername(username)) {
                        errormsg.innerHTML = 'Valid Username';
                        errormsg.style.color = 'green';
                    }
                    else {
                        errormsg.innerHTML = 'Invalid Username';
                        errormsg.style.color = 'red';
                    }
                }

            }
        };
        xhttp.open("POST", "include/create_flight_dispatcher.inc.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("fd_username_=" + username);
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

    fd_check_username();

    if (fd_used_username){
        error_count++;
        let errormsg = document.getElementById('fd_username_val');
        errormsg.innerHTML = 'Username is already used!';
        errormsg.style.color = 'red';
        console.log('username used');
    }
    
    var fd_airport_code = document.getElementById('fd_airport_code');
    console.log(typeof fd_airport_code.value);
    if (fd_airport_code.value == 'all'){
        error_count++;
        // fd_airportCodeListener();
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

