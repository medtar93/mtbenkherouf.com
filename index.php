<?php require 'inc/connexion.php';

   // pour pouvoir trier les infos 
   $order = '';
   if(isset($_GET['order']) && isset($_GET['column'])){

      if($_GET['column'] == 'competence'){$order = ' ORDER BY competence';}
          elseif($_GET['column'] == 'niveau'){$order = ' ORDER BY niveau';}
          elseif($_GET['column'] == 'categorie'){$order = ' ORDER BY categorie';}
      if($_GET['order'] == 'asc'){$order.= ' ASC';}
          elseif($_GET['order'] == 'desc'){$order.= ' DESC';}
  }
?>

<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="site portfolio">
    <meta name="author" content="MOHAMMED-TAREK BENKHEROUF">
    <?php
    // Récupère les données de l'utilisateur par son id
    $sql = $pdoCV -> query(" SELECT * FROM t_utilisateurs WHERE id_utilisateur = 1");
    $ligne_utilisateur = $sql-> fetch(); 
    ?>
    <title><?php echo $ligne_utilisateur['prenom'] . ' ' .$ligne_utilisateur['nom']; ?> : développeur web</title>

    <!-- devicons cdn -->
    <link rel="stylesheet" href="https://cdn.rawgit.com/konpa/devicon/df6431e323547add1b4cf45992913f15286456d3/devicon.min.css">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="vendor/devicons/css/devicons.min.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/resume.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">mtbenkherouf.com</span>
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/profil.png" alt="">
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">Qui suis je ?</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#experience">Expériences</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#skills">Compétences</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#education">Fomations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#interests">Loisirs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">contact</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">

      <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="my-auto">
          <h1 class="mb-0"><?php echo $ligne_utilisateur['prenom']?>
            <span class="text-primary"><?php echo $ligne_utilisateur['nom']?></span>
          </h1>
          <div class="subheading mb-5">PARIS · Île-de-France· <?php echo $ligne_utilisateur['portable']; ?> ·
            <a href="mailto:name@email.com">name@email.com</a>
          </div>
          <p class="mb-5">I am experienced in leveraging agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition.</p>
          <ul class="list-inline list-social-icons mb-0">
            <li class="list-inline-item">
              <a href="https://www.linkedin.com/in/mohammed-tarek-benkherouf">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="https://github.com/medtar93">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
        </div>
      </section>

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="experience">
        <div class="my-auto">
          
          <?php   
              // Requête pour compter et chercher plusieurs enregistrements on ne peut compter qui si on a préparer(avec : prepare) la rrequête
            $sql = $pdoCV -> prepare("SELECT * FROM t_experiences $order");
            $sql -> execute();
            $nbr_experiences = $sql -> rowCount();
          ?> 
          <h2 class="mb-5">Expériences</h2>
          <span><?php echo $nbr_experiences;?></span>
         
          <?php while ($ligne_experience=$sql->fetch())
                     {
            ?>
          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
              <h3 class="mb-0"><?php echo $ligne_experience['titre_exp'];?></h3>
              <div class="subheading mb-3"><?php echo $ligne_experience['stitre_exp'];  ?></div>
              <p><?php echo $ligne_experience['description_exp'];  ?></p>
            </div>
            <div class="resume-date text-md-right">
              <span class="text-primary"><?php echo $ligne_experience['dates_exp'];  ?></span>
            </div>
          </div>
          <?php } ?>

        </div>

      </section>


      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="skills">
        <div class="my-auto">
        <?php   
              // Requête pour compter et chercher plusieurs enregistrements on ne peut compter qui si on a préparer(avec : prepare) la rrequête
            $sql = $pdoCV -> prepare("SELECT * FROM t_competences $order");
            $sql -> execute();
            $nbr_competences = $sql -> rowCount();
            ?>
          <h2 class="mb-5">Compétences</h2>

          <div class="subheading mb-3">langages de programations &amp; outils
            <ul class="list-inline list-icons">
              Infographie
              <?php while ($ligne_competence=$sql->fetch())
                      {
                        if($ligne_competence['categorie']=='Infographie'){
                  ?>
                  <li class="list-inline-item">
                    <i class="devicon-<?php echo $ligne_competence['competence'];  ?>-plain-wordmark"></i>
                  </li>
                        <?php }}?>
            </ul>
            <ul class="list-inline list-icons">
              développement
              <?php while ($ligne_competence=$sql->fetch())
                      {
                        if($ligne_competence['categorie']=='Développement'){
                  ?>
                  <li class="list-inline-item">
                    <i class="devicons devicons-<?php echo $ligne_competence['competence'];  ?>"></i>
                  </li>
                        <?php }}?>
            </ul>
            <ul class="list-inline list-icons">
              gestion de projet
              <?php while ($ligne_competence=$sql->fetch())
                      {
                        if($ligne_competence['categorie']=='Gestion de projet'){
                  ?>
                  <li class="list-inline-item">
                    <i class="devicons devicons-<?php echo $ligne_competence['competence'];  ?>"></i>
                  </li>
                        <?php }}?>
            </ul>

          

          
          
        </div>
      </section>

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="education">
        <div class="my-auto">
            <?php   
              // Requête pour compter et chercher plusieurs enregistrements on ne peut compter qui si on a préparer(avec : prepare) la rrequête
            $sql = $pdoCV -> prepare("SELECT * FROM t_formations $order");
            $sql -> execute();
            $nbr_formations = $sql -> rowCount();
            ?>
          <h2 class="mb-3 ">Formations</h2>
          <?php while ($ligne_formation=$sql->fetch())
              {
          ?>
           <div class="resume-content mr-auto col-lg-4">
              <h3><?php echo $ligne_formation['titre_form'];  ?></h3>
              <div class="subheading"><p><?php echo $ligne_formation['stitre_form'];  ?></p></div>
              <div><?php echo $ligne_formation['description_form'];  ?></div>
            </div>
            <div class="resume-date text-md-right">
              <span class="text-primary"><?php echo $ligne_formation['dates_form'];  ?></span>
            </div><?php } ?>
          </div>
          
          
          
          <div class="resume-item d-flex flex-column flex-md-row mb-5">
           

         
        </div>
      </section>

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="interests">
        <div class="my-auto">
        <?php
        // Requête pour compter et chercher plusieurs enregistrements on ne peut compter qui si on a préparer(avec : prepare) la rrequête
        $sql = $pdoCV -> prepare("SELECT * FROM t_loisirs");
        $sql -> execute();
        $nbr_loisirs = $sql -> rowCount();
        ?>
          <h2 class="mb-5">loisirs</h2>
          <table class="table table-striped table-bordered bg-light" style="width:100%">
            
            <tbody>
                <?php while ($ligne_loisir=$sql->fetch())
                    {
                ?>
                <tr>
                    <td><?php echo $ligne_loisir['loisir'];  ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
      </section>

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="contact">
        <div class="my-auto">
                <?php include 'inc\form-process.php';?>
          <h2 class="mb-3">Contact</h2>
          <h3>Votre message</h3>
              <form role="form" id="contactForm" data-toggle="validator" class="shake">
                  <div class="row">
                      <div class="form-group col-sm-6">
                          <label for="name" class="h4">Nom</label>
                          <input type="text" class="form-control" id="name" placeholder="Enter name" required data-error="NEW ERROR MESSAGE">
                          <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group col-sm-6">
                          <label for="email" class="h4">Email</label>
                          <input type="email" class="form-control" id="email" placeholder="Enter email" required>
                          <div class="help-block with-errors"></div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="message" class="h4 ">Message</label>
                      <textarea id="message" class="form-control" rows="5" placeholder="Enter your message" required></textarea>
                      <div class="help-block with-errors"></div>
                  </div>
                  <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Envoyer</button>
                  <div id="msgSubmit" class="h3 text-center hidden"></div>
                  <div class="clearfix"></div>
          </form>
        </div> 
      </section>


    </div>
    <!-- Script JavaScript du formulaire de contact -->
    <script src="js/form-scripts.js"></script>
    <script src="js/validator.min.js"></script>



    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/resume.min.js"></script>

  </body>

</html>
