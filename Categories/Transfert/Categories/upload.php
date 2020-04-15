<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>test</title>
</head>
<body>
        
<form name="form" method="post" action="upload.php" enctype="multipart/form-data" >
<input type="file"  accept="image/*" name="my_file" id="file"  onchange="loadFile(event)" style="display: none;"><br/> <br/>
<label for="file" style="cursor: pointer;">Upload Image</label>
<img id="output" width="350" />
<input type="submit" name="submit" value="Upload"/>
</form>
<script>
var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
	var fileName = input.files[0].name; 
};
</script>

</body>
</html>
<?php
    if (($_FILES['my_file']['name']!="")){
// Where the file is going to be stored
	$target_dir = "uploads/";
	$file = $_FILES['my_file']['name'];
	$path = pathinfo($file);
	$filename = $path['filename'];
	$ext = $path['extension'];
	$temp_name = $_FILES['my_file']['tmp_name'];
	$path_filename_ext = $target_dir.$filename.".".$ext;
 
// Check if file already exists
if (file_exists($path_filename_ext)) {
 echo "Sorry, file already exists.";
 }else{
 move_uploaded_file($temp_name,$path_filename_ext);
 echo "Congratulations! File Uploaded Successfully.";
 }
}


?>
