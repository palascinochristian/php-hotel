<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel List</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <h1 class="mb-4">Hotel List</h1>
    <hr>
    <h2> Filtri </h2>
    <form action="">
        <input id="parking" name="parking" type="checkbox">
        <label for="parking"> Parking Avaiable</label>
        <input id="vote" name="vote" type="checkbox">
        <label for="vote">Average Vote</label>

        <button>Filter</button>


    <div class="table-responsive mt-5">
        <table class="table table-bordered table-striped table-hover align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Parking</th>
                    <th>Vote</th>
                    <th>Distance to Center (km)</th>
                </tr>
            </thead>
            <tbody>
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

                $parking_filter = false;
                $average_vote = false;
                
                if(isset($_GET['parking']) && $_GET['parking'] == "on"){
                    $parking_filter = true;

                }
                if(isset($_GET['vote']) && $_GET['vote'] > 3){
                    $average_vote = true;
                }

                foreach ($hotels as $hotel) {

                    if($parking_filter){
                        if(!$hotel['parking']) {
                            continue;

                        }
                    }
                    if($average_vote){
                        if($hotel['vote'] <= 3){
                            continue;
                        }
                    }

                    echo "<tr>";
                    echo "<td>{$hotel['name']}</td>";
                    echo "<td>{$hotel['description']}</td>";
                    echo "<td>" . ($hotel['parking'] ? 'Yes' : 'No') . "</td>";
                    echo "<td>{$hotel['vote']}</td>";
                    echo "<td>{$hotel['distance_to_center']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
