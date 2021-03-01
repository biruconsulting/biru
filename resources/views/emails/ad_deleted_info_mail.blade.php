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

        <p>We are pleased to inform that your <b>{{ $adMailDetails['ad_title'] }}</b> advertisement which was <b>posted at {{ $adMailDetails['created_at'] }}</b>, was deleted by ClassiHut team for some reason. Please stay tuned with us.</p>

        <p>Contact us for more details.</p>

        <p>Thank You.</p>
    </body>
</html>