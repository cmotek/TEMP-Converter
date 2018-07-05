<!--Start form in HTML -->
<!DOCTYPE html>
<html>
<head>
    <title>Temperature Conversion Calculator</title>
    <link rel="stylesheet" type="text/css" href="main2.css">
    
</head>

<body>
    <h3>Temperature Conversion Calculator</h3>
    <?php if (!empty($error_message)) { ?>
        <p class="error"><?php echo htmlspecialchars($error_message); ?></p>
    <?php } ?>
    <form action="" method="post">
	<table>
		<tr>
			<td>
				<select name="initial_degree">
					<option value="fahrenheit">Fahrenheit</option>
					<option value="celsius">Celsius</option>
					<option value="kelvin"> Kelvin</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<input type="text" name="temp_input_value">
			</td>
		</tr>
		<tr>
			<td>
				<select name="final_degree">
					<option value="fahrenheit">Fahrenheit</option>
					<option value="celsius">Celsius</option>
					<option value="kelvin">Kelvin</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="convert" value="Convert">
			</td>
		</tr>
		<tr> <!-- Set this php script below so the output will show below the drop down lost -->
			<td>
				<?php
				if(isset($_POST['convert']))

				{
                    $initial_degree=$_POST['initial_degree'];
					$final_degree=$_POST['final_degree'];
					$temp_input_value=$_POST['temp_input_value'];
                    $final_value = $temp_input_value;
//Fahrenheit converter
if ($initial_degree == 'fahrenheit') {
    if ($final_degree == 'celsius') {
    $final_value = 5/9 * ($temp_input_value - 32);
    } else if ($final_degree == 'kelvin') {
    $final_value = 5/9 * ($temp_input_value + 459.67);
    } 

} else if ($initial_degree == 'celsius') {
    if ($final_degree == 'fahrenheit') {
    $final_value = ($temp_input_value*9/5)+32;
    } else if ($final_degree =='kelvin') {
    $final_value = $temp_input_value+273.15;
    }  
    
} else if ($initial_degree == 'kelvin') {
    if ($final_degree == 'fahrenheit'){
    $final_value = (9/5 * $temp_input_value) - 459.67;
} else if ($final_degree == 'celsius') {
    $final_value = $temp_input_value-273.15;
    } 
}
  echo number_format($temp_input_value, 2) . " " . ucfirst($initial_degree) . " = " . number_format($final_value, 2) . " " . ucfirst($final_degree);
                    }
				?>
			</td>
		</tr>
	</table>
	</form>
</body>
</html>