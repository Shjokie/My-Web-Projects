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
define('WP_MEMORY_LIMIT', '64M');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'eed_database');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '$ lsI)NzFeVDoPJ&1d<E*xM%r]1SpTzD~$yU(N=2T@qKHuC]0&J>gONoFiJ#XR3=');
define('SECURE_AUTH_KEY',  'GImLd~?T2Zrqt~^xCe8`9i94#B8JSU|&~I&6]Z[Q)5AkOWAwwayP^*a(#z3;iQgY');
define('LOGGED_IN_KEY',    'p8/UrM((9wz7`nZj0jnyD=_,q9KSiy;a]-^A!yl21_^|Y*uZTg,f41+!tWuY|%C0');
define('NONCE_KEY',        '%-qC+B?zJ+0XK[$FM=NOQ645hx2>c]R_XP4Rx(|6y-#~%g9=lEPSobLD<i|Q&q=z');
define('AUTH_SALT',        'Ku[&XEN.!Ff1)Ef+YAy?-f6L+^qxvCn_6+&3h+aM&MPZp+{`C%`6w;kvz|awh9l#');
define('SECURE_AUTH_SALT', '|to}f^QmuFxv4ymA.gvwN|RKXo5Q]3Uftf;+OJ,|{ ->}zy1V-R6Qs}>p1A2ep6o');
define('LOGGED_IN_SALT',   'c G.36~ORn-vQHsbh;,faTARw]B}Kcx>|l)~(YSM|6k1E%Ji-k6lmK2M>BaFgsRb');
define('NONCE_SALT',       'XF~)YUMd/?dxb6wh6eipxWNs+[@#`@_L{sPUKg2VibR# u<:+8]J]mt6_4mLCvXS');

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
