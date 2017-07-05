<?php include 'database.php'; ?>
<?php
	if(isset($_POST['submit'])){
		//Get post variables
		$question_number = $_POST['question_number'];
		$question_text = $_POST['question_text'];
		$correct_choice = $_POST['correct_choice'];
		//Choices array
		$choices = array();
		$choices[1] = $_POST['choice1'];
		$choices[2] = $_POST['choice2'];
		$choices[3] = $_POST['choice3'];
		$choices[4] = $_POST['choice4'];
		
		
		//Question query
		$query = "INSERT INTO 'questions'(question_number, text)
					VALUES('$question_number','$question_text')";
					
		//Run query
		$insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
		
		//Validate insert
		if($insert_row){
			foreach($choices as $choice => $value){
				if($value != ''){
					if($correct_choice == $choice){
						$is_correct = 1;
					} else {
						$is_correct = 0;
					}
					//Choice query
					$query = "INSERT INTO `choices` (question_number, is_correct, text)
							VALUES ('$question_number','$is_correct','$value')";
							
					//Run query
					$insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
					
					//Validate insert
					if($insert_row){
						continue;
					} else {
						die('Error : ('.$mysqli->errno . ') '. $mysqli->error);
					}
				}
			}
			$msg = 'Question has been added';
		}
	}
	
	/*
 	* Get total questions
	*/
	$query = "SELECT * FROM `questions`";
	//Get The Results
	$questions = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total = $questions->num_rows;
	$next = $total+1;
?>
<DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>PHP MYSQL Evaluation Test</title>
<link rel ="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
<header>
<div class="container">
<h1>PHP MYSQL Evaluation Test</h1>
</div>
</header>
<main>
<div class="container">
<h2>Add a Question</h1>
<form method="post" action="add.php">
<p>
<label>Queestion Number</label>
<input type="number" name="Question Number " />
</p>

<p>
<label>Queestion Text</label>
<input type="text" name="Question text " />
</p>
<p>
<label>Choice #1</label>
<input type="text" name="Choice1" />
</p>
<label>Choice #2</label>
<input type="text" name="Choice2" />
</p>
<label>Choice #3</label>
<input type="text" name="Choice3" />
</p>
<label>Choice #4</label>
<input type="text" name="Choice4" />

<p>
<label>Correct Choice Number</label>
<input type="number" name="correct_choice" />

</p>
<p>
<input type="submit" name="submit" value="Submit" />
</p>
</form>
</div>
</main>
<footer>
<div class="container">
</div>
</footer>
</body>
</html>