function togglepassword(textID){
    console.log(textID);
    var x = document.getElementById(textID);
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}


var password = document.getElementById('password');
var retypepwd = document.getElementById('retypepwd')




password.addEventListener('input', function () { passwordListner() });
retypepwd.addEventListener('input', function () { passwordListner(1) });




function passwordListner(retype = 0) {
    let errormsg;
    let element;
    if (retype == 1) {
        errormsg = document.getElementById('retypepassword_val');
        element = retypepwd;
    } else {
        errormsg = document.getElementById('password_val');
        element = password;
    }
    if (validatePassword(element.value)) {
        errormsg.innerHTML = 'Valid Password!';
        errormsg.style.color = 'green';
    } else {
        errormsg.innerHTML = 'Invalid Password!';
        errormsg.style.color = 'red';
    }
}


//validations
function checkAll() {

    let error_count = 0;

    if (!(validatePassword(password.value) && validatePassword(retypepwd.value) && (password.value == retypepwd.value))) {
        error_count++;
        console.log('password');
        passwordListner();
        passwordListner(1);
        if (password.value != retypepwd.value) {
            document.getElementById('retypepassword_val').innerHTML = 'Passwords are not equal!';
            document.getElementById('password_val').innerHTML = 'Passwords are not equal!';
            document.getElementById('retypepassword_val').style.color = 'red';
            document.getElementById('password_val').style.color = 'red';
        }

    }

    // console.log(error_count);
    if (error_count == 0) {
        document.getElementById('signup_form').submit();
        // console.log(error_count);
    } else {
        alert('Enter the correct details');

    }


}

function validatePassword(password) {
    let pattern = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;
    return (pattern.test(password));
}




