<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing page</title>
</head>
<body>
    <form action="">
        <!-- use ajaxPost function to realtime submiting for oninput event -->
        <input type="text" id="testinput" oninput="ajaxPost('response','postingPage.php','input',this.value)" >
        <p id="response"></p>
    </form>
    <script src="js/additional.js"></script>
</body>
</html>