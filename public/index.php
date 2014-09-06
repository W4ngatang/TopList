<?php

    // configuration
    require("../includes/config.php"); 
  
    // finds the ten most frequency responses for each question and returns it as one giant array       
    $lists = query("SELECT `question_id`,`response`,`frequency` FROM responses WHERE (SELECT COUNT(*) FROM responses AS r WHERE r.question_id = responses.question_id AND r.frequency >= responses.frequency) <= 10 ORDER BY question_id, frequency DESC");

    // creates an array better formated to print lists
    $aggregates = NULL;

    // transfers list of responses and the frequency into array to be printed
    for ($i = 0; $i < (count($lists) / 10); $i++)
    {
        // find the question id for reference
        $question = query("SELECT * FROM questions WHERE question_id = ?", $lists[10 * $i]["question_id"]);
        $aggregates[$i][0] = $question[0]["question"];
        
        // for loop to ease the process of transfering values into the new array
        for ($j = 1; $j <= 10 ; $j++)
        {           
            $aggregates[$i][$j] = $lists[10 * $i + $j - 1];
        }      
    }

    // render home
    render("home.php", ["title" => "Home", "aggregates" => $aggregates]);
?>
