<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'eedadvis_newBlog');
define('CONCATENATE_SCRIPTS', false );
/** MySQL database username */
define('DB_USER', 'eedadvis_newB');

/** MySQL database password */
define('DB_PASSWORD', 'B,a9o7!D)lSQ');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'u#!k:|6Q//DA2(PdQG8AbMsD6DE}F;8`zTh2hMAv+xG^{+PL8 u$%8]fgQ:6W=:O');
define('SECURE_AUTH_KEY',  '{+,kD4q6OWcf$`^EMEG%L1VgY!GQWt z8JZRc1A RbFf/b6-` l)IXGOi)-zPQ<>');
define('LOGGED_IN_KEY',    'E= C}UKT%gBl*V+UhT<@usbe*[7+~N=`Hrw}uS2_,sB1ario|.v-n&LR&wVne4rg');
define('NONCE_KEY',        '_F$&oQ!Z}r> Z1iwwUKVY(x?ikta&LhL2D(2+ _)qyCDYI1K+&)w,Xo%y^s9Dg({');
define('AUTH_SALT',        'u^(kpLA](`X&e,%J( :y,AFC9I,#]e?mXBKP_lt!*:-zS mScd|BRxy(yo`0q2;3');
define('SECURE_AUTH_SALT', 'Dx3K[`+i=k4:GjT]0H;5g3uMdg>`7ebzN+A!@|VD)6&``Vk!bZ56yZ+H=Ek8!jeP');
define('LOGGED_IN_SALT',   '5qDxwCx-7LCN*$46a>7K(OCrlI@,:Vhs0^-l!})[6 M])rQ-iAmL#pIUkKIXa8Yk');
define('NONCE_SALT',       '7nv5]>Ay7N/>08g6|!XmZ 1lw^;#Isfg[j}}>5kS7UX7O]QGjxzct#0p?z7(D!3T');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');