var oa_first_name = document.getElementById('oa_first_name');
var oa_last_name = document.getElementById('oa_last_name');
var oa_username = document.getElementById('oa_username');
var oa_email = document.getElementById('oa_email');
var oa_telephone = document.getElementById('oa_telephone');
var oa_telephone_numbers = document.getElementById('oa_telephone_numbers');

var oa_used_username = false;

oa_first_name.addEventListener("input", function(){oa_first_nameListener()});
oa_last_name.addEventListener("input", function(){oa_last_nameListener()});
oa_username.addEventListener("input", function(){oa_usernameListener()});
oa_email.addEventListener("input", function(){oa_emailListener()});
oa_telephone.addEventListener("input", function(){oa_telephoneListener()});

function oa_first_nameListener() {
    let errormsg = document.getElementById('oa_first_name_val');
    if (validateOaName(oa_first_name.value)) {
        errormsg.innerHTML = 'Valid First Name!';
        errormsg.style.color = 'green';
    } else {
        errormsg.innerHTML = 'Invalid First Name!';
        errormsg.style.color = 'red';
    }
}

function oa_last_nameListener() {
    let errormsg = document.getElementById('oa_last_name_val');
    if (validateOaName(oa_last_name.value)) {
        errormsg.innerHTML = 'Valid Last Name!';
        errormsg.style.color = 'green';
    } else {
        errormsg.innerHTML = 'Invalid Last Name!';
        errormsg.style.color = 'red';
    }
}

function oa_usernameListener() {
    let errormsg = document.getElementById('oa_username_val');
    if (validateOaUsername(oa_username.value)) {
        errormsg.innerHTML = 'Valid Username!';
        errormsg.style.color = 'green';
    } else {
        errormsg.innerHTML = 'Invalid Username!';
        errormsg.style.color = 'red';
    }
}

function oa_emailListener() {
    let errormsg = document.getElementById('oa_email_val');
    if (validateOaEmail(oa_email.value)) {
        errormsg.innerHTML = 'Valid Email Address!';
        errormsg.style.color = 'green';
    } else {
        errormsg.innerHTML = 'Invalid Email Address!';
        errormsg.style.color = 'red';
    }
}

function oa_airportCodeListener() {
    let errormsg = document.getElementById('oa_airport_code_val');
    if (document.getElementById('oa_airport_code').value != 'all') {
        errormsg.innerHTML = 'Valid Airport Code!';
        errormsg.style.color = 'green';
    } else {
        errormsg.innerHTML = 'Invalid Airport Code!';
        errormsg.style.color = 'red';
    }
}

function oa_telephoneListener(){
    let errormsg = document.getElementById('oa_telephone_val');
    if (validateOaTelephoneNumber(oa_telephone.value)) {
        errormsg.innerHTML = 'Valid telephone!';
        errormsg.style.color = 'green';
        document.getElementById('oa_add').disabled = false;
    } else {
        errormsg.innerHTML = 'Invalid telephone!';
        errormsg.style.color = 'red';
        document.getElementById('oa_add').disabled = true;
    }
}

function oa_remove_telephone(){
    var x = document.getElementById('oa_telephone_numbers_list');
    x.remove(x.selectedIndex);
}

function oa_addTelephone(){
    let telephone = document.getElementById('oa_telephone');
    let errormsg = document.getElementById('oa_telephone_val');

    if (validateTelphoneNumber(telephone.value)) {
        let telephone_number_list = document.getElementById('oa_telephone_numbers_list');
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

function oa_check_username(){
    let username = document.getElementById('oa_username').value;
    let errormsg = document.getElementById('oa_username_val');
    // console.log(username);
    if (username.length == 0) {
        errormsg.innerHTML = "Invalid Username";
        return;
    } else {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            // console.log(this.readyState);
            // console.log(this.status);
            // console.log(this.responseText);
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == 'error') {
                    errormsg.innerHTML = 'Already used!'
                    errormsg.style.color = 'red';
                    oa_used_username = true;
                } else {
                    oa_used_username = false;
                    if (validateOaUsername(username)) {
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
        xhttp.open("POST", "include/create_operations_agent.inc.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("oa_username_=" + username);
    }
}

function oa_checkAll(){
    for (var option of document.getElementById("oa_telephone_numbers_list").options) {
        document.getElementById("oa_telephone_numbers").value+=option.value + ',';
    }

    let error_count=0;
    if (!validateOaName(oa_first_name.value)) {
        error_count++;
        oa_first_nameListener();
    }
    if (!validateOaName(oa_last_name.value)) {
        error_count++;
        oa_last_nameListener();
    }
    if (!validateOaUsername(oa_username.value)) {
        error_count++;
        oa_usernameListener();
    }

    if (!validateOaEmail(oa_email.value)) {
        error_count++;
        oa_emailListener();
    }

    if (oa_telephone_numbers.value == '') {
        error_count++;
        
        document.getElementById('oa_telephone_val').innerHTML = 'Empty telephone number!';
        document.getElementById('oa_telephone_val').style.color = 'red';
    }

    oa_check_username();

    if (oa_used_username){
        error_count++;
        let errormsg = document.getElementById('oa_username_val');
        errormsg.innerHTML = 'Already used!';
        errormsg.style.color = 'red';
    // console.log('username used');
    }

    var oa_airport_code = document.getElementById('oa_airport_code');
    // console.log(oa_airport_code.value);
    if (oa_airport_code.value == 'all'){
        error_count++;
        // oa_airportCodeListener();
    }

    if(error_count==0){
        document.getElementById('oa_signup_form').submit();
    }else{
        alert('Enter the correct details');
    }
}

function validateOaName(name){
    let pattern = /^(([A-Z])|([a-z]))([a-z]+)$/;
    return (pattern.test(name));
}

function validateOaUsername(name){
    let pattern = /^([\w\W\d]+){1,}$/;
    return (pattern.test(name));
}

function validateOaEmail(email) {
    let pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return (pattern.test(email));
}

function validateOaTelephoneNumber(telephone_number){
    let pattern = /^[\+a-zA-Z0-9\-().\s]{10,15}$/;
    return (pattern.test(telephone_number));
}