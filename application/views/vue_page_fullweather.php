<!DOCTYPE html>
<html lang="fr">
<!-- Styles -->
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Projet - News&Weather</title>
    <!-- Bootsrat Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo assets_url(); ?>">News&Weather</a>
        </div>
      </div>
    </nav>



      
    
<div class="container w-50">

  <?php for ($days = 1; $days != 7; $days++){ ?> 
  <!----------------------------------------- Boucle for pour 6 jours  -->
  <div class="card shadow-lg">
      <div class="card text-white text-center bg-primary ">
        <h4 class="my-0 font-weight-normal"> <!-- Commence à +1 jour  -->
          <?php echo $object_weather->country_code;?> 
          <?php echo $object_weather->city_name;?>
          <?php echo $object_weather->data[$days]->datetime;?> 
        </h4>
      </div>
      <div class="row list-unstyled mt-3 mb-4">
        <div class="col-sm-6 ">
          <li class="text-warning">
            <?php $icone_part1 = 'https://www.weatherbit.io/static/img/icons/';
                  $icone_part2 = $object_weather->data[0]->weather->icon ;
                  $icone_part3 = '.png';?>     
            <p> <img class="rounded mx-auto d-block img-fluid " src= <?php echo $icone_part1.$icone_part2.$icone_part3 ;?> alt="icone météo" >  </p>
          </li>
          <li class="text-warning text-center">
            <p><a class="text-dark"> <?php echo $object_weather->data[0]->weather->description;?> </a></p>
          </li>
        </div>
        <div class="col-sm-6 ">
          <ul class="list-unstyled">
              <li class="text-warning">
                <p> <?php echo $object_weather->data[$days]->max_temp;?> <small class="text-warning" class="text-muted"> °C </small> Température max </p>
              </li>
              <li class="text-primary">
                <p> <?php echo $object_weather->data[$days]->min_temp;?> <small class="text-primary" class="text-muted"> °C </small> Température mini </p>
              </li>
              <li>
                <p>Direction du vent : <?php echo $object_weather->data[$days]->wind_cdir_full;?></p>
              </li>
              <li>
                <p>Vitesse du vent : <?php echo $object_weather->data[$days]->wind_spd;?> <small class="text-muted"> m/s </small></p>
              </li>
              <li>
                <p>Indice : <?php echo $object_weather->data[$days]->uv;?> <small class="text-muted"> uv </small></p>
              </li>
          </ul>
        </div>    
    </div>
  </div>
  <hr>
  <?php } ?> <!----------------------------------------- fin Boucle for -->
</div>


     

    <!-- /.container -->

    <!-- Footer 
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright (c) 2019</p>
    </div>
  </footer> -->
  </body>
</html>
