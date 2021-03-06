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

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/main.css" />

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css" />

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

    <!-- icon set -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
    
    <script src='/js/form-ajax.js'></script>
    <script src='/js/custom.js'></script>

    <?php if(!empty($jtable)): ?>

    <link href="/js/themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
    <link href="/js/jtable/themes/lightcolor/blue/jtable.css" rel="stylesheet" type="text/css" />

    <script src="/js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script src="/js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
    <script src="/js/jtable/jquery.jtable.js" type="text/javascript"></script>

    <?php endif; ?>

    <!-- Controller Specific JS/CSS -->
    <?php if(isset($client_files_head)) echo $client_files_head; ?>
</head>

<body>
    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <i class="fa fa-home"></i>
                </a>
            </div>

            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <?php if($user && $user->admin): ?>
                    <li>
                        <a href='/userslist'>Users</a>
                    </li>
                    <li>
                        <a href='/log'>System Log</a>
                    </li>
                    <li>
                        <a href='/plans'>Plans</a>
                    </li>
                    <?php endif; ?>
                    <li>
                        <a href='/goals'>Goals</a>
                    </li>
                    <?php if($user): ?>
                    
                    <?php else: ?>
                    <li>
                        <a href='/users/signup'>Sign Up</a>
                    </li>

                    <?php endif; ?>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if($user): ?>
                    <li class="active">
                        <a href='/users/profile'>
                            Update Your Profile
                        </a>

                    </li>
                    <li>
                        <a href='/users/logout'>Logout</a>
                    </li>
                    <?php else: ?>

                    <li>
                        <a href='/users/login'>Log In</a>
                    </li>
                    <?php endif; ?>
                </ul>

            </div>
            <!--/.nav-collapse -->
        </div>
    </div>

    <div class="container topbody">

        <?php if(isset($content)) echo $content; ?>

        <?php if(isset($client_files_body)) echo $client_files_body; ?>
        <footer class="pull-right clear">
            <p>&copy; The Calculator That Matters | <a target="_blank" href="http://validator.w3.org/check?uri=p4.vielgi.biz">
                HTML5 Validation</a></p>
        </footer>
    </div>
</body>
</html>
