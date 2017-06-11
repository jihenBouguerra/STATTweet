<?php include 'header.php'; ?>

<?php if(!isset($_POST['username'])){ ?>
  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Search For UserName</b></h5>
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
    <div class="col-sm-offset-2 col-sm-4">
      <button style="width: 100%;" type="submit" class="btn btn-info">Submit</button>
    </div>
  </div>
</form>
  </div>
  <hr>

<?php } if(isset($_POST['username'])) {
///////////////////db connect/////////////////////
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
///////////////////#db connect/////////////////////
      $sql = "SELECT * FROM users WHERE {$_POST['by']} = '{$_POST['username']}' LIMIT 1";  //connect table use_acc 3
$result = $mysqli->query($sql);
              $user = $result->fetch_assoc();
              $users_screen_name = $user['screen_name'];
              $users_name = $user['name'];
              $users_location = $user['location'];
              $users_url = $user['url'];
              $users_description = $user['description'];
              $users_created_at = $user['created_at'];
              $users_followers_count = $user['followers_count'];
              $users_friends_count = $user['friends_count'];
              $users_favourites_count = $user['favourites_count'];
        
         $sql1 = "SELECT COUNT(*) AS num FROM AnomalousUsers WHERE {$_POST['by']}  = '{$_POST['username']}'";  //connect table use_acc 3
$result1 = $mysqli->query($sql1);
              $user1 = $result1->fetch_assoc();
              $users_num = $user1['num'];
        if($users_num >= 1){
            $users_num2 = 'Yes';
        }else{
            $users_num2 = 'No';
        }
    
                                                                
?>

              <div class="w3-container">
    <h5>All Details</h5>
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
      <tr>
        <td>UserName</td>
        <td><?php echo $users_screen_name; ?></td>
      </tr>
      <tr>
        <td>Name</td>
        <td><?php echo $users_name; ?></td>
      </tr>
      <tr>
        <td>Location</td>
        <td><?php echo $users_location; ?></td>
      </tr>
      <tr>
        <td>Url</td>
        <td><?php echo $users_url; ?></td>
      </tr>
      <tr>
        <td>Description</td>
        <td><?php echo $users_description; ?></td>
      </tr>
      <tr>
        <td>Created At</td>
        <td><?php echo $users_created_at; ?></td>
      </tr>
      <tr>
        <td>Followers</td>
        <td><?php echo $users_followers_count; ?></td>
      </tr>
      <tr>
        <td>Friends</td>
        <td><?php echo $users_friends_count; ?></td>
      </tr>
      <tr>
        <td>Favourites</td>
        <td><?php echo $users_favourites_count; ?></td>
      </tr>
      <tr>
        <td>Anomalous</td>
        <td><?php echo $users_num2; ?></td>
      </tr>
    </table><br>
    <!--<button class="w3-button w3-dark-grey">More Countries  <i class="fa fa-arrow-right"></i></button>-->
  </div>
  <hr>
         
<?php } ?>


<?php include 'footer.php'; ?>