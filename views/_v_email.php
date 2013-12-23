<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        <?php if(isset($title)) echo $title; ?>
    </title>

   <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JS/CSS File we want on every page -->
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/style.css" />

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css" />

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

    <!-- icon set -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.css" rel="stylesheet" />

    <script src='/js/form-ajax.js'></script>
    <!-- Controller Specific JS/CSS -->
    <?php if(isset($client_files_head)) echo $client_files_head; ?>



</head>

<body>
    

    <div class="container topbody">

        <?php if(isset($content)) echo $content; ?>

        <?php if(isset($client_files_body)) echo $client_files_body; ?>
        
    </div>
</body>
</html>
