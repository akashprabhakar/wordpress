<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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
define('DB_NAME', 'dbwordpress');

/** MySQL database username */
define('DB_USER', 'prabhakar');

/** MySQL database password */
define('DB_PASSWORD', 'annet123');

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
define('AUTH_KEY',         'a!6QnH=J0Ax){,To@kI|0}/xS3m@e7=faVc3&I6HB@[Hd-0H ilp+Zf <vycKInb');
define('SECURE_AUTH_KEY',  '7vR~LL/W<n^x&3J7+Rt;Jerg:/XNCK+Hphxab(JRVtTYCscni-@fe&n9)W:Su0y^');
define('LOGGED_IN_KEY',    'x]uQ7FYPu+>;QS=[-#o_)~L:=OiOkjDSr??W*(|QKbsxGu$//ppfeM<Kf7Fiq $6');
define('NONCE_KEY',        'FZ{.YF#Ki,eB&$QzW`K[6V-,Zz Fk%9a&nO%7KivRx]2U}cC0mk|Gwpdu/YkbbzK');
define('AUTH_SALT',        ',o1Te)UI?c|Uwg7+`&bWC/k;k@aYbmq/%+%Vh<F5*re7| I=m.&#xVO+2Q,Ap4F:');
define('SECURE_AUTH_SALT', ' JwYdh[S)n&4hK@]Z GYwF4|->Y/GR -p*Hb~$!%AcNQc/9:Y`-{dQV9tr%79H=a');
define('LOGGED_IN_SALT',   '5&fpG41cTFRUY0~/R~vY lOWh_CrDe`}u1F8|EY)R;z~:Addmy~&WfkH>9Px`0$l');
define('NONCE_SALT',       '$Q`7+W^W<fkQ2C1%{3,dpgS*#6N|9ct,sBTu/h!ZH0][g-/N5d4],NoC?TP9c%^h');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
