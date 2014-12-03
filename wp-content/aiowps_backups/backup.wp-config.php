<?php


// ** MySQL settings ** //
/** The name of the database for WordPress */
define('DB_NAME', 'hollyhill_dev');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('AUTH_KEY',         'rj-k4ZPzl0Rx#a-X1p:/@6^D* O e1#t? )kVeg`XAHP!?R#-&xT`JWmj|hu8uE0');
define('SECURE_AUTH_KEY',  't?(u{I3Td+W-t1 _l7KXm5-LMJ|84|/F/+YU0f97=+4@}ZDOi:6|FJZMp$1!t+Xm');
define('LOGGED_IN_KEY',    'I=QcT=t.)#{>aky&594L{`mrG-XhE1!5BYY-.ZZa]n:`|;:Y.c8IHA-d BcAvjN-');
define('NONCE_KEY',        'RHy b9{5<`tLHertcniR~p_sPp%@&)<>E^+ct`Z]e2r|s8X9c+JQU$rI>&=6t@J)');
define('AUTH_SALT',        '}r^`)NIsf-GgqG,~8m3q;L^rCT-vpe4/@#Pf%a|9<MSY<WhFY3W*7Eu%E3-,M:]k');
define('SECURE_AUTH_SALT', 'q&%aCI7qv`qS>YX2= -0T+[!8&#xZY,y.Fp}.kEA,&+]SH`D@P)@1$xB&:m0{vEu');
define('LOGGED_IN_SALT',   '(1e%`A`oq?+@H?{cDG1MJFs-^q^+}Je<:5~wo`Md5)6x2fBk`eVsF;79N0l&bU[k');
define('NONCE_SALT',       'URtFJTYo5&e$Npbxg=P*7};W]S-4G6Yw+:aa5ZZz7|HXr^`vq=|8~QDKG0#bTAGY');


$table_prefix = 'bansk9_';

define('WPLANG', '');




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
