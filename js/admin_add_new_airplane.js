var tail_no = document.getElementById('tail_no');
var no_platinum_seats = document.getElementById('no_platinum_seats');
var no_economy_seats = document.getElementById('no_economy_seats');
var no_business_seats = document.getElementById('no_business_seats');
var imageFile = document.getElementById('file_up');

var usedTailNo = false;

no_platinum_seats.addEventListener("input", function () { platinumListner() });
no_economy_seats.addEventListener("input", function () { economyListner() });
no_business_seats.addEventListener("input", function () { businessListner() });
imageFile.addEventListener("input", function () { fileSizeListner() });

function platinumListner() {
    let errormsg = document.getElementById("no_platinum_seats_val");

    if (validateSeatNumber(no_platinum_seats.value)) {
        errormsg.innerHTML = 'Valid Seat No!';
        errormsg.style.color = 'green';
    } else {
        errormsg.innerHTML = 'Invalid Seat No!';
        errormsg.style.color = 'red';
    }
}

function economyListner() {
    let errormsg = document.getElementById("no_economy_seats_val");

    if (validateSeatNumber(no_economy_seats.value)) {
        errormsg.innerHTML = 'Valid Seat No!';
        errormsg.style.color = 'green';
    } else {
        errormsg.innerHTML = 'Invalid Seat No!';
        errormsg.style.color = 'red';
    }
}

function businessListner() {
    let errormsg = document.getElementById("no_business_seats_val");

    if (validateSeatNumber(no_business_seats.value)) {
        errormsg.innerHTML = 'Valid Seat No!';
        errormsg.style.color = 'green';
    } else {
        errormsg.innerHTML = 'Invalid Seat No!';
        errormsg.style.color = 'red';
    }
}

function fileSizeListner() {
    let errormsg = document.getElementById("file_up_val");
    if (validateFileSize(imageFile)) {
        errormsg.innerHTML = 'Valid File Size!';
        errormsg.style.color = 'green';
    } else {
        errormsg.innerHTML = 'Invalid File Size!';
        errormsg.style.color = 'red';
    }
}

function validateTailNo(tail_no) {
    if (!(/-/.test(tail_no))) {
        return false;
    } else {
        let wordsArray = tail_no.split("-");
        if (wordsArray.length !== 2) {
            return false;
        } else if (wordsArray[0].length !== 2 || wordsArray[1].length !== 4) {
            return false;
        } else if (!(/^[0-9]*$/).test(wordsArray[1])) {
            return false;
        } else if (!(/^[A-Z]*$/).test(wordsArray[0])) {
            return false;
        } else {
            return true;
        }
    }
}

function validateSeatNumber(seat_no) {
    pattern = /^[0-9]*$/;
    if (pattern.test(seat_no)) {
        if (seat_no > 0 && seat_no < 400) {
            return true;
        }
        return false;
    }
    return false;
}

function validateFileSize(imageFile) {
    var file = imageFile.files[0];
    // console.log(file.size<file.size<5*1048576);
    return (file.size > 0 && file.size < 5 * 1048576);
}

function checkDuplicatesTailNo(responseElementID, postingPage, variableName, tail_no) {

    let responseElement = document.getElementById(responseElementID);
    console.log('URAAAAA');
    if (tail_no.length == 0) {
        responseElement.innerHTML = 'Invalid Tail No';
    } else {
        console.log(this.responseText);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (!validateTailNo(tail_no)) {
                    usedTailNo = false;
                    responseElement.innerHTML = 'Invalid Tail No';
                    responseElement.style.color = 'red';
                }
                else if (this.responseText == 'error') {
                    console.log('Jay');
                    usedTailNo = true;
                    responseElement.innerHTML = 'Tail No is already used!'
                    responseElement.style.color = 'red';
                }
                else {
                    usedTailNo = false;
                    responseElement.innerHTML = 'Valid Tail No';
                    responseElement.style.color = 'green';
                }
                // responseElement.innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", postingPage, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(variableName + "=" + tail_no);
    }
}

function checkAll() {

    let error_count = 0;
    if (!validateTailNo(tail_no.value)) {
        error_count++;
    }
    if (!validateSeatNumber(no_business_seats.value)) {
        error_count++;
        businessListner();
    }
    if (!validateSeatNumber(no_platinum_seats.value)) {
        error_count++;
        platinumListner();
    }
    if (!validateSeatNumber(no_economy_seats.value)) {
        error_count++;
        economyListner();
    }

    if (usedTailNo) {
        error_count++;
    }

    console.log(error_count);
    if (error_count == 0) {
        document.getElementById('add_new_airplane_form').submit();
    } else {
        // console.log(error_count);
        alert('Enter the correct details')
    }

}