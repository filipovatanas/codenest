<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'atanasfi_codenest');

/** MySQL database username */
define('DB_USER', 'atanasfi_cn');

/** MySQL database password */
define('DB_PASSWORD', '8cHJA#Cg{T9*');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'syafbO!-}Ny*H^.:uG].A^qrLzHXd2~>.@HJMq,Y[:KcSA-;)kOEXla |e1P_;iB');
define('SECURE_AUTH_KEY',  'bk@ TJ^;gg~e&!SB62;2g.a~d#(m05+wjQ+!|DAW;^pCT+f-f%^Yd&Db^yr~z@@i');
define('LOGGED_IN_KEY',    '3lDw^REZ-$84[-ir%W`16Lbla{kvz.ZfIE9fdG3.$WP*Cr9eV 0f);jnkveql.B*');
define('NONCE_KEY',        'GNs9CF1EK+kc+~45|iE.pj+~cX2b[tPG93MRG,h|QJ*}TPFPQOZi0QR*mg?o`$xK');
define('AUTH_SALT',        'LWD*x[2s2d,OcKF}yS4kW85UjDo9@;X6]>| gUU{@@t5^9uLwZ,F[F.&+= ;pu/I');
define('SECURE_AUTH_SALT', '_X<kJsHjH72X7kkETu+JF3/L TNa#W8HJSy4e~-|=c}Nz9t$/-2qDjRWRf;B+N-O');
define('LOGGED_IN_SALT',   'DSrF=_&yNow<+DGiw/p*Cgi4u,(e S[EdwA yQYkuR4qJ^-!SFX76L6+OyutRp1q');
define('NONCE_SALT',       'K.aj|;5-ir)kHN&*9-HxeVB,e1tf|bApvQP8~|w_?J3q{T.I3)]dNj;cSa<<Jvio');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'pt_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
