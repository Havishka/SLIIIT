<?php 
include 'connection.php';
include  '/xampp/htdocs/sys1/check.php';
if(!empty($_POST["keyword"])) {
    if(($le==1))
    {
        $query = "SELECT batch_remarks FROM student_course_batch WHERE batch_remarks like '" . $_POST["keyword"] . "%' LIMIT 0,6";
    }
  


$result = mysqli_query($con, $query);
if(!empty($result)) {
?>
<ul id="country-list">

<?php
foreach($result as $country) {
?>
<li onClick="selectCountry_2('<?php echo $country["batch_remarks"]; ?>');"><?php echo $country["batch_remarks"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>