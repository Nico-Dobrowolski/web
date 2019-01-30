<div class="container-fluid">

<!--<?php //echo var_dump($object_weather) ?> -->
<?php for ($days = 1; $days != 7; $days++){ ?> 
<!----------------------------------------- Boucle for pour 6 jours  -->
<div class="card mb-4 box-shadow ">
        <div class="card-header text-white text-center bg-primary">
          <h4 class="my-0 font-weight-normal">
          <?php echo $object_news->articles[0]->title;?>
          </h4>
        </div>
        <div class="card-body"> 
        <ul class="list-unstyled mt-3 mb-4">
          <ul class="list-unstyled mt-3 mb-4">
            <?php echo $object_news->articles[0]->source->name;?>
          <ul class="list-unstyled mt-3 mb-4">
            <?php echo $object_news->articles[0]->author;?>
          <ul class="list-unstyled mt-3 mb-4">
            <?php echo $object_news->articles[0]->description;?>
          <col class="list-unstyled mt-3 mb-4">
            <?php $image = $object_news->articles[0]->urlToImage;?>
            <img class="rounded mx-auto d-block img-fluid" src= <?php echo $image ;?> alt="image actualité ci dessus" >
        </div> 
      </div>
<hr>

<?php } ?> <!----------------------------------------- fin Boucle for -->
</div>



<div class="card mb-4 box-shadow ">
        <div class="card-header text-white text-center bg-primary">
          <h4 class="my-0 font-weight-normal">
          <?php echo $object_news->articles[0]->title;?>
          </h4>
        </div>
        <div class="card-body"> 
        <ul class="list-unstyled mt-3 mb-4">
          <ul class="list-unstyled mt-3 mb-4">
            <?php echo $object_news->articles[0]->source->name;?>
          <ul class="list-unstyled mt-3 mb-4">
            <?php echo $object_news->articles[0]->author;?>
          <ul class="list-unstyled mt-3 mb-4">
            <?php echo $object_news->articles[0]->description;?>
          <col class="list-unstyled mt-3 mb-4">
            <?php $image = $object_news->articles[0]->urlToImage;?>
            <img class="rounded mx-auto d-block img-fluid" src= <?php echo $image ;?> alt="image actualité ci dessus" >
        </div> 
      </div>