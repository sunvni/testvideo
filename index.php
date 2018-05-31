<head>
  <link href="http://vjs.zencdn.net/5.8.8/video-js.css" rel="stylesheet">
  <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
  <style>
    a{
      text-decoration: none;
      font-weight: bold;
    }
    button {
      margin: 5px;
      padding: 3px;
      border: aliceblue;
    }
    .active{
      background-color: #1d2def;
    }
    .active>a{
      color: #fff;
    }
  </style>
</head>

<body>
 
<?php
$number = 0;
if($_GET["id"])
$number = $_GET["id"];
$files = glob('video/*.{mp4,gif}', GLOB_BRACE);
foreach($files as $id =>$file) {
if($id == $number)
{	
 ?>
<center><video id="my-video" class="video-js" controls preload="auto" width="860" height="528"
 
    <source src="<?php echo $file; ?>" type='video/mp4'>
   
    <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a web browser that
     
    </p>
  </video>
  <button <?php if($number <= 0) echo "hidden=true"; ?> ><a href="index.php?id=<?=($id-1)?>"><</a></button>
  <button <?php if($number >= count($files) - 1)  echo "hidden=true"; ?>><a href="index.php?id=<?=($id+1);?>">></a></button>
  <?php
  for($i = 0; $i < count($files); $i++)
  {
    $active = $number == $i?"class='active'": "";
    echo "<button $active><a href='index.php?id=$i'>$i</a></button>";
  }
    
  ?>
 </center>
 <?php
}
}
?>

</body>