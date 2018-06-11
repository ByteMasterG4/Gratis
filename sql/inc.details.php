<?php 
	require_once 'db/config.php';
				 
	 $sql = "SELECT 
			    i.id, i.dealer_id, i.year, i.make, i.model, i.msrp, i.price, i.stock_no, i.vin, i.type, i.mileage,
			    d.dealer_name, d.address, d.city, d.state, d.zip, d.phone, d.email,
			    ind.series, ind.trim, ind.ext_color, ind.body_style, ind.engine, ind.certified, ind.transmission, ind.restraints,
			    ini.image1, ini.image2, ini.image3, ini.image4,
			    ino.options
			FROM 
			    inventory i
			INNER JOIN 
			    dealer d
			ON
			    i.dealer_id=d.id
			INNER JOIN 
				inventory_details ind
			ON
				i.id=ind.inventory_id
			INNER JOIN
				inventory_options ino
			ON
				i.id=ino.inventory_id
			INNER JOIN
				inventory_images ini
			ON
				i.id=ini.inventory_id
			WHERE 1
			AND 
				i.id=" .$_GET['id'].';';
	    		
	if($result = $mysqli->query($sql)){
		
	    if($result->num_rows > 0){
	         
			while($row = $result->fetch_array()){
				/* start: row 1 */
				echo '<div class="row rmb">';
				/* start: row 1 col 1 */
					echo '<div class="col-md-auto">';
						/* start: Carousel */
						echo "<div id='carouselExampleIndicators' class='carousel slide' data-ride='carousel'>";
						echo "<ol class='carousel-indicators'>";
						echo "<li data-target='#carouselExampleIndicators' data-slide-to='0' class='active'></li>";
						echo "<li data-target='#carouselExampleIndicators' data-slide-to='1'></li>";
						echo "<li data-target='#carouselExampleIndicators' data-slide-to='2'></li>";
						echo "<li data-target='#carouselExampleIndicators' data-slide-to='3'></li>";
						echo "</ol>";
						echo "<div class='carousel-inner'>";
						echo "<div class='carousel-item active'>";
						echo "<img class='d-block w-100' src='images/" .$row['image1'] . "' alt='" . $row['year'] . "&nbsp;" . $row['make'] . "&nbsp;" . $row['model'] . "'>";
						echo "</div>";
						echo "<div class='carousel-item'>";
						echo "<img class='d-block w-100' src='images/" .$row['image2'] . "' alt='" . $row['year'] . "&nbsp;" . $row['make'] . "&nbsp;" . $row['model'] . "'>";
						echo "</div>";
						echo "<div class='carousel-item'>";
						echo "<img class='d-block w-100' src='images/" .$row['image3'] . "' alt='" . $row['year'] . "&nbsp;" . $row['make'] . "&nbsp;" . $row['model'] . "'>";
						echo "</div>";
						echo "<div class='carousel-item'>";
						echo "<img class='d-block w-100' src='images/" .$row['image4'] . "' alt='" . $row['year'] . "&nbsp;" . $row['make'] . "&nbsp;" . $row['model'] . "'>";
						echo "</div>";
						echo "</div>";
						echo "<a class='carousel-control-prev' href='#carouselExampleIndicators' role='button' data-slide='prev'>";
						echo "<span class='carousel-control-prev-icon' aria-hidden='true'></span>";
						echo "<span class='sr-only'>Previous</span>";
						echo "</a>";
						echo "<a class='carousel-control-next' href='#carouselExampleIndicators' role='button' data-slide='next'>";
						echo "<span class='carousel-control-next-icon' aria-hidden='true'></span>";
						echo "<span class='sr-only'>Next</span>";
						echo "</a>";
						echo "</div>";
						/* end: Carousel */
					echo '</div>';
					/* end: row 1 col 1 */

					/* start: row 1 col 2 */
					echo "<div class='col pad'>";
					echo "<h2>" . $row['year'] . "&nbsp;" . $row['make'] . "&nbsp;" . $row['model'] . "</h2>";
					echo "<h5>" . $row['dealer_name'] . "</h5>";
					echo "<p>" . $row['address'] . "<br />". $row['city'] . ", " . $row['state'] . ", " . $row['zip'] . "<br />" . $row['phone'] . "<br /><a href='mailto:" . $row['email'] . "'>" . $row['email'] . "</a></p>";
					echo "</div>";
					echo "</div>";
					/* end: row 1 col 2 */
				echo "</div>";
				/* end: row 1 */
				
				
				/* vehicle info */
				echo "<div class='row'>";
				    echo "<div class='col-sm bar bg-primary'><h5>Vehicle Info</h5></div>";
				echo "</div>";

			    echo "<div class='row pad rmb'>";
				    echo "<div class='col-sm'>Stock #: " . $row['stock_no'] . "</div>";
				    echo "<div class='col-md-auto>" . $row['year'] . "&nbsp;" . $row['make'] . "&nbsp;" . $row['model'] . "</div>";
				    echo "<div class='col-sm'>MSRP: " . $row['msrp'] . "</div>";
					echo "<div class='col-sm'>Sale Price: " . $row['price'] . "</div>";
				    echo "<div class='col-md-auto'>VIN: " . $row['vin'] . "</div>";
				    echo "<div class='col-sm'>Type:" . $row['type'] . "</div>";
				    echo "<div class='col-sm'>Mileage: " . $row['mileage'] . "</div>";
				echo "</div>";

			    /* vehicle details */
			    echo "<div class='row'>";
				    echo "<div class='col-sm bar bg-primary'><h5>Vehicle Details</h5></div>";
				echo "</div>";
			    
			    echo "<div class='row pad rmb'>";
				    echo "<div class='col-xs cp'>Series: " . $row['series'] . "</div>";
				    echo "<div class='col-xs cp'>Trim:" . $row['trim'] . "</div>";
				    echo "<div class='col-md-auto'>Ext. Color: " . $row['ext_color'] . "</div>";
				    echo "<div class='col-md-auto'>Body Style: " . $row['body_style'] . "</div>";
				    echo "<div class='colmd-auto'>Engine: " . $row['engine'] . "</div>";
				    echo "<div class='col-xs cp'>Certified: " . $row['certified'] . "</div>";
				    echo "<div class='col-md-auto'>Transmission: " . $row['transmission'] . "</div>";
				    echo "<div class='col-sm'>Restraints: " . $row['restraints'] . "</div>";
				echo "</div>";
				
				/* vehicle options */
			    echo "<div class='row'>";
				    echo "<div class='col-sm bar bg-primary'><h5>Vehicle Options</h5></div>";
				echo "</div>";
			    
			    
			    
			    echo "<div class='row pad rmb'>";
				    echo "<div class='col'>";
				    $opt = $row['options'];
				    $string = $row['options'];
					$string = explode(",",$string);
					foreach ($string as $str) {
					    echo "<li class='lfmr'>".$str."</li>";
					}
				    echo "</div>";
				echo "</div>";
		  		
			}
        	
	        // Free result set
	        $result->free();
	    } else{
	        echo "No records matching your query were found.";
	    }
	} else{
	    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
	}
	
	$mysqli->close();
?>