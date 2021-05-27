<?php
    $dynamic_app = getenv('DYNAMIC_APP');
    $static_app = getenv('STATIC_APP');
?>

<VirtualHost *:80>

	ServerName demo.res.ch

	ProxyPass '/api/students/' 'http://<?php print "$dynamic_app"?>/'
	ProxyPassReverse '/api/students/' 'http://<?php print "$dynamic_app"?>/'

	ProxyPass '/api/students/ocean/' 'http://<?php print "$dynamic_app"?>/ocean/'
        ProxyPassReverse '/api/students/ocean/' 'http://<?php print "$dynamic_app"?>/ocean/'

	ProxyPass '/api/students/desert/' 'http://<?php print "$dynamic_app"?>/desert/'
        ProxyPassReverse '/api/students/desert/' 'http://<?php print "$dynamic_app"?>/desert/'

	ProxyPass '/' 'http://<?php print "$static_app"?>/'
        ProxyPassReverse '/' 'http://<?php print "$static_app"?>/'

</VirtualHost>