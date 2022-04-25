var destination = document.getElementById('destination');
var departure_date_time = document.getElementById('departure_date_time')
var arrival_date_time = document.getElementById('arrival_date_time');
var tail_no = document.getElementById('tail_no')

var incorrectTailNo = false;

function validateTailNo(responseElementID, postingPage, tailNo, variableValue){
    let responseElement = document.getElementById(responseElementID);

    if (variableValue.length == 0) {
        responseElement.innerHTML = 'Invalid tail number';
    } else {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == 'error') {
                    incorrectTailNo = true;
                    responseElement.innerHTML = this.responseText;
                    responseElement.style.color = 'red';
                }
                else{
                    
                    incorrectTailNo = false;
                    responseElement.innerHTML = 'Valid tail number';
                    responseElement.style.color = 'green';
                }
                // responseElement.innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", postingPage, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(tailNo + "=" + variableValue);
    }
}