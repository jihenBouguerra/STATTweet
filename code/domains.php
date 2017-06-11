<?php include 'header.php'; ?>

<?php if(!isset($_POST['username'])){ ?>
  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Search For UserName Domains</b></h5>
</header>

<div class="w3-container">
<form method="post" class="form-horizontal">
    
    <div class="form-group">
  <label class="control-label col-sm-2" for="typ">Search By:</label>
        <div class="col-sm-4">
  <select name="by" class="form-control col-sm-4" id="typ">
    <option value="screen_name">UserName</option>
    <option value="user_id">User ID</option>
  </select>
    </div>
</div>
    
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">UserName Or User ID:</label>
    <div class="col-sm-4">
      <input name="username" type="text" class="form-control" id="email" placeholder="Enter UserName Or User ID">
    </div>
  </div>
   
<div class="form-group">
  <label class="control-label col-sm-2" for="sel1">Select Domain:</label>
        <div class="col-sm-4">
  <select name="domain" class="form-control col-sm-4" id="sel1">
    <option value="art_and_entertainment">art and entertainment</option>
    <option value="automotive_and_vehicles">automotive and vehicles</option>
    <option value="business_and_industrial">business and industrial</option>
    <option value="careers">careers</option>
    <option value="education">education</option>
    <option value="family_and_parenting">family and parenting</option>
    <option value="finance">finance</option>
    <option value="food_and_drink">food and drink</option>
    <option value="health_and_fitness">health and fitness</option>
    <option value="hobbies_and_interests">hobbies and interests</option>
    <option value="home_and_garden">home and garden</option>
    <option value="law_govt_and_politics">law govt and politics</option>
    <option value="news">news</option>
    <option value="pets">pets</option>
    <option value="real_estate">real estate</option>
    <option value="religion_and_spirituality">religion and spirituality</option>
    <option value="science">science</option>
    <option value="shopping">shopping</option>
    <option value="society">society</option>
    <option value="sports">sports</option>
    <option value="style_and_fashion">style and fashion</option>
    <option value="technology_and_computing">technology and computing</option>
    <option value="travel">travel</option>
  </select>
    </div>
</div>
    
<div class="form-group">
  <label class="control-label col-sm-2" for="sel2">Select Domain:</label>
        <div class="col-sm-4">
   <select name="date[]" style="height: 120px;overflow: hidden;" multiple class="form-control" id="sel2">
        <option value="11_2014">11/2014</option>
        <option value="12_2014">12/2014</option>
        <option value="01_2015">01/2015</option>
        <option value="02_2015">02/2015</option>
        <option value="03_2015">03/2015</option>
        <option value="04_2015">04/2015</option>
      </select>
    </div>
</div>

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-4">
      <button style="width: 100%;" type="submit" class="btn btn-info">Submit</button>
    </div>
  </div>
</form>
  </div>
  <hr>

<?php } /*foreach ($_POST['date'] as $selectedOption)
{echo $selectedOption."\n";} */ if(isset($_POST['username'])) {
///////////////////db connect/////////////////////
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
///////////////////#db connect/////////////////////
      $sql = "SELECT * FROM {$_POST['domain']} WHERE {$_POST['by']} = '{$_POST['username']}' LIMIT 1";  //connect table use_acc 3
$result = $mysqli->query($sql);
              $user = $result->fetch_assoc();
     
?>

<html>

<head>
    <title>Line Chart</title>
    <script src="Chart.bundle.js"></script>
    <script src="utils.js"></script>
    <style>
    canvas{
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    </style>
</head>

<body>
    <div style="width:100%;padding:10px;">
        <canvas id="canvas"></canvas>
    </div>
    
    <script>
       
        var config = {
            type: 'bar',
            data: {
                labels: [<?php foreach ($_POST['date'] as $select) {echo "'".str_replace("_","/",$select)."',";} ?>],
                datasets: [{
                    label: "<?php echo str_replace("_"," ",$_POST['domain']); ?> For User <?php echo $user['screen_name']; ?>",
                    backgroundColor: window.chartColors.blue,
                    borderColor: window.chartColors.blue,
                    data: [
             <?php foreach ($_POST['date'] as $select) {echo $user[$select].",";} ?>
                    ],
                    fill: false,
                }]
            },
            options: {
                responsive: true,
                title:{
                    display:true,
                    text:'Chart'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Value'
                        }
                    }]
                }
            }
        };

        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myLine = new Chart(ctx, config);
        };

        
    </script>
                  
    <div class="w3-container">
        <h5><b>User Position</b></h5>
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
      <tr>
        <td><b>UserName</b></td>
        <td><b>User Position In <?php echo str_replace("_"," ",$_POST['domain']); ?></b></td>
        <td><b>TC Value</b></td>
      </tr>
      <tr>
        <td><?php echo $user['screen_name']; ?></td>
        <td><?php echo $user['id']; ?></td>
        <td><?php echo $user['TC']; ?></td>
      </tr>
    </table><br>
    <!--<button class="w3-button w3-dark-grey">More Countries  <i class="fa fa-arrow-right"></i></button>-->
  </div>
  <hr>
    <div class="w3-container">
        <h5><b>Top 10 Users In <?php echo str_replace("_"," ",$_POST['domain']); ?></b></h5>
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
      <tr>
        <td><b>UserName</b></td>
        <td><b>User Position</b></td>
        <td><b>TC Value</b></td>
      </tr>

      <?php 
    $sql1 = "SELECT * FROM {$_POST['domain']} ORDER BY id ASC LIMIT 10";  //connect table use_acc 3
$result1 = $mysqli->query($sql1);
              while($user1 = $result1->fetch_assoc()){
    ?>
      <tr>
        <td><?php echo $user1['screen_name']; ?></td>
        <td><?php echo $user1['id']; ?></td>
        <td><?php echo $user1['TC']; ?></td>
      </tr>
        <?php } ?>
    </table><br>
    <!--<button class="w3-button w3-dark-grey">More Countries  <i class="fa fa-arrow-right"></i></button>-->
  </div>
  <hr>
</body>

</html>         
<?php } ?>

<?php include 'footer.php'; ?>