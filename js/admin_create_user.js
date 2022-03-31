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

$(document).ready(function() {
    var maxField = 5; //Input fields increment limitation
    var addButton = $('.add_button_aa'); //Add button selector
    var wrapper = $('#aa_p'); //Input field wrapper
    var fieldHTML = '<div><input required class="form-control" type="text" name="plane" id="plane" placeholder="Enter Phone Number:" value="" /><div class="valid-feedback">Valid Number</div><div class="invalid-feedback">Invalid Number</div><a href="javascript:void(0);" class="remove_button"><img src="img/remove_icon.png"/></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function() {
        //Check maximum number of input fields
        if (x < maxField) {
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e) {
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});

$(document).ready(function() {
    var maxField = 5; //Input fields increment limitation
    var addButton = $('.add_button_fd'); //Add button selector
    var wrapper = $('#fd_p'); //Input field wrapper
    var fieldHTML = '<div><input required class="form-control" type="text" name="plane" id="plane" placeholder="Enter Phone Number:" value="" /><div class="valid-feedback">Valid Number</div><div class="invalid-feedback">Invalid Number</div><a href="javascript:void(0);" class="remove_button"><img src="img/remove_icon.png"/></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function() {
        //Check maximum number of input fields
        if (x < maxField) {
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e) {
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});

$(document).ready(function() {
    var maxField = 5; //Input fields increment limitation
    var addButton = $('.add_button_oa'); //Add button selector
    var wrapper = $('#oa_p'); //Input field wrapper
    var fieldHTML = '<div><input required class="form-control" type="text" name="plane" id="plane" placeholder="Enter Phone Number:" value="" /><div class="valid-feedback">Valid Number</div><div class="invalid-feedback">Invalid Number</div><a href="javascript:void(0);" class="remove_button"><img src="img/remove_icon.png"/></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function() {
        //Check maximum number of input fields
        if (x < maxField) {
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e) {
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});