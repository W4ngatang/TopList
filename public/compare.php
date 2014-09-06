<?php

    // configuration
    require("../includes/config.php"); 

    // query database for user's lists
    $lists = query("SELECT * FROM lists WHERE id = ?", $_SESSION["id"]);

    // creates an array positions to store list information
    $positions = [];
    
    // create array to store all the info and be passed to render
    foreach ($lists as $list)
    {
        // find the list title
        $question = query("SELECT * FROM questions WHERE question_id =?", $list["question_id"]);
        
        // store the info
        $positions[] = [
            "question" => $question[0]["question"],
            "0" => $list["r0"],
            "1" => $list["r1"],
            "2" => $list["r2"],
            "3" => $list["r3"],
            "4" => $list["r4"],
            "5" => $list["r5"],
            "6" => $list["r6"],
            "7" => $list["r7"],
            "8" => $list["r8"],
            "9" => $list["r9"],
            ];
    }

    // finds the top ten responses for each list and returns it as one giant array       
    $lists2 = query("SELECT `question_id`,`response`,`frequency` FROM responses WHERE (SELECT COUNT(*) FROM responses AS r WHERE r.question_id = responses.question_id AND r.frequency >= responses.frequency) <= 10 ORDER BY question_id, frequency DESC");

    // creates an array better formated to print lists
    $aggregates = NULL;

    // transfers list of responses + frequency into array to be printed
    for ($i = 0; $i < (count($lists2) / 10); $i++)
    {
        $question = query("SELECT * FROM questions WHERE question_id = ?", $lists2[10 * $i]["question_id"]);
        $aggregates[$question[0]["question"]][0] = $question[0]["question"];
        
        for ($j = 1; $j <= 10 ; $j++)
        {           
            $aggregates[$question[0]["question"]][$j] = $lists2[10 * $i + $j - 1];
        }      
    }

    // render compare
    render("compare.php", ["title" => "My Lists", "positions" => $positions, "aggregates" => $aggregates]);

?>
