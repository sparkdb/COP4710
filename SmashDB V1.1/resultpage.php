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
						
						//have a player from the city
						while($tuple4 = mysqli_fetch_assoc($result4))
						{
							echo "&emsp;&emsp;&emsp;&emsp;{$tuple4['player']}<br>";
							
							$query = "CREATE VIEW head_to_head AS
							SELECT play_in.player_one, play_in.player_two, sets.player_one_wins, sets.player_two_wins
							FROM play_in, sets
							WHERE play_in.player_one = '{$tuple4['player']}' AND play_in.set_id = sets.set_id

							UNION

							SELECT play_in.player_two, play_in.player_one, sets.player_two_wins, sets.player_one_wins
							FROM play_in, sets
							WHERE play_in.player_two = '{$tuple4['player']}' AND play_in.set_id = sets.set_id;";
							
							$result5 = mysqli_query($connect, $query);
							
							$query = "SELECT player_one, player_two AS opponent, SUM(player_one_wins) AS player_one_total_wins, SUM(player_two_wins) AS opponent_wins
							FROM head_to_head
							GROUP BY player_one, player_two;";
	
							$result5 = mysqli_query($connect, $query);
							
							while($tuple5 = mysqli_fetch_assoc($result5))
							{
								echo "&emsp;&emsp;&emsp;&emsp;&emsp;vs. {$tuple5['opponent']} {$tuple5['player_one_total_wins']} - {$tuple5['opponent_wins']}<br>";
							}
							
							$query = "DROP VIEW head_to_head;";
	
							$result5 = mysqli_query($connect, $query);
							
							/*
							$query = "SELECT player_one, player_two, set_id FROM play_in WHERE player_one = '{$tuple4['player']}' OR player_two = '{$tuple4['player']}'";
							$result5 = mysqli_query($connect, $query);
							
							$player_one_total_wins = 0;
							$player_two_total_wins = 0;
							$player_number = 1;
							
							///have all set_id's of matches the player played in
							while($tuple5 = mysqli_fetch_assoc($result5))
							{	
								$player_one_name =  $tuple5['player_one'];
								$player_two_name =  $tuple5['player_two'];
								
								if($tuple5['player_two'] == $tuple4['player'])
								{
									$player_one_name = $tuple5['player_two'];
									$player_two_name = $tuple5['player_one'];
									$player_number = 2;
								}
								
								$query = "SELECT player_two_wins, player_one_wins FROM sets WHERE set_id = '{$tuple5['set_id']}'";									
								$result7 = mysqli_query($connect, $query);
								
								//have wins of each  player that played in the set
								while($tuple7 = mysqli_fetch_assoc($result7))
								{
									if($player_number == 1)
									{
										$player_one_total_wins += $tuple7['player_one_wins'];
										$player_two_total_wins += $tuple7['player_two_wins'];	
									}
									else if($player_number == 2)
									{
										$player_one_total_wins += $tuple7['player_two_wins'];
										$player_two_total_wins += $tuple7['player_one_wins'];
									}
								}	
							}
							
							echo "&emsp;&emsp;&emsp;&emsp;&emsp;vs. $player_two_name ";
							
							echo "$player_one_total_wins - $player_two_total_wins<br>";	
							*/
						}
					}
				}
			}
		}
		
		echo "<br>Hello, Daddy Sakurai";
	?>
<html>