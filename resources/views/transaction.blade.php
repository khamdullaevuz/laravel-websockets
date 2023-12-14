<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
@vite('resources/js/app.js')
<script>
    setTimeout(() => {
        window.Echo.channel('testing')
            .listen('.Paid', (e) => {
                console.log(e)
            });
    }, 200)
</script>
</html>
