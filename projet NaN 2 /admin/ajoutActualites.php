<?php
     
    require 'connection.php';
 
    $titreError = $dattError = $contenuError  = $titre = $datt = $contenu ="";

    if(!empty($_POST)) 
    {
        $datt               = checkInput($_POST['datt']);
        $titre              = checkInput($_POST['titre']);
        $contenu            = checkInput($_POST['contenu']); 
        $isSuccess          = true;
        $isUploadSuccess    = true;
        
        
        if(empty($datt)) 
        {
            $dattError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($titre)) 
        {
            $titreError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($contenu)) 
        {
            $contenuError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        
        
        if($isSuccess && $isUploadSuccess) 
        {
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO actualites (datt,titre,contenu) values (?, ?, ?)");
            $statement->execute(array($datt,$titre,$contenu));
            Database::disconnect();
            header("Location: actualites.php");
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
<html class='no-js' lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <title>Forms</title>
    <meta content='lab2023' name='author'>
    <meta content='' name='description'>
    <meta content='' name='keywords'>
    <link href="assets/stylesheets/application-a07755f5.css" rel="stylesheet" type="text/css" /><link href="//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/images/favicon.ico" rel="icon" type="image/ico" />
    
  </head>
  <body class='main page'>
    <!-- Navbar -->
    <div class='navbar navbar-default' id='navbar'>
      <a class='navbar-brand' href='#'>
        <i class='icon-beer'></i>
        Hierapolis
      </a>
      <ul class='nav navbar-nav pull-right'>
        <li class='dropdown'>
          <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
            <i class='icon-envelope'></i>
            Messages
            <span class='badge'>5</span>
            <b class='caret'></b>
          </a>
          <ul class='dropdown-menu'>
            <li>
              <a href='#'>New message</a>
            </li>
            <li>
              <a href='#'>Inbox</a>
            </li>
            <li>
              <a href='#'>Out box</a>
            </li>
            <li>
              <a href='#'>Trash</a>
            </li>
          </ul>
        </li>
        <li>
          <a href='#'>
            <i class='icon-cog'></i>
            Settings
          </a>
        </li>
        <li class='dropdown user'>
          <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
            <i class='icon-user'></i>
            <strong>John DOE</strong>
            <img class="img-rounded" src="http://placehold.it/20x20/ccc/777" />
            <b class='caret'></b>
          </a>
          <ul class='dropdown-menu'>
            <li>
              <a href='#'>Edit Profile</a>
            </li>
            <li class='divider'></li>
            <li>
              <a href="/">Sign out</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <div id='wrapper'>
      <!-- Sidebar -->
      <section id='sidebar'>
        <i class='icon-align-justify icon-large' id='toggle'></i>
        <ul id='dock'>
          <li class='launcher'>
            <i class='icon-dashboard'></i>
            <a href="dashboard.html">Dashboard</a>
          </li>
          <li class='active launcher'>
            <i class='icon-file-text-alt'></i>
            <a href="forms.html">Forms</a>
          </li>
          <li class='launcher'>
            <i class='icon-table'></i>
            <a href="tables.html">Tables</a>
          </li>
          <li class='launcher dropdown hover'>
            <i class='icon-flag'></i>
            <a href='#'>Reports</a>
            <ul class='dropdown-menu'>
              <li class='dropdown-header'>Launcher description</li>
              <li>
                <a href='#'>Action</a>
              </li>
              <li>
                <a href='#'>Another action</a>
              </li>
              <li>
                <a href='#'>Something else here</a>
              </li>
            </ul>
          </li>
          <li class='launcher'>
            <i class='icon-bookmark'></i>
            <a href='#'>Bookmarks</a>
          </li>
          <li class='launcher'>
            <i class='icon-cloud'></i>
            <a href='#'>Backup</a>
          </li>
          <li class='launcher'>
            <i class='icon-bug'></i>
            <a href='#'>Feedback</a>
          </li>
        </ul>
        <div data-toggle='tooltip' id='beaker' title='Made by lab2023'></div>
      </section>
      <!-- Tools -->
      <section id='tools'>
        <ul class='breadcrumb' id='breadcrumb'>
          <li class='title'>Tables</li>
          <li><a href="#">Lorem</a></li>
          <li class='active'><a href="#">ipsum</a></li>
        </ul>
        <div id='toolbar'>
          <div class='btn-group'>
            <a class='btn' data-toggle='' href='#' title='Lemon'>
              <i class='icon-lemon'></i>
            </a>
            <a class='btn' data-toggle='toolbar-tooltip' href='actualites.php' title='ajouter'>
              Revenir aux évènements
            </a>
          </div>
        </div>
      </section>
      <!-- Content -->
      <div id='content'>
        <div class='panel panel-default'>
         <div class='panel-heading'>
            <i class='icon-edit icon-large'></i>
            Form Default
          </div>
          <div class='panel-body'>
            <form class="form" action="ajoutActualites.php" method="post" role="form" enctype="multipart/form-data">
                <div class='form-group'>
                  <label for="titre">Titre</label> 
                  <input  type='text' class='form-control' id="titre" name="titre" value="<?php echo $titre; ?>" placeholder="Veuillez entrer le nom de l'évènement ici">
                  <span class="help-inline"><?php echo $titreError; ?></span>
                </div>
                <div class='form-group'>
                  <label for="datt">Date de l'évènement</label>
                  <input class='form-control' id="datt" name="datt" value="<?php echo $datt; ?>" placeholder="Veuillez entrer la date de l'évènement" type='date'>
                  <span class="help-inline"><?php echo $dattError; ?></span>
                </div>
                <div class='form-group'>
                  <label for="contenu">à Propos de l'évènement</label>
                  <textarea class='form-control' id="contenu" name="contenu" value="<?php echo $contenu; ?>" rows='4' placeholder="Veuillez entrer un texte décrivant l'évènement"></textarea>
                  <span class="help-inline"><?php echo $contenuError; ?></span>
                </div>
                
              
                <div class='form-actions'>
                  <button class='btn btn-default' type='submit' href="actualites.php">Ajouter</button>
                  <a class='btn' href='actualites.php'>Retour</a>
                </div>
            </form>
          </div>
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
