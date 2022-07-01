function cancel_booking(booking_id){
    console.log(booking_id);
    let booking = document.getElementById('booking');
    booking.value = booking_id;
    document.getElementById('bookingform').submit();
}

function filter(){
    let destination = document.getElementById('destination');


    let table = document.getElementById('bookingtable');

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
        xhttp.open("POST", "include/passenger_flight_booking_details.inc.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("dest="+destination.value);
    }


}