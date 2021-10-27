<!DOCTYPE html>
<html>
<body>
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
</body>
</html>
</body>
</html>

