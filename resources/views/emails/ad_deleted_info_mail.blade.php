<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Info Mail</title>
    </head>
    <body>
        <p>Hello {{ $adMailDetails['user_first_name'] }} {{ $adMailDetails['user_last_name'] }},</p> 

        <p>We are pleased to inform you that your <b>{{ $adMailDetails['ad_title'] }}</b> advertisement which was <b>posted on {{ $adMailDetails['created_at'] }}</b>, was deleted by ClassiHut team. Please contact us if you have any questions.</p>

        <p>Thank You.</p>

        <p>ClassiHut Team</p>
    </body>
</html>