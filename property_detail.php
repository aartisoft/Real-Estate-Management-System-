      <!DOCTYPE html>
      <html>
      <head>
        <title>Property Detail</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <style type="text/css"></style>
    <h2>Property Detail</h2>
      </head>
      <body>
      
      </body>
      </html>
      <table width="275" border="0" cellspacing="0" cellpadding="0" style="float:left;">
        <tr>
          <td align="center"><?php include('admin/connection.php'); ?>
 
<?php


$link = mysqli_connect("localhost", "root", "", "property"); // Specify your connection variable
$get_id_property=mysqli_real_escape_string($link,$_POST['post_item']);

$id_property_sql="SELECT * FROM property WHERE id_property='$get_id_property'";

mysqli_query($link, $id_property_sql) or die(mysqli_error($link)); // Add $link here


$id_property_result=mysqli_query($link,$id_property_sql) or die(mysqli_error($link));

$id_pro = $_POST['post_item'];


while($row_id_property=mysqli_fetch_array($id_property_result)){
$name_property=$row_id_property["name_property"];
$price=$row_id_property["price"];
$type_property=$row_id_property["type_property"];
$beds=$row_id_property["beds"];
$baths=$row_id_property["baths"];
$text=$row_id_property["text"];
$land_area=$row_id_property["land_area"];
$groos_floor_area=$row_id_property["groos_floor_area"];
$image=$row_id_property["name_property"];
$filename = "admin/images/$name_property.jpg";



if (!file_exists($filename)) {
$filename="images/default.png"; 
}
if ($image==null) {
$filename="images/$name_property.jpg"; 
}


print<<<HERE
<td align="center"><br><br>
<p align="center"><img src="$filename"  width="929" height="619"></p>
</td>
<td valign="top" class="text_menu">
<table width="277" border="0" cellspacing="0" cellpadding="0" class="text_menu">
  <tr>
    <td align="left" colspan="3">
<br>
    <text class="text_menu">/ / Item Code: <text class="highlight">MO$get_id_property</text> / /</text>
    <table class="text_menu" width="289" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="95">Item Name :</td>
        <td width="188" class="highlight">$name_property</td>
      </tr>
      <tr>
        <td>Item Price :</td>
        <td>RM <text class="highlight">$price</text>
		</td>
      </tr>
      <tr>
        <td>Land Area :</td>
        <td> <text class="highlight">$land_area</text>
		</td>
      </tr>
      <tr>
        <td>Groos Floor:</td>
        <td><text class="highlight">$groos_floor_area</text>
		</td>
      </tr>
    </table></td>
  </tr>
<br><br>
</td></tr></table>
<br>
<u>Description:</u><br><br>
<hr>
<textarea class="text_menu" style="width:300px; height:300px; background:transparent;border:0; resize:none" readonly>
Type Property : $type_property
Land Area : $land_area
Groos Floor Area : $groos_floor_area
Bedrooms : $beds
Bathroom:$baths 
Addtional:$text

 </textarea>
 <hr>
 	<p align="left"><input type="button" name="back" value="Back"
onClick="location.href='property_listing.php'" /><input type="button" name="Form" value="Form"
onClick="location.href='property_form.php?id_property=$id_pro'" /><input type="hidden" value="$id_pro"></p>

</td>
<br>
</table>

HERE;

}
 ?></td>
      </table>
