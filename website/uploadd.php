<!DOCTYPE html>
<html>



<head>
    <title>
        asdsad
    </title>
</head>
<body>
    
        <h1>Upload</h1>

<div class="container">
<form id="form" action="upload.php" method="POST" enctype="multipart/form-data">

<label for="Title">Title</label>
<input type="text" name="Title" id="Title" placeholder="Enter the title"> <br> <br> <br>

<label for="Price">Price</label>
<input type="text" name="Price" id="Price" placeholder="0.1€ - 3€"> <br> <br> <br>

<label for="Genre">Genre</label>
<select name="Genre" id="Genre">
<option disabled >Choose genre</option>
<option value="Rap">Rap</option>
<option value="HipHop">HipHop</option>
</select>


<input type='submit' value='Submit' name='Submit'>
</div>


</form>

</body>
</html>