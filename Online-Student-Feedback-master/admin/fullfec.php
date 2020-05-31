<?php 
	session_start();
	include "../bucket.php";
	$obDBRel = new DBRel;
	$obDBRel->redirect();
?>
<!DOCTYPE html>
	<head>
		<title>Feedback - Admin</title>
		<link rel="stylesheet" type="text/css" href="fullfec.css">
	</head>
	<body>
		<header>
                        <a href='feedback.php'><img src="../images/back.png"></a>
			<img src ="../images/tellus-logo.png"/>
			<span>
				<a href="../logout.php">Logout</a>
			</span>
		</header>
		<article>
			<h1>Complete Feedback:</h1>
			<div class=output>
					<?php
						$obDBRelb = new DBRel;
						$conn=$obDBRelb->DBConn();
						$sql="Select * from feedback order by Fed_No asc";
						$result = $conn->query($sql);

						echo "<table class=slist>";
						echo "<tr>";
						echo 	"<th>Feedback No.</td>";
						echo 	"<th>Roll No.</td>";
						echo 	"<th>Subject Name</td>";
						echo 	"<th>Feedback</td>";
                                                echo    "<th>Q1</td>";
                                                echo    "<th>Q2</td>";
                                                echo    "<th>Q3</td>";
                                                echo    "<th>Avg</td>";
						echo "</tr>";

						if($result->num_rows > 0)
							while($row = $result->fetch_assoc()){
								echo "<tr>";
								echo 	"<td>" . $row["Fed_No"] . "</td>";
								echo 	"<td>" . $row["Roll_No"] . "</td>";
								echo 	"<td>" . $row["Sub_Name"] . "</td>";
								echo 	"<td>" . $row["Feedback"] . "</td>";
                                                                echo 	"<td>" . $row["q1"] . "</td>";
                                                                echo 	"<td>" . $row["q2"] . "</td>";
                                                                echo 	"<td>" . $row["q3"] . "</td>";
                                                                $tot=$row["q1"]+$row["q2"]+$row["q3"];
                                                                $avg=$tot/3;
                                                                echo    "<td>" . round($avg) . "</td>";
								echo "</tr>";
						}

						echo "</table>";

						$conn->close();
					?>
				</div>
			</article>
	</body>
</html>