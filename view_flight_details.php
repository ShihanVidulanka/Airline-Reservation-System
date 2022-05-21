<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JavaScript Radio Button</title>
</head>

<body>
    <form name="formA">
        <input type="radio" name="myradio" value="A" />
        <input type="radio" name="myradio" value="B" />
        <input type="radio" name="myradio" value="C" />
        <input type="radio" name="myradio" value="D" />
        <div id="he"></div>
    </form>

    <input type="datetime-local" id="txtDate" min="2022-05-21T16:30"; ?>">
    
    <script>
        var radios = document.forms["formA"].elements["myradio"];
        for (var i = 0, max = radios.length; i < max; i++) {
            radios[i].onclick = function() {
                document.getElementById('he').innerHTML = this.value;

            }
        }
    </script>
</body>

</html>