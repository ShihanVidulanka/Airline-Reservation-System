function sendFlightId(id){
    let flightId = document.getElementById('flight_id');
    flightId.value = id;
    document.getElementById('flight_id_form').submit();
}

var destination = document.getElementById('destination');
destination.addEventListener('change',function(){changeTable()});

function changeTable(){
  let table = document.getElementById('flightTable');

  console.log(destination.value);
  if(destination.value==''){
      table.innerHTML = this.responseText;
  }else{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      table.innerHTML = this.responseText;
      }
  };
  xhttp.open("POST", "include/passenger_flight_booking.inc.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("destination="+destination.value);
  }
}

