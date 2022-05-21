var destination = document.getElementById('destination');
var departure_date_time = document.getElementById('departure_date_time');
var arrival_date_time = document.getElementById('arrival_date_time');
var tail_no = document.getElementById('tail_no');
var economy_price = document.getElementById('economy_price');
var business_price = document.getElementById('business_price');
var platinum_price = document.getElementById('platinum_price');

var incorrectDepartureDate = false;
var incorrectArrivalDate = false;
var incorrectEconomyPrice = false;
var incorrectPlatinumPrice = false;
var incorrectBusinessPrice = false;

arrival_date_time.addEventListener("input", function () { arrivalDateListner() });
departure_date_time.addEventListener("input", function () { departureDateListner() });
economy_price.addEventListener("input", function () { economyPriceListner() });
business_price.addEventListener("input", function () { businessPriceListner() });
platinum_price.addEventListener("input", function () { platinumPriceListner() });

function departureDateListner() {
    let responseElement = document.getElementById("departure_date_validation");
    
    if(checkCurrentDate(departure_date_time.value)){
        incorrectDepartureDate = true;
        responseElement.innerHTML = "Invalid date";
        responseElement.style.color = 'Red';
        return;
    }else{
        incorrectDepartureDate = false;
        responseElement.innerHTML = "Valid date";
        responseElement.style.color = 'Green';
        return;
    }
}

function economyPriceListner() {
    let responseElement = document.getElementById("economy_validation");

    if (!valdiatePrice(economy_price.value)) {
        incorrectEconomyPrice = true;
        responseElement.innerHTML = "Invalid Price";
        responseElement.style.color = 'Red';
        return;
    }else{
        incorrectEconomyPrice = false;
        responseElement.innerHTML = "Valid Price";
        responseElement.style.color = 'Green';
        return;
    }
}

function businessPriceListner() {
    let responseElement = document.getElementById("business_validation");
    
    if (!valdiatePrice(business_price.value)) {
        incorrectBusinessPrice = true;
        responseElement.innerHTML = "Invalid Price";
        responseElement.style.color = 'Red';
        return;
    }else{
        incorrectBusinessPrice = false;
        responseElement.innerHTML = "Valid Price";
        responseElement.style.color = 'Green';
        return;
    }
}

function platinumPriceListner() {
    let responseElement = document.getElementById("platinum_validation");
    
    if (!valdiatePrice(platinum_price.value)) {
        incorrectPlatinumPrice = true;
        responseElement.innerHTML = "Invalid Price";
        responseElement.style.color = 'Red';
        return;
    }else{
        incorrectPlatinumPrice = false;
        responseElement.innerHTML = "Valid Price";
        responseElement.style.color = 'Green';
        return;
    }
}

function arrivalDateListner() {
    let responseElement = document.getElementById("arrival_date_validation");

    if (checkDepartureDateEmpty(departure_date_time.value)) {
        responseElement.innerHTML = "Please select departure date";
        responseElement.style.color = 'Red';
        return;
    }
    else if (checkValidArrivalDate()) {
        responseElement.innerHTML = "Invalid Time";
        responseElement.style.color = 'Red';
        return;
    } else {
        responseElement.innerHTML = "Valid Time";
        responseElement.style.color = 'green';
        return;
    }
}

