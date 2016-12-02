<!DOCTYPE HTML>
<html>
	<?php

		include_once("mysql_connection_smashdb.php");
		
		$query = "SELECT * FROM season";
		$result = mysqli_query($connect, $query); 
		
		while($tuple = mysqli_fetch_assoc($result))
		{
			echo "{$tuple['name']} ";
			echo "{$tuple['year']}<br>";
		
			$query = "SELECT state FROM hosted_tournament_in WHERE season_name = '{$tuple['name']}' AND season_year = '{$tuple['year']}'";
			$result1 = mysqli_query($connect, $query);
			
			while($tuple1 = mysqli_fetch_assoc($result1))
			{
				echo "&emsp;{$tuple1['state']}<br>";
				
				$query = "SELECT region FROM location WHERE state = '{$tuple1['state']}'";
				$result2 = mysqli_query($connect, $query);
				
				while($tuple2 = mysqli_fetch_assoc($result2))
				{
					echo "&emsp;&emsp;{$tuple2['region']}<br>";
					
					$query = "SELECT city FROM location WHERE region = '{$tuple2['region']}'";
					$result3 = mysqli_query($connect, $query);
					
					while($tuple3 = mysqli_fetch_assoc($result3))
					{
						echo "&emsp;&emsp;&emsp;{$tuple3['city']}<br>";
					
						$query = "SELECT player FROM is_from WHERE city = '{$tuple3['city']}' AND state = '{$tuple1['state']}'";
						$result4 = mysqli_query($connect, $query);
						
						while($tuple4 = mysqli_fetch_assoc($result4))
						{
							echo "&emsp;&emsp;&emsp;&emsp;{$tuple4['player']}<br>";
							
							$query = "SELECT player_one, player_two, set_id FROM play_in WHERE player_one = '{$tuple4['player']}' OR player_two = '{$tuple4['player']}'";
							$result5 = mysqli_query($connect, $query);
							
							$player_one_total_wins = 0;
							$player_two_total_wins = 0;
									
							while($tuple5 = mysqli_fetch_assoc($result5))
							{	
								if($tuple5['player_one'] == $tuple4['player'])
								{
									echo "&emsp;&emsp;&emsp;&emsp;&emsp;vs. {$tuple5['player_two']} ";
							
									$query = "SELECT player_two_wins, player_one_wins FROM sets WHERE set_id = '{$tuple5['set_id']}'";									
									$result7 = mysqli_query($connect, $query);
									
									while($tuple7 = mysqli_fetch_assoc($result7))
									{
										$player_one_total_wins += $tuple7['player_one_wins'];
										$player_two_total_wins += $tuple7['player_two_wins'];
									}
								}
								else if($tuple5['player_two'] == $tuple4['player'])
								{
									echo "&emsp;&emsp;&emsp;&emsp;&emsp;vs. {$tuple5['player_one']} ";
									
									$query = "SELECT player_two_wins, player_one_wins FROM sets WHERE set_id = '{$tuple5['set_id']}'";
									$result7 = mysqli_query($connect, $query);
									
									while($tuple7 = mysqli_fetch_assoc($result7))
									{
										$player_one_total_wins += $tuple7['player_one_wins'];
										$player_two_total_wins += $tuple7['player_two_wins'];
									}
								}
								
								if($tuple5['player_one'] == $tuple4['player'])
								{
									echo "$player_one_total_wins - $player_two_total_wins<br>";									
								}
								else if($tuple5['player_two'] == $tuple4['player'])
								{
									echo "$player_two_total_wins - $player_one_total_wins<br>";									
								}
							}
						}
					}
				}
			}
		}
		
		echo "<br>Hello, Daddy Sakurai";
	?>
<html>