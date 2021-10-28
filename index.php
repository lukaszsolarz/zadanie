<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible">
    <title> zadanie</title>
    <link rel="stylesheet" href="style.css"/>

</head>
<body id="body">
</div>
<form class="form" method="post">
    Imię dziecka: <input type="text" name="fname">
    <button type="submit">Sprawdź</button>
</form>
<?
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['fname'];
    if (empty($name)) {
        echo '<div id="id_warning">Proszę wprowadzić imię dziecka</div>';
    }
}
?>
<script>

    function show_ok_icon() {
        var ok_icon = document.createElement("IMG");
        ok_icon.setAttribute("src", "ok.png");
        ok_icon.setAttribute("width", "40");
        ok_icon.setAttribute("height", "40");
        document.body.appendChild(ok_icon)
    }

    function show_Nok_icon() {
        var nok_icon = document.createElement("IMG");
        nok_icon.setAttribute("src", "nok.png");
        nok_icon.setAttribute("width", "40");
        nok_icon.setAttribute("height", "40");
        document.body.appendChild(nok_icon)
    }

    fetch("peopleData.json")
        .then(response => response.json())
        .then(data => {
            for (var i=0; i<data.length; i++) {

                if (data[i].first_name == "<?php echo $name; ?>") {
                    var name_children = data[i].first_name
                    var age_children = data[i].age
                    var height_children = data[i].height

                    if (data[i].gender == "M") {
                        fetch("normForMen.json")
                            .then(response => response.json())
                            .then(data => {
                                    var max_height = (data[age_children].max)
                                    var min_height = (data[age_children].min)
                                    if (height_children >= min_height && height_children <= max_height) {
                                        document.getElementById("id_result").innerHTML = (name_children + " height is correct")
                                        show_ok_icon();
                                    } else {
                                        document.getElementById("id_result").innerHTML = (name_children + " height is incorrect. Height is " + height_children + "cm and should be between " + min_height + " and " + max_height + "cm")
                                        show_Nok_icon();
                                    }
                                }
                            )
                    } else {
                        fetch("normForWomen.json")
                            .then(response => response.json())
                            .then(data => {
                                    var max_height = (data[age_children].max)
                                    var min_height = (data[age_children].min)
                                    if (height_children >= min_height && height_children <= max_height) {
                                        document.getElementById("id_result").innerHTML = (name_children + " height is correct")
                                        show_ok_icon();
                                    } else {
                                        document.getElementById("id_result").innerHTML = (name_children + " height is incorrect. Height is " + height_children + "cm and should be between " + min_height + "and " + max_height + "cm")
                                        document.getElementById("id_result")
                                        show_Nok_icon();
                                    }

                                }
                            )
                    }
                }
            }
        })

</script>
<br>
WYNIK:
<div id="id_result"></div>

</div>
</body>
</html>
