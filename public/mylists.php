<?php

    // configuration
    require("../includes/config.php"); 

    // query database for user's lists
    $lists = query("SELECT * FROM lists WHERE id = ?", $_SESSION["id"]);

    // creates an array positions to store list information
    $positions = [];
    
    // goes through users lists and stores them in positions
    foreach ($lists as $list)
    {
        // find the question title
        $question = query("SELECT * FROM questions WHERE question_id =?", $list["question_id"]);
        
        // transfer values into array to be passed, adding the list title (question)
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

    // render portfolio
    render("mylists.php", ["title" => "My Lists", "positions" => $positions]);

?>
