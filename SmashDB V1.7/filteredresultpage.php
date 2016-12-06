<!DOCTYPE HTML>

<html>
	<head>
		<?php
			include_once("mysql_connection_smashdb.php");
		?>
		<title>Filtered Result Page</title>
				
		<link rel="stylesheet" type="text/css" href="css/_styles.css" media="screen">
		
	</head>
	<body>
		<a href="home.php" id="logo">SmashDB</a>
		<form method = "post" action = "filteredresultpage.php">
			<?php
				$seasonResult = $_POST['SelectSeason'];
				$yearResult = $_POST['SelectYear'];
				$regionResult = $_POST['SelectRegion'];
				$locationResult = $_POST['SelectLocation'];
				$searchResult = $_POST['search'];
			?>
			<select name = "SelectSeason" style = "border-radius: 0.5em">
				<option value = 'Select Season'>Select Season</option>";	
				<?php
					$query = "SELECT DISTINCT name FROM season";
					$result = mysqli_query($connect, $query);
					while($mytuple = mysqli_fetch_assoc($result))
					{
						if($seasonResult == $mytuple['name'])
						{
							echo "<option selected value = '".$mytuple['name']."'>".$mytuple['name']."</option>";
						}
						else
						{
							echo "<option value = '".$mytuple['name']."'>".$mytuple['name']."</option>";
						}
					}
				?>
			</select>
			<select name = "SelectYear" style = "border-radius: 0.5em">
				<option value = 'Select Year'>Select Year</option>";	
				<?php
					$query = "SELECT DISTINCT year FROM season";
					$result = mysqli_query($connect, $query);
					while($mytuple = mysqli_fetch_assoc($result))
					{
						if($yearResult == $mytuple['year'])
						{
							echo "<option selected value = '".$mytuple['year']."'>".$mytuple['year']."</option>";
						}
						else
						{
							echo "<option value = '".$mytuple['year']."'>".$mytuple['year']."</option>";
						}
					}
				?>
			</select>
			<select name = "SelectRegion" style = "border-radius: 0.5em">
				<option value = 'Select Region'>Select Region</option>";	
				<?php
					$query = "SELECT DISTINCT region FROM location";
					$result = mysqli_query($connect, $query);
					while($mytuple = mysqli_fetch_assoc($result))
					{
						if($regionResult == $mytuple['region'])
						{
							echo "<option selected value = '".$mytuple['region']."'>".$mytuple['region']."</option>";
						}
						else
						{
							echo "<option value = '".$mytuple['region']."'>".$mytuple['region']."</option>";
						}
					}
				?>
			</select>
			<select name = "SelectLocation" style = "border-radius: 0.5em">
				<option value = 'Select Location'>Select Location</option>";	
				<?php
					if($locationResult == "Select Location")
					{
						$cityResult = "%";
						$stateResult = "%";
						$locationResult = "%";
					}
					else
					{
						$cityResult = strtok($locationResult,",");
						$stateResult = 	ltrim(strtok("\n"));
					}
					$query = "SELECT DISTINCT city,state FROM location";
					$result = mysqli_query($connect, $query);
					while($mytuple = mysqli_fetch_assoc($result))
					{
						if($cityResult == $mytuple['city'] && $stateResult == $mytuple['state'])
						{
							echo "<option selected value = '".$mytuple['city'].", ".$mytuple['state']."'>".$mytuple['city'].", ".$mytuple['state']."</option>";
						}
						else
						{
							echo "<option value = '".$mytuple['city'].", ".$mytuple['state']."'>".$mytuple['city'].", ".$mytuple['state']."</option>";
						}
					}
				?>
			</select>
			<input type = "search" name = "search" placeholder = "Search for a player">
			</input>
			<input type = "submit" style = "border-radius: 0.5em; border: 2px solid #4286f4; background-color: #4faf9e;">
			<?php
				if($seasonResult == "Select Season")
				{
					$seasonResult = "%";
				}
				if($yearResult == "Select Year")
				{
					$yearResult = "%";
				}
				if($regionResult == "Select Region")
				{
					$regionResult = "%";
				}
				if($searchResult == "")
				{
					$searchResult = "%";
				}
			?>
		</form>
	<?php				
		echo "<ol class=\"tree\"><li>";
		
		$query =
			"SELECT name, year
			FROM season
			WHERE name LIKE '$seasonResult'
				AND year LIKE '$yearResult'";
		$result = mysqli_query($connect, $query); 
		
		echo "<ol><li>";
		
		
		$i1 = 0;
		$i2 = 0;
		$i3 = 0;
		$i4 = 0;
		$i5 = 0;
		$i6 = 0;
		
		//tuple is each season
		while($tuple = mysqli_fetch_assoc($result))
		{
			echo "<label for = \"folder1_".$i1."\">".$tuple['name']." ".$tuple['year']."</label> <input type=\"checkbox\" id=\"folder1_".$i1."\" />";

			
			$query1 =
				"SELECT DISTINCT city, state
				FROM hosted_tournament_in
				WHERE season_name = '{$tuple['name']}'
					AND season_year = '{$tuple['year']}'
					AND city LIKE '$cityResult'
					AND state LIKE '$stateResult'";
			$result1 = mysqli_query($connect, $query1);
			
			echo "<ol><li>";
					
			
			//tuple1 is each city, state that had tournaments during the season
			while($tuple1 = mysqli_fetch_assoc($result1))
			{
				echo "<label for = \"folder2_".$i2."\">".$tuple1['state']."</label> <input type=\"checkbox\" id=\"folder2_".$i2."\" />";

			
				$query2 =
					"SELECT region
					FROM location
					WHERE state = '{$tuple1['state']}'
						AND city = '{$tuple1['city']}'
						AND region LIKE '$regionResult'";
				$result2 = mysqli_query($connect, $query2);

				
				echo "<ol><li>";
				
				
				//tuple2 is each region that had a tournament during the season
				while($tuple2 = mysqli_fetch_assoc($result2))
				{
					echo "<label for = \"folder3_".$i3."\">".$tuple2['region']."</label> <input type=\"checkbox\" id=\"folder3_".$i3."\" />";		
					
					$query3 =
						"SELECT city
						FROM location
						WHERE state = '{$tuple1['state']}'
							AND city = '{$tuple1['city']}'
							AND city LIKE '$cityResult'";
					$result3 = mysqli_query($connect, $query3);
					
					echo "<ol><li>";
					
						
					//tuple3 is each city that had a tournament in this season 
					while($tuple3 = mysqli_fetch_assoc($result3))
					{
						echo "<label for = \"folder4_".$i4."\">".$tuple3['city']."</label> <input type=\"checkbox\" id=\"folder4_".$i4."\" />";

					
						$query4 =
							"SELECT DISTINCT is_from.player
							FROM is_from, playedduring
							WHERE is_from.city = '{$tuple1['city']}'
								AND is_from.state = '{$tuple1['state']}'
								AND playedduring.season_name = '{$tuple['name']}'
								AND playedduring.season_year = '{$tuple['year']}'
								AND is_from.player LIKE '$searchResult'";
						$result4 = mysqli_query($connect, $query4);
						
						echo "<ol><li>";
						
						
						//tuple4 is each player that went to a tournament
						//in this season and is from this city and state 
						while($tuple4 = mysqli_fetch_assoc($result4))
						{
							echo "<label for = \"folder5_".$i5."\">".$tuple4['player']."</label> <input type=\"checkbox\" id=\"folder5_".$i5."\" />";

								
							$query5 =
								"CREATE VIEW head_to_head AS
								SELECT play_in.player_one, play_in.player_two, sets.player_one_wins, sets.player_two_wins, sets.set_id
								FROM play_in, sets
								WHERE play_in.player_one = '{$tuple4['player']}'
									AND play_in.set_id = sets.set_id

								UNION

								SELECT play_in.player_two, play_in.player_one, sets.player_two_wins, sets.player_one_wins, sets.set_id
								FROM play_in, sets
								WHERE play_in.player_two = '{$tuple4['player']}'
									AND play_in.set_id = sets.set_id;";
								
							$result5 = mysqli_query($connect, $query5);
							
							$query5 =
								"SELECT player_one, player_two AS opponent, SUM(player_one_wins) AS player_one_total_wins, SUM(player_two_wins) AS opponent_wins
								FROM head_to_head
								WHERE set_id = ANY (SELECT sets.set_id
												 FROM sets, has, tournaments
												 WHERE sets.set_id = has.set_id
													AND has.tournament_name = tournaments.name
													AND tournaments.name = ANY(SELECT was_during.tournament_name
																			FROM was_during, season
																			WHERE was_during.season_name = season.name
																				AND was_during.season_year = season.year
																				AND was_during.season_name = '{$tuple['name']}'
																				AND was_during.season_year = '{$tuple['year']}'
																				)
												)
								GROUP BY player_one, player_two;";
	
							$result5 = mysqli_query($connect, $query5);

							
							echo "<ol>";
							
							
							while($tuple5 = mysqli_fetch_assoc($result5))
							{
								echo "<li label for = \"folder6_".$i6."\">vs. ".$tuple5['opponent']." ".$tuple5['player_one_total_wins']." - ".$tuple5['opponent_wins']."</label> <input type=\"checkbox\" id=\"folder6_".$i6."\" /></li>";
								$i6++;
							}
							
							
							
							$query5 = "DROP VIEW head_to_head;";
	
							$result5 = mysqli_query($connect, $query5);

							
							echo "</ol>";
												
							$i5++;						
						
						}
						echo "</li></ol>";
						
						$i4++;
					}
					echo "</li></ol>";
					
					$i3++;
				}
				echo "</li></ol>";
				
				$i2++;
			}
			echo "</li></ol>";
			
			$i1++;
		}
		echo "</li></ol>";
		
	?>
	</body>
</html>