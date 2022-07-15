var first_name = document.getElementById('first_name');
var last_name = document.getElementById('last_name');
var username = document.getElementById('username');
var password = document.getElementById('password');
var retypepwd = document.getElementById('retypepwd')
// var NIC = document.getElementById('NIC');
var passport_number = document.getElementById('passport_number')
// var address = document.getElementById('address');
var telephone = document.getElementById('telephone');
var telephone_numbers = document.getElementById('telephone_numbers');
var dob = document.getElementById('dob');
var email = document.getElementById('email');


function togglepassword(textID){
  console.log(textID);
  var x = document.getElementById(textID);
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

var usedUsername = false;
var usedPassportNo = false;
// var errors_count = 0;

first_name.addEventListener("input", function () { first_nameListner() });
last_name.addEventListener("input", function () { last_nameListner() });
username.addEventListener('input', function () { usernameListner() });
password.addEventListener('input', function () { passwordListner() });
retypepwd.addEventListener('input', function () { passwordListner(1) });
// address.addEventListener('input',function(){addressListner()});
telephone.addEventListener('input', function () { telephoneListner() });
passport_number.addEventListener('input', function () { passport_numberListner() });
dob.addEventListener('input', function () { dobListner() });
email.addEventListener('input', function () { emailListner() });

function first_nameListner() {
  let errormsg = document.getElementById('first_name_val');
  if (validateName(first_name.value)) {
    errormsg.innerHTML = 'Valid First Name!';
    errormsg.style.color = 'green';
  } else {
    errormsg.innerHTML = 'Invalid First Name!';
    errormsg.style.color = 'red';
  }
}

function last_nameListner() {
  let errormsg = document.getElementById('last_name_val');
  if (validateName(last_name.value)) {
    errormsg.innerHTML = 'Valid Last Name!';
    errormsg.style.color = 'green';
  } else {
    errormsg.innerHTML = 'Invalid Last Name!';
    errormsg.style.color = 'red';
  }
}

function usernameListner() {
  let errormsg = document.getElementById('username_val');
  if (validateUsername(username.value)) {
    errormsg.innerHTML = 'Valid Username!';
    errormsg.style.color = 'green';

  } else {
    errormsg.innerHTML = 'Invalid Username!';
    errormsg.style.color = 'red';
  }
}

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

// function addressListner(){
//   let errormsg = document.getElementById('address_val');
//   if(validateAddress(address.value)){
//     errormsg.innerHTML = 'Valid Address!';
//     errormsg.style.color = 'green';
//   }else{
//     errormsg.innerHTML = 'Invalid Address!';
//     errormsg.style.color = 'red';
//   }
// }

function telephoneListner() {
  let errormsg = document.getElementById('telephone_val');
  if (validateTelphoneNumber(telephone.value)) {
    errormsg.innerHTML = 'Valid telephone!';
    errormsg.style.color = 'green';
    document.getElementById('add').disabled = false;
  } else {
    errormsg.innerHTML = 'Invalid telephone!';
    errormsg.style.color = 'red';
    document.getElementById('add').disabled = true;
  }
}


function passport_numberListner() {
  let errormsg = document.getElementById('passport_number_val');
  if (validatepassport_number(passport_number.value)) {
    errormsg.innerHTML = 'Valid Passport Number!';
    errormsg.style.color = 'green';
  } else {
    errormsg.innerHTML = 'Invalid Passport Number!';
    errormsg.style.color = 'red';
  }
}

function dobListner() {
  let errormsg = document.getElementById('dob_val');
  if (validateDate(dob.value)) {
    errormsg.innerHTML = 'Valid Birthday!';
    errormsg.style.color = 'green';
  } else {
    errormsg.innerHTML = 'Invalid Birthday!';
    errormsg.style.color = 'red';
  }
}


function emailListner() {
  let errormsg = document.getElementById('email_val');
  if (validateEmail(email.value)) {
    errormsg.innerHTML = 'Valid Email Address!';
    errormsg.style.color = 'green';

  } else {
    errormsg.innerHTML = 'Invalid Email Address!';
    errormsg.style.color = 'red';
  }
}

function remove_tp(){
  var x = document.getElementById("telephone_numbers_list");
  x.remove(x.selectedIndex);
}

function addtelephone() {
  let telephone = document.getElementById('telephone');
  let errormsg = document.getElementById('telephone_val');

  if (validateTelphoneNumber(telephone.value)) {
    let telephone_number_list = document.getElementById('telephone_numbers_list');
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

function checkUserName() {

  let username = document.getElementById('username').value;
  let errormsg = document.getElementById('username_val');
  console.log(username);
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
          usedUsername = true;
        } else {
          usedUsername = false;
          if (validateUsername(username)) {
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
    xhttp.open("POST", "include/signup.inc.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("username_=" + username);
  }
}
function checkPassportNo() {
  let passport_number = document.getElementById('passport_number').value;
  let errormsg = document.getElementById('passport_number_val');

  // console.log(passport_number);
  if (passport_number.length == 0) {
    errormsg.innerHTML = "Invalid Passport_number";
    return;
  } else {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        if (this.responseText == 'error') {
          errormsg.innerHTML = 'passport_number is already used!'
          errormsg.style.color = 'red';
          usedPassportNo = true;
        } else {
          usedPassportNo = false;
          if (validatepassport_number(passport_number)) {
            errormsg.innerHTML = 'Valid Passport_number';
            errormsg.style.color = 'green';
          }
          else {
            errormsg.innerHTML = 'Invalid Passport_number';
            errormsg.style.color = 'red';
          }
        }

      }
    };
    xhttp.open("POST", "include/signup.inc.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("passport_number_=" + passport_number);
  }
}

//validations
function checkAll() {

  for (var option of document.getElementById("telephone_numbers_list").options) {
    document.getElementById("telephone_numbers").value+=option.value + ',';
  }

  let error_count = 0;
  if (!validateName(first_name.value)) {
    error_count++;
    first_nameListner()
  }
  if (!validateName(last_name.value)) {
    error_count++;
    last_nameListner();
  }
  if (!validateUsername(username.value)) {
    error_count++;
    usernameListner();
  }
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
  if (telephone_numbers.value == '') {
    error_count++;
    // console.log('telephone');
    document.getElementById('telephone_val').innerHTML = 'Empty telephone number!';
    document.getElementById('telephone_val').style.color = 'red';
  }
  // if(!validateNIC(NIC.value)){
  //   error_count++;
  // }
  if (!validatepassport_number(passport_number.value)) {
    error_count++;
    passport_numberListner();
  }
  if (!validateDate(dob.value)) {
    // console.log(dob.value);
    // console.log(validateDate(dob.value));
    // console.log( new Date());
    error_count++;
    dobListner();
  }
  if (!validateEmail(email.value)) {
    error_count++;
    emailListner();
  }
  checkUserName();
  checkPassportNo();

  if (usedUsername) {
    error_count++;
    let errormsg = document.getElementById('username_val');
    errormsg.innerHTML = 'Username is already used!';
    errormsg.style.color = 'red';
    console.log('username used');
  }
  if (usedPassportNo) {
    error_count++;
    let errormsg = document.getElementById('passport_number_val');
    errormsg.innerHTML = 'passport_number is already used!';
    errormsg.style.color = 'red';
    // console.log('password used');

  }
  // console.log(error_count);
  if (error_count == 0) {
    document.getElementById('signup_form').submit();
    // console.log(error_count);
  } else {
    document.getElementById("telephone_numbers").value="";
    alert('Enter the correct details');

  }


}

//telephone number validation
function validateTelphoneNumber(tpno) {
  // let pattern = /^((\+94)|(0))([0-9]{9})$/;
  let pattern = /^[\+a-zA-Z0-9\-().\s]{10,15}$/;
  return (pattern.test(tpno));
}

//firstname validation
function validateName(name) {
  let pattern = /^(([A-Z])|([a-z]))([a-z]+)$/;
  return (pattern.test(name));
}

//username validation
function validateUsername(name) {
  let pattern = /^([\w\W\d]+){1,}$/;
  return (pattern.test(name));
}
//password validation
function validatePassword(password) {
  let pattern = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;
  return (pattern.test(password));
}
// //nic validation
// function validateNIC(nic){
//   let pattern = /^([0-9]{9}[x|X|v|V]|[0-9]{12})$/;
//   return (pattern.test_email.php(nic));
// }
//passport number validation
function validatepassport_number(passport_number) {
  let pattern = /^[A-PR-WYa-pr-wy][1-9]\d\s?\d{4}[1-9]$/;
  return (pattern.test(passport_number));
}
//address validation
// function validateAddress(address){
//   return address.length>0;
// }
//date of birth validation
function validateDate(date) {
  let dob = new Date(date);
  let today = new Date();
  let minimum = new Date('1900-01-01')
  return (dob < today) && (dob>minimum);

}

//email validation
function validateEmail(email) {
  let pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  return (pattern.test(email));
}


