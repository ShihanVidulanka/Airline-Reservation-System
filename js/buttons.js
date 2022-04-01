// Onclick function for the relavant button
function clickView(arg, path) { 
    post(path, {
        variablePass1: arg
    });
}
//
/**
* Dynamically creates form elements and adds to $_POST
* path     : the path to send the post request to
* params   : The variables to be passed
* method   : the method to use on the form default set to 'post'
*/
function post(path, params, method = 'post') {
    const form = document.createElement('form');
    form.method = method;
    form.action = path;

    for (const key in params) {
        if (params.hasOwnProperty(key)) {
            const hiddenField = document.createElement('input');
            hiddenField.type = 'hidden';
            hiddenField.name = key;
            hiddenField.value = params[key];

            form.appendChild(hiddenField);
        }
    }
    document.body.appendChild(form);
    form.submit();
}