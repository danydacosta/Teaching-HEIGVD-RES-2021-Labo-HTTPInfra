<?php
    $dynamic_app_1 = getenv('DYNAMIC_APP_1');
    $dynamic_app_2 = getenv('DYNAMIC_APP_2');
    $static_app_1 = getenv('STATIC_APP_1');
    $static_app_2 = getenv('STATIC_APP_2');
?>

<VirtualHost *:80>

	ServerName demo.res.ch

	<Proxy "balancer://dynamicWeb">
		BalancerMember "http://<?php print "$dynamic_app_1"?>"
		BalancerMember "http://<?php print "$dynamic_app_2"?>"
	</Proxy> 

	ProxyPass '/api/students/' 'balancer://dynamicWeb/'
	ProxyPassReverse '/api/students/' 'balancer://dynamicWeb/'


	<Proxy "balancer://staticWeb">
                BalancerMember "http://<?php print "$static_app_1"?>"
                BalancerMember "http://<?php print "$static_app_2"?>"
        </Proxy>

	ProxyPass '/' 'balancer://staticWeb/'
        ProxyPassReverse '/' 'balancer://staticWeb/'

</VirtualHost>
