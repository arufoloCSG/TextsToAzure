<?php
/**
 * This section ensures that Twilio gets a response.
 */
header('Content-type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<Response>Thank you for your reply!</Response>'; //Place the desired response (if any) here
?>