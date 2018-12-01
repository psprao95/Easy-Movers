<html>

<head>
  <title> Easy Movers</title>
  <link rel="stylesheet" href="mystyle.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
    <?php
    session_start();
    echo file_get_contents('navbar.php');
    ?>



<div class="container">
<div class="row">
    <div class="col-lg-1">
    </div>

  <div class="col-lg-11">
    <div id="test">

      <?php
      if(isset( $_SESSION['user_name']))
      {
        $u = $_SESSION['user_name'];
        $host='localhost';
        $username='root';
        $password='root';
        $db_name='EasyMovers';
        $conn =mysqli_connect($host,$username,$password,$db_name);

        $my_query = "select * from users where username='$u'";
        $result=mysqli_query($conn,$my_query);
        while($row=mysqli_fetch_array($result))
        {
          $fname=$row['first_name'];
          $lname = $row['last_name'];
          $email = $row['email_id'];
        }
      }
   ?>
<h2>Detailed Quote</h2>
<h4>Please fill in the form below for your free online quote</h4><br/>
<form id="quote" action ="estimate.php">
  <div class="row">
    <div class="col-sm-6">
      <label>First Name</label>
      <input type="text" size=45 class="form-control" value="<?php echo $fname?>"><br/>
      <label> Phone</label>
      <input type="text" size=45 class="form-control">


    </div>

    <div class="col-sm-6">
      <label>Last Name</label>
      <input type="text" size=45 class="form-control" value="<?php echo $lname?>">
    </div>
  </div><br/>


<div class="row">

    <div class="col-sm-4">
      <label>Origin Address</label>
      <input type="text" size=30 class="form-control">
    </div>
    <div class="col-sm-2">
      <label>City</label>
      <input type="text" size=15 class="form-control">
    </div>
    <div class="col-sm-2">
      <label>State</label>
      <input type="text" size=20 class="form-control">
    </div>
    <div class="col-sm-2">
      <label>Zip</label>
      <input type="text" size=20 class="form-control">
    </div>
    <div class="col-sm-2">
      <label>Floor</label>
      <select class="form-control">
        <option>--select--</option>
        <option>first</option>
        <option>second</option>
        <option>third</option>
        <option>elevator</option>
      </select>
    </div>


  </div><br/>


    <div class="row">
        <div class="col-sm-4">
          <label>Destination Address</label>
          <input type="text" size=30 class="form-control">
        </div>
        <div class="col-sm-2">
          <label>City</label>
          <input type="text" size=15 class="form-control">
        </div>
        <div class="col-sm-2">
          <label>State</label>
          <input type="text" size=20 class="form-control">
        </div>
        <div class="col-sm-2">
          <label>Zip</label>
          <input type="text" size=20 class="form-control">
        </div>
        <div class="col-sm-2">
          <label>Floor</label>
          <select class="form-control">
            <option>--select--</option>
            <option>first</option>
            <option>second</option>
            <option>third</option>
            <option>elevator</option>
          </select>
        </div>
      </div><br/>


        <div class="row">
          <div class="col-sm-6">
            <label>Email</label>
            <input type="text" size=15 class="form-control" value="<?php echo $email?>"><br/>


          </div>

          <div class="col-sm-6">
            <label>Move Date</label>
            <input type="text" size=10 class="form-control">
          </div>
        </div><br/>

</form>



</div>
</div>
</div>
</div>

<?php
echo file_get_contents('foot.php');?>
</body>

</html>
