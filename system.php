<?php
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: *");

header('Access-Control-Allow-Credentials: true');

header('Access-Control-Max-Age: 86400');
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        var accessToken = '<?php echo file_get_contents(__DIR__.'/access_token.txt')?>';
        var refreshToken = '<?php echo file_get_contents(__DIR__.'/refresh_token.txt')?>';
        console.log(accessToken);
        console.log(refreshToken);

        $.ajax({
            url:"https://dimas1gold.amocrm.ru/api/v4/contacts?page=1&limit=50",
            method: 'GET',
            headers: {
                'Authorization': 'Bearer ' + accessToken,



            },
            // data: {
            //     "client_id": "xxxx",
            //     "client_secret": "xxxx",
            //     "grant_type": "authorization_code",
            //     "code": "xxxxxxx",
            //     "redirect_uri": "https://test.test"
            // }
        }).done(function(data) {
            console.log(data)
        })
    </script>
</head>

<body>

</body>

</html>
