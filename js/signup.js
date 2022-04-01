var telephone_number_str='';
function addtelephone(){
    var telephone = document.getElementById('telephone');
    var telephone_number_list = document.getElementById('telephone_numbers_list');
    var telephone_numbers = document.getElementById('telephone_numbers');

    var option = document.createElement("option");
    option.text = telephone.value;
    console.log(option.text);
    telephone_number_list.appendChild(option);

    telephone_numbers.value+=telephone.value+',';
}

function checkUserName() {
    var username=document.getElementById('username').value;
    // console.log(username);
    // var xhttp = new XMLHttpRequest();
    // xhttp.onreadystatechange = function() {
    //   if (this.readyState == 4 && this.status == 200) {
    //     document.getElementById("usernamewarning").innerHTML = this.responseText;
    //   }
    // };
    // xhttp.open("POST", "class/model/check_username_model.class.php", true);
    // xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // xhttp.send("username_c="+username);

    if (username.length == 0) {
        document.getElementById("invalid").innerHTML = "";
        document.getElementById('valid').style.display="block";
        document.getElementById('invalid').style.display="none";

        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("invalid").innerHTML = this.responseText;
            document.getElementById('valid').style.display="none";
            document.getElementById('invalid').style.display="block";
          }
        };
        xmlhttp.open("GET", "include/signup.inc.php?username=" + username, true);
        xmlhttp.send();
      }
  }