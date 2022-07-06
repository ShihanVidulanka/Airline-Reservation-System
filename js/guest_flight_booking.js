function sendFlightId(id) {
    isGuest = confirm("Are you sure you want to continue as guest?");
    if (isGuest){
        let flightId = document.getElementById('flight_id');
        flightId.value = id;
        // console.log(flightId.value);
        document.getElementById('flight_id_form').submit();
    }
    else {
        window.location.replace('./login.php');
    }
}

var destination = document.getElementById('destination');
destination.addEventListener('change', function () { changeTable() });

function changeTable() {
    let table = document.getElementById('flightTable');

    console.log(destination.value);
    if (destination.value == '') {
        table.innerHTML = this.responseText;
    } else {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                table.innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", "include/guest_flight_booking.inc.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("destination=" + destination.value);
    }
}

