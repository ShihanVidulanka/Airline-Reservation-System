function addtelephone(){

    let telephone = document.getElementById('telephone');
    if(validateTelphoneNumber(telephone.value)){
    let telephone_number_list = document.getElementById('telephone_numbers_list');
    let telephone_numbers = document.getElementById('telephone_numbers');

    let option = document.createElement("option");
    option.text = telephone.value;
    console.log(option.text);
    telephone_number_list.appendChild(option);

    telephone_numbers.value+=telephone.value+',';
    }
}

function checkUserName() {
    let username=document.getElementById('username').value;
    let errormsg = document.getElementById('username_val')

    if (username.length == 0) {
      errormsg.innerHTML = "";
      return;
    } else {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          if(this.responseText=='error'){
            errormsg.innerHTML='Username is already used!'
            errormsg.style.color = 'red';
          }else{
            if(validateUsername(username)){
              errormsg.innerHTML='Valid Username';
              errormsg.style.color = 'green';
            }
            else{
              errormsg.innerHTML = 'Invalid Username';
              errormsg.style.color=  'red';
            }
          }

        }
      };
      xhttp.open("POST", "include/signup.inc.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("username_="+username);
  }
}
function checkTpNo() {
    let telephone=document.getElementById('telephone').value;
    let errormsg = document.getElementById('telephone_val')
    if (telephone.length == 0) {
      errormsg.innerHTML = "";
      return;
    } else {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          if(this.responseText=='error'){
            document.getElementById('add').disabled = true;
            errormsg.innerHTML = "This number is already taken!";
            errormsg.style.color='red';
          }else{
            document.getElementById('add').disabled = false;
            if(validateTelphoneNumber(telephone)){
              errormsg.innerHTML = "Valid Telephone Number!";
              errormsg.style.color = "green";
              document.getElementById('add').disabled=false;


            }else{
              errormsg.innerHTML = "Invalid Telephone Number!";
              errormsg.style.color='red';
              document.getElementById('add').disabled=true;

            }
          }
        }
      };
      xhttp.open("POST", "include/signup.inc.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("tpno_="+telephone);
  }
}

//validations

//telephone number validation
function validateTelphoneNumber(tpno){
  let pattern = /^((\+94)|(0))([0-9]{9})$/;
  return (pattern.test(tpno));
}

//firstname validation
function validateName(name){
  let pattern = /^(([A-Z])|([a-z]))([a-z]+)$/;
  return (pattern.test(name));
}

//username validation
function validateUsername(name){
  let pattern = /^([\w\W\d]+)$/;
  return (pattern.test(name));
}
//password validation
function passwordValidation(password){
  let pattern = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;
  return (pattern.test(password));
}
//nic validation
function nicValidation(nic){
  let pattern = /^([0-9]{9}[x|X|v|V]|[0-9]{12})$/;
  return (pattern.test(nic));
}
//passport number validation
function passportNumberValidation(password){
  let pattern = /[a-zA-Z]{2}[0-9]{7}/;
  return (pattern.test(password));
}
//address validation
function addressalidation(password){
  return password.length>0;
}
//date of birth validation
function dateValidation(date){
  let dob = new Date(date);
  let today = new Date();
  return (dob<today);
  
}

//email validation
function emailValidation(email){
  let pattern = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
  return pattern.test(email);
}
