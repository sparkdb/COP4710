<!--
Taken from: https://www.thecssninja.com/demo/css_tree/
For: COP4710 Database Course Group Project
Modified by: SmashDB Team
-->

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<meta name="author" content="The CSS Ninja">
	<meta name="keywords" content="CSS, Tree menu, checked pseudo-class, CSS Ninja">
	<meta name="description" content="Create a pure CSS tree folder structure with collapsible folders utilising checkboxes along with the checked pseudo-class">
	<meta name="robots" content="all">
	<meta name="copyright" content="The CSS Ninja">
	
	<!--[if gte IE 9 ]><link rel="stylesheet" type="text/css" href="_styles.css" media="screen"><![endif]-->
	<!--[if !IE]>--><link rel="stylesheet" type="text/css" href="css/_styles.css" media="screen"><!--<![endif]-->
	
	<title>Pure CSS collapsible tree menu | The CSS Ninja</title>

</head>
<body>
	
	<ol class="tree">
		<li>
			<label for="folder1">Season</label> <input type="checkbox" id="folder1" /> 
			<ol>
				<li>
					<label for="subfolder1">State</label> <input type="checkbox" id="subfolder1" /> 
					<ol>
						<li>
							<label for="subsubfolder1">Region</label> <input type="checkbox" id="subsubfolder1" /> 
							<ol>
								<li>
									<label for="subsubfolder2">City</label> <input type="checkbox" id="subsubfolder2" /> 
									<ol>
										<li>
											<label for="subsubfolder3">Player</label> <input type="checkbox" id="subsubfolder3" />
											<ol>
											<li>
												<label for="subsubfolder4">Vs.</label> <input type="checkbox" id="subsubfolder4" />
												<ol>
													<li>
														<label for="subsubfolder5">Win-Lose</label> <input type="checkbox" id="subsubfolder5" />
													</li>
												</ol>
											</li>
											</ol>
										</li>
									</ol>
								</li>
							</ol>
						</li>
					</ol>
				</li>
			</ol>
		</li>
	</ol>
	
</body>
</html>
