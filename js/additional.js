function ajaxPost(responseElementID,postingPage,postVariableName,postVariableVAlue){
    let responseElement = document.getElementById(responseElementID);
  
    // console.log(destination.value);
    if(postVariableVAlue==''){
        responseElement.innerHTML = '';
    }else{
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        responseElement.innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", postingPage, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(postVariableName+"="+postVariableVAlue);
    }
  }
