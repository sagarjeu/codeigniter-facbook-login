
<html>
<head>
    <title>Login with Facebook</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <style type="text/css">
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #eee;
        }

        .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }
        .form-signin .form-signin-heading{
            padding-bottom: 10px;
            margin-bottom: 20px;
            border-bottom: 1px #ccc dotted;
            text-align: center;
        }
        .form-signin .footer{
            padding-top: 10px;
            margin-top: 20px;
            border-top: 1px #ccc dotted;
            font-weight: 600;
        }
        .fa {
            color: #cc0000;
        }
    </style>
</head>
<body>

<div class="container">

    <form class="form-signin" role="form">
        <?php if (@$user_profile):  // call var_dump($user_profile) to view all data ?>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>Cover Picture</h1><img class="img-thumbnail" data-src="holder.js/140x140" alt="140x140" src="<?=$user_profile['cover']['source']?>" style="width: 140px; height: 140px;">
                    <br>
                    <h1>Profile Picture :</h1><img class="img-thumbnail" data-src="holder.js/140x140" alt="140x140" src="<?=$user_profile['picture']['data']['url']?>" style="width: 140px; height: 140px;">
                    <h2><?=$user_profile['first_name']?>&nbsp <?=$user_profile['last_name']?></h2>
                    <h3>Information:</h3>
                    <h4>Gender:<?=$user_profile['gender']?></h4>
                    <h4>Email:<?=$user_profile['email']?></h4>
                    <a target="_blank" href="<?=$user_profile['link']?>" class="btn btn-lg btn-default btn-block" role="button">View Profile</a>
                    <a href="<?= $logout_url ?>" class="btn btn-lg btn-primary btn-block" role="button">Logout</a>
                </div>
            </div>
        <?php else: ?>
            <h2 class="form-signin-heading">Login with Facebook</h2>
            <a href="<?= $login_url ?>" class="btn btn-lg btn-primary btn-block" role="button">Login</a>
        <?php endif; ?>
<!--        <a href="https://github.com/puneetkay/Facebook-PHP-CodeIgniter" class="btn btn-lg btn-success btn-block" target="_blank" role="button">View Source on Github</a>-->

        <div class="footer">
            <p>With <i class="fa fa-heart"></i> by <a href='http://mustafiz.info/' target="_blank" title="Mustafizur Rahman">Mustafizur Rahman</a>.</p>
        </div>
    </form>
</div> <!-- /container -->
<script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>