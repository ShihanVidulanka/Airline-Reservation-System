function cancel_booking(booking_id){
    console.log(booking_id);
    let booking = document.getElementById('booking');
    booking.value = booking_id;
    document.getElementById('bookingform').submit();
}