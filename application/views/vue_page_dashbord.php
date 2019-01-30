<!DOCTYPE html>
<html lang="fr">
<!-- Styles -->
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Projet - News&Weather</title>

    <!-- Bootsrat Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    
    <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 50%;
    height: 50%;
  }
  </style>



  </head>

  <body >
    <!-- Navigation -->
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo assets_url(); ?>">News&Weather</a>
        </div>
      </div>
    </nav>
    <!-- container -->
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4 well">
          <?php $attributes = array();
          echo form_open("/index.php/Energie/editlieu", $attributes);?>
          <div class="form-group">
            <input class="form-control" name="lieu" placeholder="Paris,FR" type="text" value="<?php echo set_value('lieu'); ?>" />
            <span class="text-danger"><?php echo form_error('lieu'); ?></span>   
          </div>
          <div class="form-group">
            <button name="submit" type="submit" class="btn btn-primary">Envoyer</button>
            <button name="cancel" type="reset" class="btn btn-warning">Annuler</button>
          </div>
            <?php echo form_close(); ?>
            <?php echo $this->session->flashdata('msg'); ?>
        </div>
      </div>
  

<!--<?php //echo var_dump($object_weather) ?> -->
  
      <div class="card mb-4 box-shadow">
        <div class="card-header text-white text-center bg-primary">
          <h4 class="my-0 font-weight-normal">
            <?php echo $object_weather->country_code;?> 
            <?php echo $object_weather->city_name;?>
            <?php echo $object_weather->data[0]->datetime;?>
          </h4>
        </div>
        <div class="card-body list-unstyled mt-3 mb-4">
                
          <div class="row list-unstyled mt-3 mb-4">

              <div class="col-sm-6 ">
                <li class="text-warning">
                  <?php $icone_part1 = 'https://www.weatherbit.io/static/img/icons/';
                    $icone_part2 = $object_weather->data[0]->weather->icon ;
                    $icone_part3 = '.png';?>     
                    <p> <img class="rounded mx-auto d-block img-fluid " src= <?php echo $icone_part1.$icone_part2.$icone_part3 ;?> alt="icone météo" >  </p>
                </li>
                <li class="text-warning text-center">
                  <p><a href="#" class="text-dark"> <?php echo $object_weather->data[0]->weather->description;?> </a></p>
                </li>
              </div>
              <div class="col-sm-6">
                <li class="text-warning">
                  <p> Température max : <?php echo $object_weather->data[0]->temp;?> <small class="text-warning" class="text-muted"> °C </small> </p>
                </li>
                <li class="text-primary">
                  <p> Température mini : <?php echo $object_weather->data[0]->min_temp;?> <small class="text-primary" class="text-muted"> °C </small> </p>
                </li>

                <li>
                  <p>Direction du vent : <?php echo $object_weather->data[0]->wind_cdir_full; ?></p>
                </li>
                <li>
                  <p>Vitesse du vent : <?php echo $object_weather->data[0]->wind_spd; ?> <small class="text-muted"> m/s</small></p>
                </li>
                <li>
                  <p>Indice : <?php echo $object_weather->data[0]->uv; ?> <small class="text-muted">uv</small></p>
                </li>
                
              </div>
              <button type="button" onclick="location.href='<?php echo assets_url(); ?>/index.php/Energie/fullweather'" class="btn btn-outline-primary btn-lg btn-block">+</button>      
                <br>
          </div>
        </div>
      </div>



