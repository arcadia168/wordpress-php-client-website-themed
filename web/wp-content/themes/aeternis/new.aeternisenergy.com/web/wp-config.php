<?php
/** 
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information by
 * visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'aeternisenergy_com_wordpress');

/** MySQL database username */
define('DB_USER', 'LCN386007_webdev');

/** MySQL database password */
define('DB_PASSWORD', 'I64wefCrFl');

/** MySQL hostname */
define('DB_HOST', 'database.lcn.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link http://api.wordpress.org/secret-key/1.1/ WordPress.org secret-key service}
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'C$it^v0usT6E59GBX4h0YbdCta6Dk)GNj$td)qtB^xJs3)odw1WQ(tI6W&&w2GYm');
define('SECURE_AUTH_KEY',  '(KXiEY6mZOv(T4G3lGQ$BmVMzao8*Mo#IQ0fjb)Ra(x4X)n2JAFDvXmkmT#srR8N');
define('LOGGED_IN_KEY',    '0hDjWOqoaRb3X9xJuyUHTDFh)@!2JrYvcVdNX#(Uxs8IsYt9PG4oEtxtlZdXX(FE');
define('NONCE_KEY',        '(NQKGn4WTl@M8JGD0z5T62OTzSC046teLYZA3muANumspcKJ*z5*btjTCh@%aFUt');
define('AUTH_SALT',        ')FS^HvvLBKU7Tas2t65^^gFDyM4TbimjFDLnZxpP61M%5o8T$djX7gUli6U1UOVD');
define('SECURE_AUTH_SALT', 'AWtVAWR*bW4ZY&!0!emuEn&mspT7A)fg84d1$o(Ws1%GIJvV#@Y1$TU1WCrid4AB');
define('LOGGED_IN_SALT',   'b&)z^cm0Bu3yZlJyfHHP4b8L31QXevza9dQxoJRHHUD)o0@Rdx2)dBkbLk8YTB#B');
define('NONCE_SALT',       '5rExIq5&QMxfrCufzJNF7XobP&KBy03MKAfU5(5fJQ8hDlPv&xkQPkhRfw6nXGIV');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', 'en_US');

define ('FS_METHOD', 'direct');

define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

?>
