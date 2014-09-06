<?php

    // configuration
    require("../includes/config.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // if title is empty
        if (empty($_POST["title"]))
        {
            apologize("Please enter a list title");
        }
        
        // inserts question into question databse if original
        query("INSERT INTO questions (question) VALUES(?)", $_POST["title"]);

        // find question id for reference
        $question = query("SELECT * FROM questions WHERE question = ?", $_POST["title"]);        
        
        // insert into list database      
        $insert = query("INSERT INTO lists (id, question_id, r0, r1, r2, r3, r4, r5, r6, r7, r8, r9) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", 
        $_SESSION["id"], $question[0]["question_id"], $_POST["0"], $_POST["1"], $_POST["2"], $_POST["3"], $_POST["4"], $_POST["5"], $_POST["6"], $_POST["7"], $_POST["8"], $_POST["9"]);
        
        if ($insert === false)
        {                        
            // if false, then user already has a list for that topic
            // update frequency by removing previous responses
            for ($i = 0; $i < 10; $i++)
            {
                query("UPDATE responses SET frequency = frequency - ? WHERE question_id = ? AND response = ?", 10 - $i, $question[0]["question_id"], $_POST[$i]);
            }
            
            // edits user's list            
            query("UPDATE lists SET r0=?,r1=?,r2=?,r3=?,r4=?,r5=?,r6=?,r7=?,r8=?,r9=? WHERE id=? and question_id=?", 
            $_POST["0"], $_POST["1"], $_POST["2"], $_POST["3"], $_POST["4"], $_POST["5"], $_POST["6"], $_POST["7"], $_POST["8"], $_POST["9"],$_SESSION["id"], $question[0]["question_id"]);
        }
        
        // update frequency
        for ($i = 0; $i < 10; $i++)
        {        
            // only adds into frequency if not blank
            if (!empty($_POST[$i]))
            {
                // adds response if new answer, otherwise updates frequency
                query("INSERT INTO responses (question_id, response, frequency) VALUES(?,?,?) ON DUPLICATE KEY UPDATE frequency = frequency + ?", $question[0]["question_id"], $_POST[$i], 10 - $i, 10 - $i);
            }
        }       
        
        // bring user back to home
        redirect("/");
    }
    else
    {
        // else render page
        render("createlist_form.php", ["title" => "Create a List"]);
    }
?>
