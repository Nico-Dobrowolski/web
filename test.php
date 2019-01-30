<div class="card mb-4 box-shadow">
    <div class="card-header text-white text-center bg-primary">
          <h4 class="my-0 font-weight-normal">
            <?php echo $object_weather->country_code;?> 
            <?php echo $object_weather->city_name;?>
            <?php echo $object_weather->data[0]->datetime;?>
         </h4>
</div>
<div class="card-body list-unstyled mt-3 mb-4">
                <li>
                  <h4><p class="text-center"> Température moyenne: <?php echo $object_weather->data[0]->max_temp;?> <a href="#" class="text-dark"> °C </a></p></h4> 
                </li>
                <hr>
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
              <div class="col-sm-6 ">
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




        
        <div class="card text-white text-center bg-primary ">

          <h4 class="my-0 font-weight-normal"> <!-- Commence à +1 jour  -->
            <?php echo $object_weather->country_code;?> 
            <?php echo $object_weather->city_name;?>
            <?php echo $object_weather->data[$days]->datetime;?> 
          </h4>

        </div>
        

          <ul class="list-unstyled">
            <li>
              <?php echo $object_weather->data[$days]->weather->description;?>
            </li>
            <hr>
            <li class="text-warning">
              <p> <?php echo $object_weather->data[$days]->max_temp;?> <small class="text-warning" class="text-muted"> °C </small> Température max </p>
            </li>
            <li class="text-primary">
              <p> <?php echo $object_weather->data[$days]->min_temp;?> <small class="text-primary" class="text-muted"> °C </small> Température mini </p>
            </li>
            <hr>
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