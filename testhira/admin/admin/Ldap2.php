<?php // Start the session
 $sessionTimeoutSecs = 10;
 if (!isset($_SESSION)) session_start();
 
  ?>

<html>
<body>
User Login:<br /><br /><br />
<form name="userForm" action="" method="post">
Username(cts id):<input type="text" name="username" value="" /> <br /><br />
Password:<input type="password" name="userpwd" value="" /><br /><br />
<input type="submit" name="submit_form" value="submit"/>
</form>

<?php if(isset($_SESSION))
	{ echo $_SESSION['user']; }
	else{ echo "no session";}
 ?>
</body>
</html>
    

<?php
if(isset($_POST['submit_form']) && $_POST['submit_form']=="submit" ){

    global $user;

        $ldaprdn = '';
        $domain = '';
		$form_state['values']['name']=$_POST['username'];
		$form_state['values']['pass']=$_POST['userpwd'];
		
        $samaccount = trim($form_state['values']['name']);
        if (strtolower(substr(trim($form_state['values']['name']), 0, 3)) != 'cts') {
            $domain = '@cts.com';
        } else {
            $samaccount = substr(trim($form_state['values']['name']), 4);
        }

        $ldaprdn = trim($form_state['values']['name']) . $domain;     // ldap rdn or dn
        $ldappass = trim($form_state['values']['pass']);
        $ldapconfig['basedn'] = 'dc=cts,dc=com';
        $ldapconfig['authrealm'] = 'My CTS';
		
		

        //LDAP Connection to SERVER
        $ldapconn = ldap_connect("LDAP://10.237.5.185", "389") or die(ldap_error($ldapconn)); 
        ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);

        if ($ldapconn) {
            // binding to ldap server
            //print_r($ldaprdn);exit;
            $ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass) or die("Could not bind " . ldap_errno());
            //print_r($ldapbind);exit;
            // verify binding
            if ($ldapbind) {
               // echo "LDAP bind successful...";
                $_SESSION['ldapconn'] = $ldapconn;
                $_SESSION['ldapconfig'] = $ldapconfig;
				
				

                $filter1 = "(SAMAccountName=" . $samaccount . ")";
                //without attribute all the variables present in the LDAP will be displayed
                $result = ldap_search($ldapconn, $ldapconfig['basedn'], $filter1) or die("Search error.");
                $entries = ldap_get_entries($ldapconn, $result);
				
                $departments=array("EBA-Cog Interactive-Int Design","EBA-Cognizant Interactive");
                if ($entries) {
					
					
					
					$_SESSION['user'] = $entries[0]['cn'][0];
					//echo "username = ".$entries[0]['cn'][0];
					
					echo $_SESSION['user'];
					
					echo "<pre>Authenticated user details : </br />" ;  print_r($entries); 
					echo "</pre>";
					exit;
                } else {
                    echo "Ldap data not found!";
					
                    exit;
                }
            }
        } else {
			echo "Could not Connect to Server!";
            exit;
        }
	

}
?>