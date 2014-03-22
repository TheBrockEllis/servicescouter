<?php

				$xml_content = file_get_contents('https://www.google.com/accounts/o8/id');

				$xml = simplexml_load_string($xml_content);
    $service = $xml->XRD->Service;
    $endpoint_uri = $service->URI;
				
				$redirect_to_uri = 'http://www.servicescouter.com/home.php';

?>
<HTML>
<HEAD>
				<TITLE>Google Login</TITLE>
</HEAD>
<BODY>

<form method='post' action='<?php echo $endpoint_uri; ?>'>

    <input type='hidden' name='openid.return_to' value='<?php echo $redirect_to_uri; ?>' />

    <input type='hidden' name='openid.mode' value='checkid_setup' />
    <input type='hidden' name='openid.ns' value='http://specs.openid.net/auth/2.0' />
    <input type='hidden' name='openid.claimed_id' value='http://specs.openid.net/auth/2.0/identifier_select' />
    <input type='hidden' name='openid.identity' value='http://specs.openid.net/auth/2.0/identifier_select' />

    <input type='hidden' name='openid.ns.ax' value='http://openid.net/srv/ax/1.0' />
    <input type='hidden' name='openid.ax.mode' value='fetch_request' />
    <input type='hidden' name='openid.ax.required' value='email,firstname,lastname' />
    <input type='hidden' name='openid.ax.type.email' value='http://axschema.org/contact/email' />
    <input type='hidden' name='openid.ax.type.firstname' value='http://axschema.org/namePerson/first' />
    <input type='hidden' name='openid.ax.type.lastname' value='http://axschema.org/namePerson/last' />

    <input type='submit' value='Login With Google Account' />

</form>

</BODY>
</HTML>