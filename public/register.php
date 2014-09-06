<?php

    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // if a field is left blank or passwords don't match, brings up error message
        if (empty($_POST["username"]) || empty($_POST["password"]))
        {
            apologize("All forms must be filled to register.");
        }
        else if ($_POST["password"] != $_POST["confirmation"])
        {
            apologize("Passwords must match!");
        }
         
        // inserts new user into database
        if (query("INSERT INTO users (username, hash) VALUES(?,?)", $_POST["username"], crypt($_POST["password"])) === false)
        {
            // bring up error if failed
            apologize("Username already exists! Register a new username or login.");
        }
        else
        {
            // then log user in
            $rows = query("SELECT LAST_INSERT_ID() AS id");
            $_SESSION["id"] = $rows[0]["id"];
            redirect("/");
        }   
    }
    else
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }
    
?>
