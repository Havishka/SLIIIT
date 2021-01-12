<!DOCTYPE HTML>
<html>
<title>Ajax table - edit delete add rows with Ajax - InfoTuts</title>
<head>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="Admin/M_COURSE/style.css" />

<style>
.w3-button {width:150px;}
</style>




















<style>

.frmSearch {position:relative;border: 1px solid #a8d4b1;background-color: #F3F3F3;margin: 2px 0px;padding:20px;border-radius:4px;}
#country-list{list-style:none;margin-top:-90px;padding:0;width:220px;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px; border: #a8d4b1 1px solid;border-radius:4px;}
#other-box{padding: 10px; border: #a8d4b1 1px solid;border-radius:4px;}
</style>




<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function myFunction() {
$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "Admin/M_ADMIN/readCountry.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
});
}
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();

}
</script>
</head>
<body>
<div id="mhead"> Manage Courses
</div>
<div class="frmSearch">
<table id='demoajax' cellspacing="0">

</table>
<script type="text/javascript" src="Admin/M_COURSE/script.js"></script>


<div id="suggesstion-box" align="center"></div>
<table width="200" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
   
     <td>
</td>
  </tr>
 
</table>


</div>


</body>
</html>