<!--
<?php echo '<b>Source : </b>'.$object_news->status;?>
 <div> <?php echo $object_news->articles[0]->source->name;?> </div>
 <div> <?php echo $object_news->articles[0]->title;?> </div>
 <div> <?php echo $object_news->articles[0]->author;?> </div>
 <div> <?php echo $object_news->articles[0]->description;?> </div>
 <div> <?php $image = $object_news->articles[0]->urlToImage;?> </div>
 <div> <?php echo "<img src= $image />" ;?> </div>-->

  <!--<?php //echo var_dump($object_weather) ?> -->
  <?php for ($article = 1; $article != 10; $article++){ ?> 
  <!----------------------------------------- Boucle for pour 6 jours  -->
  <div class="container-fluid card mb-4 box-shadow">
    <div class="row card-header text-white text-center bg-primary" >
      <h4 class="my-0 font-weight-normal">
        <?php echo $object_news->articles[$article]->title;?>
      </h4>
    </div>
    
    <div class="row"><hr class="d-sm-none">
      <div class="col-sm-4 " style="margin-top:30px">
        <?php $image = $object_news->articles[$article]->urlToImage;
          if ($image == NULL){ ?>
                <img class="rounded mx-auto d-block img-fluid" style="" src="https://upload.wikimedia.org/wikipedia/commons/e/e6/Pas_d%27image_disponible.svg" alt="Pas d'image disponible" >
        <?php } 
        else { ?>
            <img class="rounded mx-auto d-block img-fluid" src= <?php echo $image ;?> alt="image actualité ci dessus">
         <?php } ?>
      </div> 
      
      <div class="col-sm-8" style="margin-top:30px">
        <?php echo $object_news->articles[$article]->description;?>
      </div>

    </div>
    <hr class="d-sm-none">
    <div class="row">
      <div class="col-sm-10" style="margin-top:30px">
        Publié par : <tr class="list-unstyled"><?php echo $object_news->articles[$article]->source->name;?></tr>
      </div>
      <div class="col-sm-2" style="margin-bottom:30px">
        <button type="button" class="btn btn-primary btn-lg btn-block" onClick="window.open('<?php echo $object_news->articles[$article]->url; ?>')">Lire plus</button>
      </div>
    </div>
  </div>                         
  <?php } ?> <!----------------------------------------- fin Boucle for -->

  

<!--
<div class="container-fluid h-25 card mb-4 box-shadow">
  <div class="row card-header text-white text-center bg-primary" >
    <h4 class="my-0 font-weight-normal">
      <?php echo $object_news->articles[$article]->title;?>
    </h4>
  </div>
  
  <div class="row"><hr class="d-sm-none">
    <div class="col-sm-4 " style="margin-top:30px">
      <?php $image = $object_news->articles[$article]->urlToImage;?>
      <img class="rounded mx-auto d-block img-fluid" src= <?php echo $image ;?> alt="image actualité ci dessus" >
    </div> 
    
      <div class="col-sm-8" style="margin-top:30px">
        <?php echo $object_news->articles[$article]->description;?>
      </div>

    </div>
    <hr class="d-sm-none">
    <div class="row">
      <div class="col-sm-10" style="margin-top:30px">
        Publié par : <tr class="list-unstyled"><?php echo $object_news->articles[$article]->source->name;?></tr>
      </div>
      <div class="col-sm-2" style="margin-bottom:30px">
        <button type="button" class="btn btn-outline-primary btn-lg btn-block" onClick="window.open('<?php echo $object_news->articles[$article]->url; ?>')">Lire plus</button>
      </div>
    </div>
</div>
-->

   <!-- /.container 
<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Footer</p>
</div>



<div class="container-fluid card mb-4 box-shadow">
  <div class="row card-header text-white text-center bg-primary" >
    <h4 class="my-0 font-weight-normal">
    <?php echo $object_news->articles[$article]->title;?>
    </h4>
  </div>
  
  <div class="row"><hr class="d-sm-none">
    <div class="col-sm-4 " style="margin-top:30px">
      <?php $image = $object_news->articles[$article]->urlToImage;?>
      <img class="rounded mx-auto d-block img-fluid" src= <?php echo $image ;?> alt="image actualité ci dessus" >
    </div> 
    
      <div class="col-sm-8" style="margin-top:30px">
        <?php echo $object_news->articles[$article]->description;?>
      </div>

    </div>
    <hr class="d-sm-none">
    <div class="row">
      <div class="col-sm-10" style="margin-top:30px">
        Publié par : <tr class="list-unstyled"><?php echo $object_news->articles[$article]->source->name;?></tr>
      </div>
      <div class="col-sm-2" style="margin-bottom:30px">
        <button type="button" class="btn btn-outline-primary btn-lg btn-block" onClick="window.open('<?php echo $object_news->articles[$article]->url; ?>')">Lire plus</button>
      </div>
    </div>
</div>
  -->

    <!-- Footer 
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright (c) 2019</p>
    </div>
  </footer> -->
  </body>
</html>
