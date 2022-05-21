var destination = document.getElementById('destination');
var departure_date_time = document.getElementById('departure_date_time')
var arrival_date_time = document.getElementById('arrival_date_time');
var tail_no = document.getElementById('tail_no')

var incorrectTailNo = false;

function getTableOfFreePlanes(responseElementID, postingPage, dateTime, variableValue) {

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

    document.getElementByName("radio1").setAttribute("disabled", "disabled");
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

function valdiatePrice(responseElementID, variableValue) {
    let isnum = /^\d+$/.test(variableValue);
    
    if (variableValue.length == 0 || variableValue == null || isnum==false || variableValue<0 || variableValue>1000000) {
        document.getElementById(responseElementID).innerHTML = "Invalid Price";
        document.getElementById(responseElementID).style.color = 'Red';
        return;
    }else{
        document.getElementById(responseElementID).innerHTML = "Valid Price";
        document.getElementById(responseElementID).style.color = 'green';
        return;
    }
}