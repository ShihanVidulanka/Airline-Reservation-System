<?php
class Cancel_Booking_Controller extends Cancel_Booking_Model{
    public function cancel_booking($booking_id)
    {
       $this->cancel_booking_from_model(remove_unnessaries($booking_id));
    }
}
