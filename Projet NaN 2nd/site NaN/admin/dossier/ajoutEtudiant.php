<?php
     
    require 'connection.php';
 
    $nomError = $prenomError = $emailError = $contactError = $activiteError = $nomEError = $nom = $prenom = $email = $contact = $activite = $nomE  = $localite = $localiteError = "";

    if(!empty($_POST)) 
    {
        $nom                = checkInput($_POST['nom']);
        $prenom             = checkInput($_POST['prenom']);
        $email              = checkInput($_POST['email']); 
        $contact            = checkInput($_POST['contact']);
        $localite           = checkInput($_POST['localite']);
        $activite           = checkInput($_POST['activite']);
        $nomE               = checkInput($_POST['nomE']);
        $isSuccess          = true;
        
        
        
        if(empty($nom)) 
        {
            $nomError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($prenom)) 
        {
            $prenomError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($email)) 
        {
            $emailError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($contact)) 
        {
            $contactError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($activite)) 
        {
            $activiteError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($localite)) 
        {
            $activiteError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($nomE)) 
        {
            $nomEError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        
        
        if($isSuccess ) 
        {
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO Etudiants (nom,prenom,email,contact,localite,activite,id_equipe) values (?, ?, ?, ?, ?, ?, ?)");
            $statement->execute(array($nom,$prenom,$email,$contact,$localite,$activite,$nomE));
            Database::disconnect();
            header("Location: etudiants.php");
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
            <a class='btn' data-toggle='toolbar-tooltip' href='etudiants.php' title='ajouter'>
              Revenir aux étudiants
            </a>
          </div>
        </div>
      </section>
      <!-- Content -->
      <div id='content'>
        <div class='panel panel-default'>
         <div class='panel-heading'>
            <i class='icon-edit icon-large'></i>
            Ajouter un nouvel étudiant
          </div>
          <div class='panel-body'>
            <form class="form" action="ajoutEtudiant.php" method="post" role="form" enctype="multipart/form-data">
                <div class='form-group'>
                  <label for="nom">Nom</label> 
                  <input  type='text' class='form-control' id="nom" name="nom" value="<?php echo $nom; ?>" placeholder="Veuillez entrer le nom">
                  <span class="help-inline"><?php echo $nomError; ?></span>
                </div>
                <div class='form-group'>
                  <label for="prenom">Prénom</label>
                  <input class='form-control' id="prenom" name="prenom" value="<?php echo $prenom; ?>" placeholder="Veuillez entrer le prénom" type='text'>
                  <span class="help-inline"><?php echo $prenomError; ?></span>
                </div>
                <div class='form-group'>
                  <label for="email">E-mail</label>
                  <input class='form-control' id="email" name="email" value="<?php echo $email; ?>" placeholder="Veuillez entrer le mail" type='email'>
                  <span class="help-inline"><?php echo $emailError; ?></span>
                </div>
                <div class='form-group'>
                  <label for="contact">Contact</label>
                  <input class='form-control' id="contact" name="contact" value="<?php echo $contact; ?>" placeholder="Veuillez entrer le contact" type='number'>
                  <span class="help-inline"><?php echo $contactError; ?></span>
                </div>
                <div class='form-group'>
                  <label for="localite">Lieu d'habitation</label>
                  <input class='form-control' id="localite" name="localite" value="<?php echo $localite; ?>" placeholder="Veuillez entrer le lieu" type='text'>
                  <span class="help-inline"><?php echo $localiteError; ?></span>
                </div>
                <div class='form-group'>
                  <label for="activite">Activité</label>
                  <input class='form-control' id="activite" name="activite" value="<?php echo $activite; ?>" placeholder="Veuillez l'activité de l'étudiant" type='text'>
                  <span class="help-inline"><?php echo $activiteError; ?></span>
                </div>
                <div class="form-group">
                        <label for="nomE">Equipe</label>
                        <select class="form-control" id="nomE" name="nomE">
                        <?php
                           $db = Database::connect();
                           foreach ($db->query('SELECT * FROM equipe') as $row) 
                           {
                                echo '<option value="'. $row['id'] .'">'. $row['nomE'] . '</option>';
                           }
                           Database::disconnect();
                        ?>
                        </select>
                        <span class="help-inline"><?php echo $nomEError;?></span>
                    </div>
                
                
              
                <div class='form-actions'>
                  <button class='btn btn-default' type='submit' href="etudiants.php">Ajouter</button>
                  <a class='btn' href='etudiants.php'>Retour</a>
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