function changeContent1(responseElementID, postingPage, dateTime) {

    let variableValue = document.getElementById("departure_date_time").value;

    document.getElementById('tail_no_val').style.display = "block";

    if (variableValue.length == 0 || variableValue == null) {
        document.getElementById(responseElementID).innerHTML = "Please Select the Departure Date and Time";
        document.getElementById(responseElementID).style.color = 'Red';
        document.getElementById(responseElementID).style.border = 'none';
        return;
    }

    document.getElementById("show1").classList.remove("hide");
    document.getElementById("show2").classList.add("hide");

    const xhttp = new XMLHttpRequest();

    xhttp.onload = function () {
        let array = JSON.parse(this.responseText);

        var tBody = document.getElementById("tBody");

        let i = 0;
        let arrayLength = array.length;
        do {
            var row = tBody.insertRow(0);

            let arrayElement = array[i];

            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            var cell6 = row.insertCell(5);
            var cell7 = row.insertCell(6);
            var cell8 = row.insertCell(7);

            var arrival_timedate = arrayElement['arrival_time'];

            var dateTime = new Date(arrival_timedate);
            var arrival_date = dateTime.toLocaleDateString();
            var arrival_time = dateTime.toLocaleTimeString();

            var tail_no = arrayElement['tail_no'];
            addOptionToFreePlanesDropDown(tail_no);

            cell1.innerHTML = tail_no;
            cell2.innerHTML = arrayElement['origin'];
            cell3.innerHTML = arrayElement['destination'];
            cell4.innerHTML = arrayElement['departure_date'];
            cell5.innerHTML = arrayElement['departure_time'];
            cell6.innerHTML = arrayElement['flight_time'];
            cell7.innerHTML = arrival_date;
            cell8.innerHTML = arrival_time;

            i++;
        } while (i < arrayLength);

    }

    xhttp.open("POST", postingPage, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(dateTime + "=" + variableValue);

    document.getElementById("radio1").setAttribute("disabled", "disabled");
}

function changeContent2(freeResponseElementID, postingPage, freeDateTime) {
    let freeVariableValue = document.getElementById("departure_date_time").value;

    if (freeVariableValue.length == 0 || freeVariableValue == null) {
        console.log('sss');
        document.getElementById('tail_no_val').style.display = 'block';
        document.getElementById(freeResponseElementID).innerHTML = "Please Select the Departure Date and Time";
        document.getElementById(freeResponseElementID).style.color = 'Red';
        document.getElementById(freeResponseElementID).style.border = 'none';
        return;
    }
    document.getElementById("show1").classList.add("hide");
    document.getElementById("show2").classList.remove("hide");


    const xhttp = new XMLHttpRequest();

    xhttp.onload = function () {
        let freeArray = JSON.parse(this.responseText);

        let freeIndex = 0;
        let free_arrayLength = freeArray.length;

        do {
            let freeArrayElement = freeArray[freeIndex];
            var new_plane_tail_no = freeArrayElement['tail_no'];
            addOptionToNewPlanesDropDown(new_plane_tail_no);
            freeIndex++;
        } while (freeIndex < free_arrayLength);
    }

    xhttp.open("POST", postingPage, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(freeDateTime + "=" + freeVariableValue);
}


function addOptionToFreePlanesDropDown(textOption) {
    var dropDown = document.getElementById("tail_no");
    var option = document.createElement("option");
    option.text = textOption;
    dropDown.add(option);
}

function addOptionToNewPlanesDropDown(textOption) {
    var dropDown = document.getElementById("free_tail_no");
    var option = document.createElement("option");
    option.text = textOption;
    dropDown.add(option);
}

function valdiatePrice(variableValue) {
    let isnum = /^\d+$/.test(variableValue);

    if (variableValue.length == 0 || variableValue == null || isnum == false || variableValue < 0 || variableValue > 1000000) {
        return false;
    } else {
        return true;
    }
}

function checkValidArrivalDate() {
    const departure = new Date(departure_date_time.value);
    let dTime = departure.getTime();

    const arrival = new Date(arrival_date_time.value);
    let aTime = arrival.getTime();

    if (dTime > aTime || (aTime - dTime) > 86400000 || checkCurrentDate(departure)) {
        return true;
    }else {
        return false;
    }
}

function checkDepartureDateEmpty() {
    return (departure_date_time.value == null || departure_date_time.value == '');
}

function checkCurrentDate(date) {
    const slectedDate = new Date(date);
    let slectedDateTime = slectedDate.getTime();

    const today = new Date();
    let todayDateTime = today.getTime();

    return (slectedDateTime < todayDateTime);
}

function checkAll() {
    let error_count = 0;

    if (incorrectDepartureDate) {
        error_count++;
    }
    if (incorrectArrivalDate) {
        error_count++;
    }
    if (incorrectEconomyPrice) {
        error_count++;
    }
    if (incorrectPlatinumPrice) {
        error_count++;
    }
    if (incorrectBusinessPrice) {
        error_count++;
    }
    //console.log(error_count);
    if (error_count != 0) {
        alert('Enter the correct details')
    }else{
        document.getElementById("add_new_flight_form").submit();
    }
}