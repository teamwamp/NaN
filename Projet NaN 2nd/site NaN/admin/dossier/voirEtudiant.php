<?php
  require 'connection.php';
  if (!empty($_GET['id']))
  {
    $id = checkInput($_GET['id']);
  }

  $db = Database::connect();
  $statement = $db->prepare('SELECT * FROM Etudiants  WHERE Etudiants.id = ?');

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
          <li class='launcher'>
            <i class='icon-file-text-alt'></i>
            <a href="forms.html">Forms</a>
          </li>
          <li class='active launcher'>
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
            <a class='btn' data-toggle='toolbar-tooltip' href='etudiants.php' title='retour'>
              Revenir aux étudiants
            </a>
          </div>
        </div>
      </section>
      <!-- Content -->
      <div id='content'>

        <div class="col-sm-6">

          <form>
            <div class="form-group">
              <label>Nom: </label><?php echo " " . $item["nom"]; ?>
            </div>
            <div class="form-group">
              <label>Prénom: </label><?php echo " " . $item["prenom"]; ?>
            </div>
            <div class="form-group">
              <label>E-mail: </label><?php echo " " . $item["email"]; ?>
            </div>
            <div class="form-group">
              <label>Contact: </label><?php echo " " . $item["contact"]; ?>
            </div>
            <div class="form-group">
              <label>Activité: </label><?php echo " " . $item["activite"]; ?>
            </div>
            <div class="form-group">
              <a href=""><strong>Voir le CV</strong></a>
            </div>
                      
          </form>
          

        </div>

         <div class="col-sm-6">
          <div class="thumbnail">
              <img src="<?php echo '../img/' . $item['img'] ; ?>" alt="...">
          </div>
        </div>

        <div class="col-sm-12">
          <div style="text-align: center;">
            <?php
            echo '<tr>';
                    echo "<td class='action'>";
                        echo '<a class="btn btn-success" data-toggle="tooltip" title="commentaire" href="ajoutComment.php">';
                         echo "Ajouter un commentaire";
                        echo "</a>";
                        echo " ";
                        echo '<a class="btn btn-danger" data-toggle="tooltip" title="formation" href="ajoutFormation.php">';
                         echo "Ajouter une formation";
                        echo "</a>";
                        echo " ";
                        echo '<a class="btn btn-info" data-toggle="tooltip" title="compétences" href="ajoutCompetences.php">';
                         echo "Ajouter des compétences";
                        echo "</a>";
                        
                    echo "</td>";
                  echo '</tr>';
                  echo "<br><br><br>";
              ?>
              </div>
        </div>
        <table class='table'>
            <thead>
              <tr>
                <th>#</th>
                <th>Date et l'heure d'ajout</th>
                <th>Commentaires</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>#</th>
                <th>Date et l'heure d'ajout</th>
                <th>Commentaires</th>
              </tr>
            </tfoot>
            <tbody>
              
              <?php
                $statement = $db->query("SELECT * FROM commentaires WHERE idEtudiant = ".$item['id']);
                while($items = $statement->fetch()) {
                  echo '<tr>';
                    echo '<td>'. $items['id'] .'</td>';
                    echo '<td>'. $items['dat'] .'</td>';
                    echo '<td>'. $items['commentaire'].'</td>';
                  echo '</tr>';
                }
              ?>

            </tbody>
          </table>

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
