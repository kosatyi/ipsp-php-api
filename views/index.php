<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
</head>
<body>

<script>
    $.ajax({
        type:'post',
        dataType:'json',
        url:'/sandbox/checkout',
        data:{
            amount:'200',
            currency:'EUR',
            order_desc:'Test Order Description'
        }
    }).then(function(data){
        console.log(data);
    });
</script>

</body>
</html>