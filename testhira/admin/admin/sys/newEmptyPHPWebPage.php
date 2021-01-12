<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
       <input type="text" name="name" id="txtdateapply" size="40" aria-required="true" aria-invalid="false" disabled/>
    </body>
     <script>
        jQuery(document).ready(function () {

            //set date to textfield
            var now = new Date();

            var day = ("0" + now.getDate()).slice(-2);
            var month = ("0" + (now.getMonth() + 1)).slice(-2);

//            var today = now.getFullYear() + "-" + (month) + "-" + (day);
            var today = (month) + "/" + (day) + "/" + now.getFullYear();
            jQuery("#txtdateapply").val(today);
            // ending set date to textfield



          





        });
        </script>
</html>
