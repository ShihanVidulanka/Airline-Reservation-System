var airport_code = document.getElementById('airport_code');
var airport_name = document.getElementById('airport_name')
var province = document.getElementById('province');
var city = document.getElementById('city')

var usedAirportCode = false;

// airport_code.addEventListener("input", function () { airportCodeListner() });
airport_name.addEventListener("input", function () { airportNameListner() });
province.addEventListener("input", function () { provinceListner() });
city.addEventListener("input", function () { cityListner() });

// function airportCodeListner() {
//     let errormsg = document.getElementById("airport_code_val");

//     if (validateAirportCode(airport_code.value)) {
//         errormsg.innerHTML = 'Valid Airport Code!';
//         errormsg.style.color = 'green';
//     } else {
//         errormsg.innerHTML = 'Invalid Airport Code!';
//         errormsg.style.color = 'red';
//     }
// }

function airportNameListner() {
    let errormsg = document.getElementById("airport_name_val");

    if (validateAirportName(airport_name.value)) {
        errormsg.innerHTML = 'Valid Airport Name!';
        errormsg.style.color = 'green';
    } else {
        errormsg.innerHTML = 'Invalid Airport Name!';
        errormsg.style.color = 'red';
    }
}

//used the same function validateAirportName()
function provinceListner() {
    let errormsg = document.getElementById("province_val");

    if (validateAirportName(province.value)) {
        errormsg.innerHTML = 'Valid Province!';
        errormsg.style.color = 'green';
    } else {
        errormsg.innerHTML = 'Invalid Province!';
        errormsg.style.color = 'red';
    }
}

//used the same function validateAirportName()
function cityListner() {
    let errormsg = document.getElementById("city_val");

    if (validateAirportName(city.value)) {
        errormsg.innerHTML = 'Valid Airport Name!';
        errormsg.style.color = 'green';
    } else {
        errormsg.innerHTML = 'Invalid Airport Name!';
        errormsg.style.color = 'red';
    }
}

function validateAirportCode(airport_code) {
    let UpperPattern = /^[A-Z]*$/;
    // console.log(UpperPattern.test(airport_code));
    return (UpperPattern.test(airport_code) && airport_code.length == 3);

}

function validateAirportName(airport_name) {
    let pattern = /[a-zA-Z ]+/;
    return (pattern.test(airport_name) && airport_name.length > 0 && airport_name.length < 250);
}

function checkDuplicatesAirportCode(responseElementID, postingPage, airportCode, variableValue) {

    let responseElement = document.getElementById(responseElementID);

    if (variableValue.length == 0) {
        responseElement.innerHTML = 'Invalid Airport Code';
    } else {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (!validateAirportCode(variableValue)) {
                    usedAirportCode = false;
                    responseElement.innerHTML = 'Invalid Airport Code';
                    responseElement.style.color = 'red';
                }
                else if (this.responseText == 'error') {
                    // console.log(variableValue);
                    usedAirportCode = true;
                    responseElement.innerHTML = 'Airport Code is already used!'
                    responseElement.style.color = 'red';
                }
                else{
                    usedAirportCode = false;
                    responseElement.innerHTML = 'Valid Airport Code';
                    responseElement.style.color = 'green';
                }
                // responseElement.innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", postingPage, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(airportCode + "=" + variableValue);
    }
}

function checkAll() {
    // console.log(!validateAirportCode(airport_code.value));
    let error_count = 0;
    if (!validateAirportCode(airport_code.value)) {
        error_count++;
        // airportCodeListner();
    }
    if (!validateAirportName(airport_name.value)) {
        error_count++;
        airportNameListner();
    }//Same Function validateAirportName
    if (!validateAirportName(province.value)) {
        error_count++;
        provinceListner();
    }//Same Function validateAirportName
    if (!validateAirportName(city.value)) {
        error_count++;
        cityListner();
    }

    if (usedAirportCode) {
        error_count++;
    }

    // console.log(error_count);
    if (error_count == 0) {
        document.getElementById('add_new_airport_form').submit();
    } else {
        // console.log(error_count);
        alert('Enter the correct details')
    }

}