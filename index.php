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


/* foreach($hotels as $hotel){
        echo $hotel['name'].'<br> '.$hotel['description'].'<br> '.$hotel['parking'].'<br> '.$hotel['vote'].'<br> '.$hotel['distance_to_center'].'<br>';
    } */

if (isset($_GET['parking']) && ($_GET['parking'] === '1' || $_GET['parking'] === '0')) {
    $parkingFilter = ($_GET['parking'] === '1');
    $filteredHotels = array_filter($hotels, function ($hotel) use ($parkingFilter) {
        return $hotel['parking'] === $parkingFilter;
    });
} else {
    $filteredHotels = $hotels;
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php-Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <h1 class="text-center">Hotel</h1>
        <form class="mb-5" action="" method="GET">
            <div class="form-group d-flex flex-column justify-content-center align-items-center">
                <label class="fs-4 mb-2" for="parkingFilter">FIltro se ci sono parcherggi</label>
                <select style="width: 500px;" class="form-control" id="parkingFilter" name="parking">
                    <option value="">Tutti gli Hotel</option>
                    <option value="1">Si</option>
                    <option value="0">No</option>
                </select>
                <button type="submit" class="btn btn-dark mt-3">Cerca</button>
            </div>
        </form>
        <table  class="table ">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Parcheggio</th>
                    <th scope="col">Voto</th>
                    <th scope="col">Km to Center</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filteredHotels as $index => $hotel) : ?>
                    <tr class="text-center">
                        <th scope="row"><?php echo $index + 1; ?></th>
                        <td><?php echo $hotel['name']; ?></td>
                        <td><?php echo $hotel['description']; ?></td>
                        <td><?php echo ($hotel['parking'] ? 'Yes' : 'No'); ?></td>
                        <td><?php echo $hotel['vote']; ?></td>
                        <td><?php echo $hotel['distance_to_center']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>



</body>

</html>