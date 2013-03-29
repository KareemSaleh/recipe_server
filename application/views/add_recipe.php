<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Add Recipe</title>
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	</head>
	<body>
		<div class="container">
			<form action="/api/add" method="post">
			  <fieldset>
			    <legend>Add Recipe</legend>
			    <label>Name</label>
			    <input type="text" placeholder="ex. Chocolate Chip cookies..." id="name" name="name">
			    <label>Duration</label>
			    <input type="text" placeholder="Minutes…" id="duration" name="duration">
			    <label>Preperation</label><span class="help-block">(One item per line)</span>
			    <textarea rows="6" style="width:600px" id="prep" name="prep" placeholder="1 cup sugar..."></textarea>
			    <label>Steps</label><span class="help-block">(One step per line)</span>
			    <textarea rows="6" style="width:600px" id="steps" name="steps" placeholder="Don't worry about step numbers..."></textarea>
			    <label>Meal of the day</label>
			    <select rows="6" id="mealtype" name="mealtype">
			    	<option option="selected">Breakfast</option>
					<option>Lunch</option>
					<option>Dinner</option>
					<option>Dessert</option>
			    </select>
			    <br>
			    <button type="submit" class="btn">Submit</button>
			  </fieldset>
			</form>
		</div>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script>
			$(function() {
				
				// Quick Validation
			    $('form').submit(function() {
			    	var emptyFields = false;
			    	$('input, textarea').each(function() {
					   if($(this).val() === "") {
						    alert("Empty Field at " + this.name);
							emptyFields = true;
						}
					});

					if(!emptyFields) {
					    var num = $('#duration').val();
					    if(isNaN(parseInt(num)) || !isFinite(num)) {
					    	alert("Duration should be a number in minutes!");
					    	return false;
						}
						return true;
					} else {
						return false;
					}
			    });
		    });
		</script>
	</body>
</html>