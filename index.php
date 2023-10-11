<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];
  /*   <ul>
    <?php foreach($hotels as $hotel){
      foreach($hotel as $key=>$value){
        echo "<li> $key : $value</li>";
      }
    } ?>
  </ul>  */
 
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
  <h1>Lista degli Hotel</h1>
 
  <form class="mb-3 d-flex" method="get">
    <input type="text" name="filter" id="filter" class="form-control w-50" placeholder="cerca" aria-describedby="helpId">
   <button type="submit"> cerca</button>
  </form>

<!-- tabella -->
  <table class="table">
    <thead>
      <!-- metodo con escho  -->
      <tr>
      <?php foreach($hotels[0] as $key =>$value){
        $text_key = str_replace('_', ' ', $key);
        echo "<th scope='col' class=' text-center text-capitalize'>$text_key</th>";
      }?>
      </tr>
    </thead>
    <tbody>
      <?php $filter = isset($_GET["filter"]) ? $_GET["filter"] : null;
     
      
     /*  $hotel_filter = array_filter($hotels, function($hotel) use ($filter){
        var_dump($filter === null);
        return $filter === null || $hotel["parking"] === $filter;
      }); */
      
        $hotel_filter = array_filter($hotels, function($hotel) use ($filter){
            return $hotel["parking"] == true || $filter == null;  
        });
      
     
        foreach($hotel_filter as $hotel):?>
        <tr>
       
          <?php foreach($hotel as $dati):?>
            <?php if ($hotel = is_numeric($dati) ):?>
              <td class="text-center">
                <?php echo $dati; ?> 
              </td>
            
              <?php else  :?>
                <td >
                <?php echo $dati; ?> 
              </td>
             
              
              
            <?php endif;?>
          <?php endforeach; ?>
        </tr>
        <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>