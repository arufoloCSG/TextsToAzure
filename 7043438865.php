<?php
/**
 * This section ensures that Twilio gets a response.
 */
header('Content-type: text/xml');
$from = $_REQUEST['From'];
$body = $_REQUEST['Body'];
$to = "+17043438865";
$caseStudy = "Case Study 1";
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<Response><Message>Thank you for your reply to '.$caseStudy.'</Message></Response>';

$conn = OpenConnection();

if(!empty($from)) {
	InsertData($from, $body, $to, $caseStudy, $conn);
	sqlsrv_close($conn);
}
else
{
	sqlsrv_close($conn);
}
 
 
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

function InsertData($from, $body, $to, $caseStudy, $conn)
{	
    try
    {
        $tsql = "INSERT INTO TextQueue (PhoneNumber, TextContent, TextTo, CaseStudy) VALUES ('".$from."', '".$body."', '".$to."', '".$caseStudy."')";
        $insertReview = sqlsrv_query($conn, $tsql);
		
        if($insertReview == FALSE)
		{
            die(FormatErrors( sqlsrv_errors())); 
		}
        while($row = sqlsrv_fetch_array($insertReview, SQLSRV_FETCH_ASSOC))
        { 
            echo($row['ID']);
        }		
    }
    catch(Exception $e)
    {
        echo("Error!");
    }
	
}

?>
