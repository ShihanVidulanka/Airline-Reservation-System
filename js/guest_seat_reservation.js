//form validation cheching
var first_name = document.getElementById("first_name");
var last_name = document.getElementById("last_name");
var passport_number = document.getElementById("passport_number");
var telephone = document.getElementById("telephone");
var dob = document.getElementById("dob");

first_name.addEventListener("input", function () {
    first_nameListner();
});
last_name.addEventListener("input", function () {
    last_nameListner();
});
telephone.addEventListener("input", function () {
    telephoneListner();
});
dob.addEventListener("input", function () {
    dobListner();
});

function first_nameListner() {
    let errormsg = document.getElementById("first_name_val");
    if (validateName(first_name.value)) {
        errormsg.innerHTML = "Valid First Name!";
        errormsg.style.color = "green";
    } else {
        errormsg.innerHTML = "Invalid First Name!";
        errormsg.style.color = "red";
    }
}

function last_nameListner() {
    let errormsg = document.getElementById("last_name_val");
    if (validateName(last_name.value)) {
        errormsg.innerHTML = "Valid Last Name!";
        errormsg.style.color = "green";
    } else {
        errormsg.innerHTML = "Invalid Last Name!";
        errormsg.style.color = "red";
    }
}

function telephoneListner() {
    let errormsg = document.getElementById("telephone_val");
    if (validateTelphoneNumber(telephone.value)) {
        errormsg.innerHTML = "Valid telephone!";
        errormsg.style.color = "green";
    } else {
        errormsg.innerHTML = "Invalid telephone!";
        errormsg.style.color = "red";
    }
}

function passport_numberListner() {
    let errormsg = document.getElementById("passport_number_val");
    if (validatepassport_number(passport_number.value)) {
        errormsg.innerHTML = "Valid Passport Number!";
        errormsg.style.color = "green";
    } else {
        errormsg.innerHTML = "Invalid Passport Number!";
        errormsg.style.color = "red";
    }
}

function dobListner() {
    let errormsg = document.getElementById("dob_val");
    if (validateDate(dob.value)) {
        errormsg.innerHTML = "Valid Birthday!";
        errormsg.style.color = "green";
    } else {
        errormsg.innerHTML = "Invalid Birthday!";
        errormsg.style.color = "red";
    }
}

function checkPassportNo() {
    let passport_number = document.getElementById("passport_number").value;
    let errormsg = document.getElementById("passport_number_val");

    // console.log(passport_number);
    if (passport_number.length == 0) {
        errormsg.innerHTML = "Invalid Passport_number";
        return;
    }
}

//validations
function checkAll() {

    let error_count = 0;
    if (!validateName(first_name.value)) {
        error_count++;
        first_nameListner();
    }
    if (!validateName(last_name.value)) {
        error_count++;
        last_nameListner();
    }
    if (telephone.value == "") {
        error_count++;
        console.log("telephone");
        document.getElementById("telephone_val").innerHTML =
            "Empty telephone number!";
        document.getElementById("telephone_val").style.color = "red";
    }
    if (!validateTelphoneNumber(telephone.value)){
        error_count++;
        console.log("telephone");
        document.getElementById("telephone_val").innerHTML =
            "Invalid telephone number!";
        document.getElementById("telephone_val").style.color = "red";
    }
    if (!validatepassport_number(passport_number.value)) {
        console.log("passport_num");
        error_count++;
        passport_numberListner();
    }
    if (!validateDate(dob.value)) {
        error_count++;
        dobListner();
    }
    checkPassportNo();

    console.log(error_count);
    if (error_count == 0) {
        document.getElementById('seatbooking').submit();
    } else {
        alert("Enter the correct details");
    }
}

//telephone number validation
function validateTelphoneNumber(tpno) {
    // let pattern = /^((\+94)|(0))([0-9]{9})$/;
    let pattern = /^[\+a-zA-Z0-9\-().\s]{10,15}$/;
    return pattern.test(tpno);
}

//firstname validation
function validateName(name) {
    let pattern = /^(([A-Z])|([a-z]))([a-z]+)$/;
    return pattern.test(name);
}

//passport number validation
function validatepassport_number(passport_number) {
    let pattern = /^[A-PR-WYa-pr-wy][1-9]\d\s?\d{4}[1-9]$/;
    return pattern.test(passport_number);
}

//date of birth validation
function validateDate(date) {
    let dob = new Date(date);
    let today = new Date();
    return dob < today;
}

//check seat reservation
function addTicketPrice(seatno, platinum_Seats,buisness_seats, economy_Seats, platinumPrice, businessPrice, economyPrice){
    let ticketprice = document.getElementById('ticketprice');
    let ticket_price = document.getElementById('ticket_price');
    let seat_no = document.getElementById('seat_no');
    let seatno_ = document.getElementById('seatno');
    let seattype=document.getElementById('seattype');
    let seat_type=document.getElementById('seat_type');

    if (seatno!=0) {
        seat_no.value = seatno;

        if (seatno <= platinum_Seats) {
            ticket_price.value = platinumPrice;
            seattype.value = 'Platinum Class';
            seat_type.value = 2;
        } else if (seatno <= platinum_Seats + buisness_seats) {
            ticket_price.value = businessPrice;
            seattype.value = 'Business Class';
            seat_type.value = 1;
        } else if (seatno <= platinum_Seats + buisness_seats + economy_Seats) {
            ticket_price.value = economyPrice;
            seattype.value = "Economy Class";
            seat_type.value = 0;
        }
        seatno_.value = seat_no.value;
        ticketprice.value = ticket_price.value;

    }else {
        seattype.value = '';
        seat_type.value = '';
        seatno_.value="";
        ticketprice.value="";
    }
}
function checkSeatAvailability(){
    let seat = document.getElementById('seat').value;
    let seatno = document.getElementById('seat').value;
    let flightid = document.getElementById('flightid').value;
    if (seat!=0) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // responseElement.innerHTML = this.responseText;
                console.log(this.responseText);
                if (this.responseText == 'alreadybooked') {
                    alert('Seat is already booked!!!');
                    location.reload();
                } else {
                    checkAll();
                    // document.getElementById('seatbooking').submit();
                    // console.log(this.responseText);

                }

            }
        };
        xhttp.open("POST", 'include/guest_seat_reservation.inc.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send('seatno-flightid' + "=" + seatno + '-' + flightid);
    }else {
        alert("Please Select seat!!!");
    }
}