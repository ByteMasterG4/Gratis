<?php
	require_once 'db/config.php';
 
	$sql = "SELECT 
				i.id, i.dealer_id, i.year, i.make, i.model,
				i.msrp, i.price, i.stock_no, d.dealer_name,
				d.address, d.city, d.state, d.zip, d.phone, d.email,
				ini.image1
			FROM 
			    inventory i
			INNER JOIN 
			    dealer d
			ON
				i.dealer_id=d.id
			INNER JOIN
				inventory_images ini
			ON
				i.id=ini.inventory_id;";
    		
	if($result = $mysqli->query($sql)){
		if($result->num_rows > 0){
		    echo "<div class='row'>";   
		    while($row = $result->fetch_array()){
		        echo "<div class='row well'>";
		        echo "<div class='col'><a href='details.php?id=" . $row['id'] . "'><img src='images/". $row['image1'] ."' class='img-thumbnail thumbnail thumb' /></a></div>";
		        echo "<div class='col'>Stock #: " . $row['stock_no'] . "</div>";
		        echo "<div class='col-md-auto'>" . $row['year'] . "&nbsp;" . $row['make'] ."&nbsp;" . $row['model'] . "</div>";
				echo "<div class='col-md-auto'>Sale Price: " . $row['price'] . "</div>";
				echo "<div class='col-md-auto'>" . $row['dealer_name'] . "</div>";
		        echo "<div class='col-md-auto'>" . $row['city'] . ", " . $row['state'] . "</div>";
		        echo "<div class='col'>" . $row['phone'] . "</div>";
		        echo "<div class='col-md-auto'><a href='mailto:" . $row['email'] . "' /a>" . $row['email'] . "</div>";
		        echo "</div>";
		    }
		    echo "</div>";
		    
		    $result->free();
		} else{
		    echo "No records matching your query were found.";
		}
	} else{
		echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
	}
	
 	$mysqli->close();

?>