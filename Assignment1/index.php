<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<?php
      include('reusables/nav.php');


?>
<div class="container-fluid">
  <div class="container">
     <div class="row">
        <div class="col">
          <h1 class="display-5">Toronto Traffic Data</h1>
        </div>
      </div>
         
      <div class="row">
      <?php include('reusables/connection.php');
        $query = "SELECT 
    l.location_name,
    tc.latest_count_date_end AS Date_Last_Checked,
    tc.avg_daily_vol AS Average_Daily_Volume,
    tc.avg_speed AS Average_Speed,
    tc.avg_wkdy_am_peak_vol AS Average_Morning_Peak_Volume,
    tc.avg_wkdy_pm_peak_vol AS Average_Evening_Peak_Volume
FROM Locations l
JOIN TrafficCounts tc 
  ON l.location_id = tc.location_id";
        $TorontoTraffics = mysqli_query($connect, $query);

        while ($TorontoTraffic = mysqli_fetch_assoc($TorontoTraffics)){
          echo '<div class="col-md-6"> 
          <div class="card" mb-3 style="">
          <div class="card-body">
            <h3 class="card-title">
                <span class="badge bg-info">
                     Location Name: ' .$TorontoTraffic['location_name'].'
                </span>
            </h3>
            <span class="badge bg-primary">Date Last Checked: '.$TorontoTraffic['Date_Last_Checked'].'</span>
            <span class="badge bg-secondary">Average Daily Volume: '.$TorontoTraffic['Average_Daily_Volume'].'</span>
            <span class="badge bg-success">Average Speed: '.$TorontoTraffic['Average_Speed'].' Km/Hr</span>
            <span class="badge bg-warning">Average Morning Peak Volume: '.$TorontoTraffic['Average_Morning_Peak_Volume'].'</span>
            <span class="badge bg-danger  ">Average Evening Peak Volume: '.$TorontoTraffic['Average_Evening_Peak_Volume'].'</span>
          </div>
          
          </div>
          <br></br>
          </div>';
          }
      ?>
      </div>
    
  </div>
</div>    
</body>
</html>