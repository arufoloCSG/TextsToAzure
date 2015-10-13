<!DOCTYPE html>
<html>
<body>

<?php
echo "<h2>PHP is Fun!</h2>";

echo "Opening Connection to Azure <br>";
$conn = OpenConnection();

echo "Connection Established <br>";

echo "Inserting Data by Executing TSQL Command<br>";
InsertData($conn);

echo "Insert complete";

function OpenConnection()
{
    try
    {
        $serverName = "tcp:j7luugiwb8.database.windows.net,1433";
        $connectionOptions = array("Database"=>"Texting_APP",
            "Uid"=>"arufolo@cardinalsolutions.com@j7luugiwb8", "PWD"=>"P@ssw0rd1");
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if($conn == false)
            die(FormatErrors(sqlsrv_errors()));
		
		return $conn;
    }
    catch(Exception $e)
    {
        echo("Error!");
    }
}

function InsertData($conn)
{	
echo "Inside The Insert Function <br>";

    //try
    //{
        $tsql = "INSERT INTO TextQueue (PhoneNumber, TextContent) VALUES ('+17047856193', 'This is a test insert' )";
        echo "TSQL Query: ".$tsql."<br>";
        $insertReview = sqlsrv_query($conn, $tsql);
		echo "Insert Review: ".$insertReview."<br>";
		
        if($insertReview == FALSE)
		{
			echo "Dying <br>";
            die(FormatErrors( sqlsrv_errors())); 
		}
        while($row = sqlsrv_fetch_array($insertReview, SQLSRV_FETCH_ASSOC))
        { 
            echo($row['ID']);
        }
		/*
        sqlsrv_free_stmt($insertReview);
        sqlsrv_close($conn);
    }
    catch(Exception $e)
    {
        echo("Error!");
    }
	*/
}
?>  

</body>
</html>