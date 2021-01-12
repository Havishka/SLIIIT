<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

 <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i>Registered this month</span>
              <div class="count"> 
<?php 

$themonth = date("Y-m");
$themonth1="$themonth-01" ;
$themonth2="$themonth-31" ;

$query3="select count(std_id) as sys from student where regDate BETWEEN '" . $themonth1 . "' AND  '" . $themonth2 . "'";
$result = mysqli_query($con, $query3);
while($rows=mysqli_fetch_array($result))
{
$mag=$rows['sys'];
}
echo "$mag";

//echo "$themonth1";
?>
</div>
              <span class="count_bottom"><i class="green">
			  <?php 
$todayis = date("Y-m-d");
$lastweek = date ("Y-m-d", strtotime ($todayis ."-7 days"));

$query3="select count(std_id) as sys from student where regDate>='$lastweek' ";
$result = mysqli_query($con, $query3);
while($rows=mysqli_fetch_array($result))
{
$mag=$rows['sys'];
}
echo "$mag";
?>

</i> From last Week</span>
</div>
			
			   <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Courses</span>
              <div class="count">
			  <?php 
$query3="select count(course_id) as sys from course where state='T'";
$result = mysqli_query($con, $query3);
while($rows=mysqli_fetch_array($result))
{
$mag=$rows['sys'];
}
echo "$mag";
?>
			  
			  </div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i> 
			  			  <?php 
$query3="select count(course_id) as sys from course where state='F'";
$result = mysqli_query($con, $query3);
while($rows=mysqli_fetch_array($result))
{
$mag=$rows['sys'];
}
echo "$mag";
?>
			  
			  </i>Updated courses </span>
            </div>
			
			
			
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Payments Handled Today</span>
              <div class="count">
				  <?php 
$todayis = date("Y-m-d");
$lastweek = date ("Y-m-d", strtotime ($todayis ."-7 days"));

$query3="select count(pay_id) as sys from payment where pay_date='$todayis' ";
$result = mysqli_query($con, $query3);
while($rows=mysqli_fetch_array($result))
{
$mag=$rows['sys'];
}
echo "$mag";
?>		  
			  
			  
			  </div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"> </i>
			  <?php 
$todayis = date("Y-m-d");
$lastweek = date ("Y-m-d", strtotime ($todayis ."-7 days"));

$query3="select count(pay_id) as sys from payment where pay_date>='$lastweek' ";
$result = mysqli_query($con, $query3);
while($rows=mysqli_fetch_array($result))
{
$mag=$rows['sys'];
}
echo "$mag";
?>
			  </i>
From last week
			  </span>
            </div>
			
			
			
			
			</div>



<body>
</body>
</html>