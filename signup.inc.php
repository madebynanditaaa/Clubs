<?php
if($_SERVER["REQUEST_METHOD"] === "POST")
{
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];


    try
    {
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';
        
        //ERROR HANDLERS.
 
        $errors = [];
        if(is_input_empty($username, $pwd, $email))
        {
            $errors["empty_input"] = "<p class = 'error-container'>" . "Fill in all fields!!" . "</p>";
        }
        if(is_email_invalid($email))
        {
            $errors["invalid_email"] = "<p class = 'error-container'>" ."Invalid Email Used" . "</p>";
        }
        if(is_username_taken($pdo, $username))
        {
            $errors["username_taken"] = "<p class = 'error-container'>" . "Try a different username. This one is already Taken" . "</p>";
        }
        if(is_email_registered($pdo, $email))
        {
            $errors["email_used"] = "<p class = 'error-container'>" . "Email already registered" . "</p>";
        }

       //we could use this: 
       //session_starts(); // but we have a much safer way to use sessions into out file.
       require_once 'config_session.inc.php'; //this is a safer way to start a session.(just linking a the required file here.)
       
        if($errors)
        {
           $_SESSION["errors_signup"] = $errors;
           header("Location: ../index.php");
           die();
        }    
        create_user($pdo, $pwd, $username, $email);
        header("Location: ../index.php?signup=success");
        $pdo = null;
        $stmt = null;

        die();
}
    catch(PDOException $e)
    {
        die("Query Failed: " . $e->getMessage());
    }
}
else
{
    header("Location: ../index.php");
    die();
}