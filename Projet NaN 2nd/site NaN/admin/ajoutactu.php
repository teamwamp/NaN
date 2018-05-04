<?php
 
      require 'database.php';

      $dateError = $titleError = $ideaError = $imageError = $detailError = $date = $title = $idea = $image = $detail = "";

      if (!empty($_POST)) {
        # code...
        $date  =  checkInput($_POST['date']);
        $title = checkInput($_POST['title']);
        $idea  = checkInput($_POST['idea']);
        $detail = checkInput($_POST['detail']);
        $image  = checkInput($_FILES['image'] ['name']);
        $imagePath = '../images/' . basename($image);
        $imageExtension = pathinfo($imagePath, PATHINFO_EXTENSION);
        $isSuccess = true;
        $isUploadSuccess = false;


        if (empty($date)) {
          # code...
          $dateError = 'Ce champ ne peut pas être vide';
          $isSuccess = false;
        }
        if (empty($title)) {
          # code...
          $titleError = 'Ce champ ne peut pas être vide';
          $isSuccess = false;
        }
        if (empty($idea)) {
          # code...
          $ideaError = 'Ce champ ne peut pas être vide';
          $isSuccess = false;
        }
        if (empty($detail)) {
          # code...
          $detailError = 'Ce champ ne peut pas être vide';
          $isSuccess = false;
        }
        if (empty($image)) {
          # code...
          $imageError = 'Ce champ ne peut pas être vide';
          $isSuccess = false;
        }
        else
          {
            $isUploadSuccess = true;
            if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" ) 
            {
                $imageError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
                $isUploadSuccess = false;
            }
            if(file_exists($imagePath)) 
            {
                $imageError = "Le fichier existe deja";
                $isUploadSuccess = false;
            }
            if($isUploadSuccess) 
            {
                if(!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) 
                {
                    $imageError = "Il y a eu une erreur lors de l'upload";
                    $isUploadSuccess = false;
                } 
            }
            if ($isSuccess && $isUploadSuccess) {
              # code...
              $db = Database::connect();
              $statement = $db->prepare("INSERT INTO items (date, title, idea, detail, image) VALUES (?,?,?,?,?)");
              $statement->execute(array($date, $title, $idea, $detail, $image));
              Database::disconnect();
              header("location: actualité.php");
            }
        }




      }


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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
    
  </head>
  <body class='main page'>
    <!-- Navbar -->
    <div id='wrapper'>
      <!-- Content -->
      <div class="text-center">
        <a class="btn btn-success" href="actualité.php" style="margin-top: 10px; height: 30px; width: 150px">Retour</a>
      </div>
      <div id='content' >
          <form class="form" role="form" action="ajoutactu.php" method="post" enctype="multipart/form-data">


                <div class="form-group">
                  <label for="date">Date:</label>
                  <input type="date" name="date" class="form-control" placeholder="12/31/2018" id="date" value="<?php echo $date ?>" >
                  <span style="color: red;"><?php echo $dateError ?></span>
                </div>

                <div class="form-group">
                  <label for="title">Titre:</label>
                  <input type="text" name="title" class="form-control" placeholder="Veuillez entrer le titre" id="title" value="<?php echo $title ?>" >
                  <span style="color: red;"><?php echo $titleError ?></span>
                </div>

                <div class="form-group">
                  <label for="idea">Description:</label>
                  <input type="text" name="idea" class="form-control" placeholder="Veuillez entrer une idée de l'actualité" id="idea" value="<?php echo $idea ?>" >
                  <span style="color: red;"><?php echo $ideaError ?></span>
                </div>

                <div class="form-group">
                  <label for="detail">Tous les details:</label>
                  <textarea type="text" name="detail" class="form-control" id="detail" placeholder="Veuillez entrer tout les details de l'actualité" value="<?php echo $detail ?>"></textarea>
                  <span style="color: red;"><?php echo $detailError ?></span>

                </div>

                <div class="form-group">
                  <label for="image">Selectionner une image</label>
                  <input type="file" id="image" name="image">
                  <span style="color: red"><?php echo $imageError;?></span>
                </div>

                <div class="form-action">
                    <button class="btn btn-info" type="submit">Ajouter</button>
                </div>

          </form>

      </div>
    <!-- Footer -->
    <!-- Javascripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
