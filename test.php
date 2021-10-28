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
    Imię dziecka: <input type="text" name="fname">
    <button type="submit">Sprawdź</button>
</form>
<?
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['fname'];
    if (empty($name)) {
        echo "Sorry name is empty";
    }
}
?>

<script>
    var ok = new Image;
    var nok = new Image;
    ok.src = 'ok.png'
    nok.src = 'nok.png'

    fetch("peopleData.json")
        .then(response => response.json())
        .then(data => {
            for (var i = 0; i < data.length; i++) {

                if (data[i].first_name == "<?php echo $name; ?>") {
                    var name_children = data[i].first_name
                    var age_children = data[i].age
                    var height_children = data[i].height

                    document.getElementById("id_first_name").innerHTML = data[i].first_name;
                    document.getElementById("id_last_name").innerHTML = data[i].last_name;
                    document.getElementById("id_gender").innerHTML = data[i].gender;
                    document.getElementById("id_age").innerHTML = data[i].age;
                    document.getElementById("id_height").innerHTML = data[i].height;

                    if (data[i].gender == "M") {
                        fetch("normForMen.json")
                            .then(response => response.json())
                            .then(data => {
                                    var max_height = (data[age_children].max)
                                    var min_height = (data[age_children].min)
                                    document.getElementById("id_max").innerHTML = max_height;
                                    document.getElementById("id_min").innerHTML = min_height;
                                    if (height_children >= min_height && height_children <= max_height) {
                                        document.getElementById("id_result").innerHTML = (name_children +" height is correct")
                                    } else {
                                        document.getElementById("id_result").innerHTML = (name_children +" height is incorrect. Height is"+height_children+" cm and should be between "+min_height+ "and "+max_height+"cm")
                                    }
                                }
                            )
                    } else {
                        fetch("normForWomen.json")
                            .then(response => response.json())
                            .then(data => {
                                    var max_height = (data[age_children].max)
                                    var min_height = (data[age_children].min)
                                    document.getElementById("id_max").innerHTML = max_height
                                    document.getElementById("id_min").innerHTML = min_height
                                    if (height_children >= min_height && height_children <= max_height) {
                                        document.getElementById("id_result").innerHTML = (name_children +" height is correct")
                                    } else {
                                        document.getElementById("id_result").innerHTML = (name_children +" height is incorrect. Height is "+height_children+"cm and should be between "+min_height+ "and "+max_height+"cm")

                                    }

                                }
                            )
                    }
                }
            }
        })
</script>
<br><br>
name:
<div id="id_first_name"></div>
<br>
last name:
<div id="id_last_name"></div>
<br>
gender:
<div id="id_gender"></div>
<br>
age:
<div id="id_age"></div>
<br>
height:
<div id="id_height"></div>
<br>
Max:
<div id="id_max"></div>
<br>
Min:
<div id="id_min"></div>
<br>
RESULTS:
<div id="id_result" style="color: #3737bf"></div>
<br>


</div>
</body>
</html>
