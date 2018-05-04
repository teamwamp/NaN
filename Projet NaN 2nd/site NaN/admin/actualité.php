 <!DOCTYPE html>
<html class='no-js' lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <title>Sign in</title>
    <meta content='lab2023' name='author'>
    <meta content='' name='description'>
    <meta content='' name='keywords'>
    <link href="assets/stylesheets/application-a07755f5.css" rel="stylesheet" type="text/css" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/images/favicon.ico" rel="icon" type="image/ico" />
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
  </head>
  <body class='login'>


     <div class='panel panel-default grid'>
              <div class='panel-heading'>
                 <div class="text-center">
                    <h3>LISTES DES ACTUALITES EN COUR</h3>
                     <a class="btn btn-success" href="ajoutactu.php">Ajouter</a>
                     <a class="btn btn-primary" href="welcome.php">Retour</a>

                 </div>
              </div>
              <div class='panel-body'>
                <table class='table table-bordered'>
                  <thead>
                    <tr>
                      <th>Dates</th>
                      <th>Titres</th>
                      <th>Breve Idée</th>
                      <th>Détails</th>
                      <th>Images</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      require 'database.php';
                      $db = Database::connect();
                      $statement = $db->query('SELECT items.id, items.date, items.title, items.idea, items.detail, items.image FROM  items ORDER BY items.id DESC');
                      while ($item = $statement->fetch()) {
                        # code...

                            echo "<tr>";  
                            echo '<td>' . $item['date'] . '</td>';
                            echo '<td>' . $item['title'] . '</td>';
                            echo '<td>' . $item['idea'] . '</td>';
                            echo '<td>' . $item['detail'] .  '</td>';
                            echo '<td>' . $item['image']. '</td>';
                            echo'<td>';
                              echo '<a class="btn btn-danger" href="delete.php?id=' .$item['id'] . '">suprimer</a>';
                              echo " ";
                              echo '<a class="btn btn-info" href="voirActualites.php?id=' .$item['id'] . '">Voir</a>';
                            echo '</td>';
                          echo '</tr>';

                      }
                      Database::disconnect();





                    ?>

                  </tbody>
                </table>
              </div>
            </div>
        <script type="text/javascript" src="bootstrap.min.js"></script>
        <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
  </body>
</html>