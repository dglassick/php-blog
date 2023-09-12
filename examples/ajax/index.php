<!DOCTYPE html>
<html>
<head>
    <title>My website</title>
    <meta charset="utf-8">
    <style>
        dt { float: left; clear: left; width: 8em; }
        dd { height: 1.2em; }
    </style>
</head>
<body>

<h1>Ajax example</h1>

<dl>
    <dt>Name</dt>
    <dd id="name"></dd>

    <dt>email</dt>
    <dd id="email"></dd>

    <dt>Date of birth</dt>
    <dd id="dob"></dd>
</dl>

<button id="btn">Get data</button>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script>
    $("#btn").on("click", function() {

        $.ajax("getdata.php")
            .done(function(data) {

                var json = JSON.parse(data);

                $("#name").html(json.name);
                $("#email").html(json.email);
                $("#dob").html(json.dob);
            });
       });
</script>

</body>
</html>
