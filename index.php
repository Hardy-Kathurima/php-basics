<?php
ob_start();
session_start();
error_reporting(E_ALL);
require "database/connection.php";
require "validate/security.php";
if (!isset($_SESSION['username'])) {
    header("location:login.php");

}

$records = array();
if (!empty($_POST)) {
    if (isset($_SESSION['username'], $_POST['comment'])) {
        $comment = trim($_POST['comment']);

        if (!empty($_SESSION['username']) && !empty($comment)) {
            $insert = $db->prepare("INSERT INTO comments (username,comment,created) VALUES(?,?,NOW()) ");
            $insert->bind_param('ss', $_SESSION['username'], $comment);

            if ($insert->execute()) {
                header('location:index.php');
                die();
            }

        }
    }
}

if ($results = $db->query("SELECT * FROM comments order by id desc limit 5")) {
    if ($results->num_rows) {
        while ($row = $results->fetch_object()) {
            $records[] = $row;
        }
        $results->free();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
   integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
 <link rel="stylesheet" href="css/bootstrap.min.css" />
 <link rel="stylesheet" href="styles.css" />

  <title>A blog using PHP</title>
</head>

<body>

<nav class="navbar bg-dark navbar-expand-md navbar-dark  ">
  <!-- Brand -->
  <a class="navbar-brand" href="#"> <?php echo $_SESSION["username"]; ?>  </a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse  justify-content-center" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.html">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.html">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container ">
<div class="banner">
<h3> Perfect Beef steaks</h3>
</ul>
</div>
<div class="highlight bg-white p-3 ">
  <h1 ">10 Tips for making perfect beef steaks.</h1>


</div>
<div class="author  bg-white">
    <ul>
      <li> <img src="images/avatar2.png" alt=""></li>
      <li>Hardy</li>
      <li>June 28 .</li>
      <li> 5 min read</li>
    </ul>
    <div class="main-content bg-white p-3 ">
  <p>Whether you are looking to shine at thanksgiving or impressing your friends, there is no better way than cooking that juicy and tender beef steak that will keep them coming back for more.</p>
  <p>In this article, we will dive in ways to make perfect beef steaks in order to have that edge when it comes to making perfect steak.</p>
  </div>
  <div class="tips p-3">
<h4>1.	It all starts With a Good Cut.</h4>
<p>It goes without saying that the process of preparing that exceptional steak starts with the right type of steak. It is preferable to pick a thicker steak which enables you to regulate the temperatures as compared to the thin steak which is subject to overcooking.</p>
<h4>2.	The more the marbling the better.</h4>
<p>Always look for meat with plenty of marbling. The white flecks on the meat are the thing to look for. Marbled meat melts when cooked and gives the steak that juicy and tasty feel.</p>
<h4>3.	Season the steak right before heating.</h4>
<p>Seasoning the steak ahead of time does more harm than good. It makes the steak dense and chewy. Seasoning should be done when the pan is ready and heated. Consequently when you are prepared to place the steak on the heat, season profusely, and pat it dries using a paper towel and places the steak on top of the heat.</p>
<h4>4.	Keep the steak dry.</h4>
<p>Moisture on the surface of the steak interferes with the heating of the meat. You should make sure that the steak is moisture-free before seasoning it. Keeping it dry allows the caramelization process to take place smoothly. It is good to note that as soon as you season the meat, the salt draws moisture away from the surface of the meat. So dry, season and dry again if necessary. </p>
<h4>5.	Always allow the steak to be at room temperature before cooking.</h4>
<p>Cooking the meat while at room temperature ensures that the heat is evenly distributed.it also minimizes cooking time since the interior of the meat will not be heating from a refrigeration temperature to cooked temperature.</p>
<h4>6.	Use a meat thermometer.</h4>
<p>A meat thermometer ensures that the temperatures of the meat are at the required minimum thus ensuring a perfect steak. Depending on how you want your steak cooking interior temperatures of a well-cooked steak range from 125 degrees to a well-done stake achieving 160 degrees.</p>
<h4>7.	Season according to preference.</h4>
<p>Seasoning could mean just a combination of salt and pepper. Seasoning your steak depends on at what lengths you are going to experiment and get creative while using what you have. Good seasoning can give your steak that unique taste that will make it exceptional from the rest. Simple seasoning enhances the taste of the meat while preserving the natural taste.</p>
<h4>8.	Let your meat rest after cooking.</h4>
<p>Allowing your meat to rest for 5 to 10 minutes gives the meat time to absorb the juices pushed out during the heating process. During the resting time, the meat continues to cook. This ensures the meat is properly cooked and gives the juices to thicken during cooling.</p>
<h4>9.	Sprinkle olive oil and sea salt on the steak.</h4>
<p>Drizzling some olive oil and sea salt on the beefsteak works out magic. The olive oil helps spread the flavor across the stake while the sea salt ensures that deep flavor experience.</p>
<h4>10.	Slice the steak against the grain.</h4>
<p>Before slicing the steak, ensure that you have a sharp knife. A sharp knife makes it possible to cut against the grain that is the direction in which the fibers go. By cutting across the grain you will end up with more tender slices of meat. If it is not possible to cut slice against the grains due to how the meat is cut, it is advisable to cut smaller pieces in order to achieve a more tender bite.</p>
  </div>

  </div>
  <div class="writer">
    <div class="ul-a">
    <span>Posted on 28 June by:</span>
    <ul>
      <li><img src="images/avatar1.png" alt=""></li>
      <li>@Hardy</li>

    </ul>
    <div class="ul-b">
      <ul>
        <li>A web developer and a freelancer at Upwork.</li>
      </ul>
      <div class="ul b">
      <a style="padding: 5px;" href="https://www.linkedin.com/in/hardy-kathurima-179310186/" target="blank" ><i
          class="fab fa-linkedin-in"></i></a>
      <a style="padding: 5px;" href="https://github.com/Hardy-Kathurima" target="blank"><i class="fab fa-github"></i></a>
      <a style="padding: 5px;" href="https://www.hardykathurima@gmail.com" target="blank"><i class="fas fa-envelope"></i></i></a>
      <a style="padding: 5px;" href="https://t.me/Kranium67"><i class="fab fa-telegram"target="blank"></i></a>
      <a style="padding: 5px;" href="https://www.upwork.com/freelancers/~01609bc342dbd1d37a" target="blank"><i class="fa fa-briefcase"></i></a>

      </div>
    </div>
    </div>



  </div>
  <div  class="comment-area bg-white mt-2 mb-2 p-3">


  <!-- inser php code to hide form if user not logged in -->

  <form action="" method="POST">
    <div class="form-group w-75">



      <textarea class="form-control" name="comment" id="comment" cols="15" rows="5" placeholder="Leave a comment" autocomplete="off"></textarea>
      <input type="submit" value="SUBMIT" class="mt-3 btn-primary submit ml-3">
    </div>
  </form>

<!-- end insertion here -->


</div>
<!-- comments -->
<?php
if (!count($records)) {
    echo "No comments";
} else {

    ?>
<div class="comments p-3 mt-2 mb-2 bg-white">
  <?php
foreach ($records as $record) {

        ?>
        <div class="each-comment p-3 mt-2 mb-2">
          <ul >
          <li><img src="images/avatar2.png" alt=""></li>

           <li><?php echo escape($record->username); ?> </li>
           <li style="float:right;"><?php echo escape($record->created); ?></li>
           <ol>
           <li><?php echo escape($record->comment); ?></li>

           </ol>



          </ul>




        </div>


  <?php
}
    ?>


</div>
<?php
}

?>


<!-- end here -->
<div class="box">
      <p>&uarr;</p>

    </div>




</div>
<footer>&copy Copyright Hardy 2015-2020</footer>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<!-- offline -->
<script src="jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="main.js"></script>
<!-- end -->

</body>

</html>
