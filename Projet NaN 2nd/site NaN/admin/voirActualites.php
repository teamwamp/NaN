<?php
  require 'database.php';
  if (!empty($_GET['id']))
  {
    $id = checkInput($_GET['id']);
  }

  $db = Database::connect();
  $statement = $db->prepare('SELECT items.id, items.date, items.title, items.idea, items.detail, items.image FROM  items WHERE items.id = ?');

  $statement->execute(array($id));
  $item = $statement->fetch();
  Database::disconnect();

  function checkInput($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>




<!DOCTYPE html>
<html class='no-js' lang='fr'>
  <head>
    <meta charset='utf-8'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <title>Tables</title>
    <meta content='lab2023' name='author'>
    <meta content='' name='description'>
    <meta content='' name='keywords'>
    <link href="assets/stylesheets/application-a07755f5.css" rel="stylesheet" type="text/css" /><link href="//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/images/favicon.ico" rel="icon" type="image/ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
    
  </head>
  <body class='main page'>
    <!-- Navbar -->
    <div id='wrapper'>
      <!-- Content -->
      <div class="text-center">
        <a class="btn btn-success" href="actualité.php" style="margin-top: 10px; height: 30px; width: 150px">Retour</a>
      </div>
      <div id='content'>
          <form>

            <div class="col-sm-6">

                <div class="form-group">
                  <label>Date:</label><?php echo ' ' . $item['date'];  ?>
                </div>

                <div class="form-group">
                  <label>Titre:</label><?php echo ' ' . $item['title'];  ?>
                </div>

                <div class="form-group">
                  <label>Breve idée:</label><?php echo ' ' . $item['idea'];  ?>
                </div>

                <div class="form-group">
                  <label>Tous les details:</label><?php echo ' ' . $item['detail'];  ?>
                </div>

                <div class="form-group">
                  <label>Image:</label><?php echo ' ' . $item['image'];  ?>
                </div>

            </div>

          </form>

         <div class="col-sm-6">
          <div class="thumbnail">
              <img src=" <?php echo '../images/' . $item['image']; ?>" alt="...">
          </div>
        </div>

      </div>
    <!-- Footer -->
    <!-- Javascripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script><script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script><script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="assets/javascripts/application-985b892b.js" type="text/javascript"></script>
    <!-- Google Analytics -->
    <script>
      var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
      (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
      g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
      s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
  </body>
</html>
