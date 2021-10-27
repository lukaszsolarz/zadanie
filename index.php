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
<script>
    console.log("hello its me")
    fetch("peopleData.json")
    .then(response => response.json())
    .then(data =>{
    for(var i=0; i<data.length; i++)
    {
        if(data[i].first_name=='Timmy')
        {
            console.log(data[i])
            break;
        }
    }
    })

</script>
</div>
</body>
</html>
