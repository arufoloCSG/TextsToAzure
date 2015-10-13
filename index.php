<html>
<head>
<Title>Texts To Azure</Title>
</head>
<body>
<h1>Texts To Azure!</h1>

<?php
/**
 * This section ensures that Twilio gets a response.
 */
header('Content-type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<Response>"Thank you for your reply."</Response>'; //Place the desired response (if any) here
 
//InsertData({$_REQUEST['From']}, {$_REQUEST['Body']});
 
 
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
    }
    catch(Exception $e)
    {
        echo("Error!");
    }
}

?>

</body>
</html>