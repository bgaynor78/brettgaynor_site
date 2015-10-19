<?php
    if (isset($_POST["submit"])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $human = intval($_POST['human']);
        $from = 'Website Contact Form'; 
        $to = 'brett.gaynor@gmail.com'; 
        $subject = 'Message from Contact Form ';
        $errName;
        $errEmail;
        $errMessage;
        $errHuman;
        
        $body = "<strong>From:</strong> $name\n <strong>E-Mail:</strong> $email\n <strong>Message:</strong>\n $message";
 
        // Check if name has been entered
        if (!$_POST['name']) {
            $errName = 'Please enter your name';
        }
        
        // Check if email has been entered and is valid
        if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errEmail = 'Please enter a valid email address';
        }
        
        //Check if message has been entered
        if (!$_POST['message']) {
            $errMessage = 'Please enter your message';
        }
        //Check if simple anti-bot test is correct
        if ($human !== 5) {
            $errHuman = 'Your anti-spam is incorrect';
        }
 
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
    if (mail ($to, $subject, $body, $from)) {
        $result='<div class="alert alert-success">Thank You! I will be in touch</div>';
    } else {
        $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
    }
}
    }
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Brett Gaynor | Contact</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link href='https://fonts.googleapis.com/css?family=Cabin:700,400' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/animsition.min.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body id="contact">
      <div class="bg-site-wrapper animsition">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
          <nav>
              <ul class="list-unstyled main-menu">
                <li class="text-right"></li>
                <li><a href="index.html" class="animsition-link">HOME <i class="icon fa fa-home"></i></a></li>
                <li><a href="about.html" class="animsition-link">ABOUT <i class="icon fa fa-bullhorn"></i></a></li>
                <li><a href="work.html" class="animsition-link">WORK <i class="icon fa fa-cogs"></i></a></li>
                <li><a href="contact.html" class="animsition-link">CONTACT <i class="icon fa fa-paper-plane"></i></a></li>
              </ul>
            </nav>

          <div class="navbar navbar-inverse navbar-fixed-top">      

              <!--Include your brand here-->
              <a class="navbar-brand" href="index.html">BRETT GAYNOR | WEB DEVELOPMENT</a>
              <div class="navbar-header pull-right">
              <a id="nav-expander" class="nav-expander fixed">
                <span class="nav-expander-top-bar"></span>
                <span class="nav-expander-middle-bar"></span>
                <span class="nav-expander-bottom-bar"></span>
              </a>
            </div>
          </div>
          <div class="container bg-main-content">
            <div class="container bg-lead-in">
              <h1 class="title">Let's Create Something Beautiful</h1>
              <p class="subtitle">Send me a message and I'll let you know how I can help.</p>
            </div>
            <p id="returnMessage"></p>
            <div class="row">
              <div class="col-sm-8 col-xs-12">
                <form class="contact-form" id="mainContactForm" role="form" method="post" action="contact.php">
                  <div class="form-group">
                    <label for="name" class="sr-only">Name *</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name *" value="<?php echo htmlspecialchars($_POST['name']); ?>" required>
                    <?php echo "<p class='text-danger'>$errName</p>";?>
                  </div>
                  <div class="form-group">
                    <label for="email" class="sr-only">Email *</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email *" value="<?php echo htmlspecialchars($_POST['email']); ?>" required>
                    <?php echo "<p class='text-danger'>$errEmail</p>";?>
                  </div>
                  <div class="form-group">
                    <label for="Message" class="sr-only">Message</label>
                    <textarea class="form-control" name="message" id="message" placeholder="Your Message" rows="5"><?php echo htmlspecialchars($_POST['message']); ?></textarea>
                    <?php echo "<p class='text-danger'>$errMessage</p>";?>
                  </div>
                  <div class="form-group clearfix">
                    <label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="human" id="human" name="human" placeholder="Your Answer">
                        <?php echo "<p class='text-danger'>$errHuman</p>";?>
                    </div>
                  </div>
                  <div class="form-group">
                    <input id="submit" name="submit" type="submit" value="Fire Away" class="btn btn-primary btn-lg">
                  </div>
                  <div class="form-group">
                    <?php echo $result; ?> 
                  </div>
                </form>
              </div>
              <div class="col-sm-4 col-xs-12">
                <h2 class="bg-social-share-heading">Share on</h2>
                <div class="bg-social-share-links">
                  <a href="https://twitter.com/intent/tweet?text=Portfolio%20http://brettgaynor.com/" target="_blank"><i class="fa fa-twitter fa-2x"></i></a>
                  <a href="http://www.facebook.com/sharer.php?u=http://brettgaynor.com/"><i class="fa fa-facebook fa-2x"></i></a>
                  <a href="https://plus.google.com/share?url=http://brettgaynor.com/" target="_blank"><i class="fa fa-google-plus fa-2x"></i></a>
                </div>
              </div>
            </div>
          </div>
      </div>
      <footer class="footer">
        <div class="container">
          <p class="text-muted">Brett Gaynor | Web Development - Copyright 2015</p>
        </div>
      </footer>       
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.js"><\/script>')</script>
    <script src="js/vendor/animsition.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        ga('create','UA-XXXXX-X','auto');ga('send','pageview');
    </script>
    </body>
</html>