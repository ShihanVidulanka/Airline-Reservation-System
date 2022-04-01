var telephone_number_str='';
function addtelephone(){
    var telephone = document.getElementById('telephone');
    var telephone_number_list = document.getElementById('telephone_numbers_list');
    var telephone_numbers = document.getElementById('telephone_numbers');

    var option = document.createElement("option");
    option.text = telephone.value;
    console.log(option.text);
    telephone_number_list.appendChild(option);

    telephone_numbers.value+=telephone.value+',';
}