<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible">
    <title> zadanie</title>
</head>
<link rel="stylesheet" href="styleCss.css"/>
<body id="body">
<div id="container">
</div>
<form class="form" method="post">
       Imię: <input type="text"  name="name">
    <button type="submit">Wyślij</button>
</form>

<script>
    console.log("hello its me")
    fetch("peopleData.json")
    .then(response => response.json())
    .then(data =>{
        console.log(data)
        for(var i=0; i<data.length; i++)
        {
            if(data[i].first_name=='Timmy')
            {
                console.log(data[i])
                document.getElementById("id_first_name").innerHTML =data[i].first_name;
                document.getElementById("id_last_name").innerHTML =data[i].last_name;
                document.getElementById("id_gender").innerHTML =data[i].gender;
                document.getElementById("id_age").innerHTML =data[i].age;
                document.getElementById("id_height").innerHTML =data[i].height;
                break;
            }
        }
    })


</script>
<div id="id_first_name"></div>
<div id="id_last_name"></div>
<div id="id_gender"></div>
<div id="id_age"></div>
<div id="id_height"></div>

</div>
</body>
</html>
