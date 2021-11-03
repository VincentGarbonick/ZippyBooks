
<?php

$hostName = "localhost";
$userName = "root";
$password = "";
$dbName = "isp";

$conn = mysqli_connect($hostName, $userName, $password,$dbName);

if(isset($_POST['btn-print']))
{
    // DEPRECIATED
}
elseif(isset($_POST['sendBook']))
{
    $title = $_POST["title"];
    $price = $_POST["price"];
    $qty = $_POST["qty"];

    // get largest ID, so we can increment it
    // this would obviously not work in real life with asycnrhonous usecases, and it would be better to use 
    // some kind of sequence. This is a stretch goal. 
    $pulledValue = mysqli_fetch_array(mysqli_query($conn, "SELECT MAX(bookID) FROM zippybooksdb"));
    
    $id = $pulledValue[0]  + 1; 
    
    // if we have a qty of 0 or less, we want to set flag to true, and false otherwise 
    if($qty > 0)
    {
        $query = "insert into zippybooksdb values($id, '$title', $price, $qty, 1)";
    }
    else
    {
        $query = "insert into zippybooksdb values($id, '$title', $price, $qty, 0)";
    }
    $result = mysqli_query($conn,$query);
    
    //echo $query;
}
elseif(isset($_POST['btn-price']))
{
    // find if book exists 
    $title = $_POST["priceform_Title"];
    $price = $_POST["priceform_Price"];
            
    //$query = "SELECT * FROM zippybooksdb WHERE title = \"$title\"";
    //$query = "SELECT title FROM zippybooksdb WHERE title = Arguments for Utilitarianism";

    $query = "SELECT title FROM zippybooksdb WHERE title = \"$title\"";

    $checkPrice = mysqli_query($conn, $query);

    // if the title exists 
    if($checkPrice)
    {
        // TODO: Why does zippybooksdb work, but \"$dbName\" or $dbName doesnt?
        //$query = "UPDATE $dbName SET price = $price WHERE title = \"$title\"";
        $query = "UPDATE zippybooksdb SET price = $price WHERE title = \"$title\"";
        mysqli_query($conn, $query);
    }
}
elseif(isset($_POST['deleteBtn']))
{
    echo "hi";
    // find if book exists 
    $title = $_POST["deleteInfo"];
    $query = "SELECT title FROM zippybooksdb WHERE title = \"$title\"";
    echo $query;
    $checkPrice = mysqli_query($conn, $query);

    // if the title exists, delete it 
    if($checkPrice)
    {
        $query = "DELETE FROM zippybooksdb WHERE title = \"$title\"";
        mysqli_query($conn, $query);
    }
}
else
{
    echo "fellthrough";
}

// header("Location: ZippyBooks.php");

?>