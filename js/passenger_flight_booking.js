function sendFlightId(id){
    let flightId = document.getElementById('flight_id');
    flightId.value = id;
    document.getElementById('flight_id_form').submit();
}

function checkPassportNo() {
    let passport_number=document.getElementById('passport_number').value;
    let errormsg = document.getElementById('passport_number_val')

    // console.log(passport_number);
    if (passport_number.length == 0) {
      return;
    } else {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

        }
      };
      xhttp.open("POST", "include/signup.inc.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("passport_number_="+passport_number);
  }
}