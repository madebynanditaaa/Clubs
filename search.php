<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$usersearch = $_POST["usersearch"];

try
{
require "includes/dbh.inc.php";
$query = "Select * from comments where username = :u;";
$stmt = $pdo->prepare($query);

$stmt->bindParam(":u", $usersearch);

$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//fetch() for 1 piece of data.
//fetchAll to output all data
$pdo = null;
$stmt = null;
}
catch(PDOException $e)
{
die("QueryFailed: " . $e->getMessage());

}
}
else
{
    header("Location: ../index.php");
}

?>

<DOCTYE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/main.css">
        <title>Document</title>
    </head>

    <body>
        <section>
       <h3>Search Results:</h3>
       <?php
       if(empty($results))
       {
        echo "<div>";
        echo "<p>There were no results</p>";
        echo "</div>";
       }
       else{
        foreach($results as $row)
        {
            echo "</div>";
            echo "<h4>" . htmlspecialchars($row["username"]) . "</h4>";
            echo "<p>" . htmlspecialchars($row["comment_text"]) . "</p>";
            echo "<p>" . htmlspecialchars($row["created_at"]) . "</p>";
            echo "</div>";
        }
       }
       ?>
       </section>
    </body>
</html>
