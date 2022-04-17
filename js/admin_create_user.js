function ShowRadioButtonDiv (IdBaseName, NumberOfButtons) {
    for (x=1;x<=NumberOfButtons;x++) {
        CheckThisButton = IdBaseName + x;
        ThisDiv = IdBaseName + x +'Div';
    if (document.getElementById(CheckThisButton).checked) {
        document.getElementById(ThisDiv).style.display = "block";
        }
    else {
        document.getElementById(ThisDiv).style.display = "none";
        }
    }
    return false;
}

//telephone number validation
function validateTelphoneNumber(tpno){
    // let pattern = /^((\+94)|(0))([0-9]{9})$/;
    let pattern = /^[\+a-zA-Z0-9\-().\s]{10,15}$/;
    return (pattern.test(tpno));
}

var fd_telephone_numbers = document.getElementById('fd_telephone_numbers');
var oa_telephone_numbers = document.getElementById('oa_telephone_numbers');
function add_fd_telephone(){
    let fd_telephone = document.getElementById('fd_telephone');
    let fd_errormsg = document.getElementById('fd_telephone_val');

    if(validateTelphoneNumber(fd_telephone.value)){
        let fd_telephone_number_list = document.getElementById('fd_telephone_numbers_list');
        let option = document.createElement("option");
        option.text = fd_telephone.value;
        console.log(option.text);
        fd_telephone_number_list.appendChild(option);
        fd_telephone_numbers.value+=fd_telephone.value+',';
        fd_telephone.value='';
    }else{
        fd_errormsg.innerHTML = 'Invalid telephone!';
        fd_errormsg.style.color = 'red';
        document.getElementById('fd_add').disabled = true;
    }
}

function add_oa_telephone(){
    let oa_telephone = document.getElementById('oa_telephone');
    let oa_errormsg = document.getElementById('oa_telephone_val');

    if(validateTelphoneNumber(oa_telephone.value)){
        let oa_telephone_number_list = document.getElementById('oa_telephone_numbers_list');
        let option = document.createElement("option");
        option.text = oa_telephone.value;
        console.log(option.text);
        oa_telephone_number_list.appendChild(option);
        oa_telephone_numbers.value+=oa_telephone.value+',';
        oa_telephone.value='';
    }else{
        oa_errormsg.innerHTML = 'Invalid telephone!';
        oa_errormsg.style.color = 'red';
        document.getElementById('oa_add').disabled = true;
    }
}