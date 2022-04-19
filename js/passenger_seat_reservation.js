function addTicketPrice(seatno, platinum_Seats,buisness_seats, economy_Seats, platinumPrice, businessPrice, economyPrice){
    let ticketprice = document.getElementById('ticketprice');
    let ticket_price = document.getElementById('ticket_price');
    let seat_no = document.getElementById('seat_no');
    let seatno_ = document.getElementById('seatno');
    let seattype=document.getElementById('seattype');
    let seat_type=document.getElementById('seat_type');
    
    seat_no.value = seatno;

    if(seatno<=platinum_Seats){
        ticket_price.value = platinumPrice;
        seattype.value = 'Platinum Class';
        seat_type.value = 2;
    }else if(seatno<=platinum_Seats+buisness_seats){
        ticket_price.value = businessPrice;
        seattype.value = 'Business Class';
        seat_type.value = 1;
    }else if(seatno<=platinum_Seats+buisness_seats+economy_Seats){
        ticket_price.value = economyPrice;
        seattype.value = "Economy Class";
        seat_type.value = 0;
    }
    seatno_.value = seat_no.value;
    ticketprice.value = ticket_price.value;
}
function checkSeatAvailability(){
  
    let seatno = document.getElementById('seat').value;
    let flightid = document.getElementById('flightid').value;
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        // responseElement.innerHTML = this.responseText;
            console.log(this.responseText);
            if(this.responseText=='alreadybooked'){
                alert('Seat is already booked!!!');
                location.reload();
            }else{
                document.getElementById('seatbooking').submit();
            console.log(this.responseText);

            }
        
        }
    };
    xhttp.open("POST", 'include/passenger_seat_reservation.inc.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('seatno-flightid'+"="+seatno+'-'+flightid);
    
  }