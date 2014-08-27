<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
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
define('DB_NAME', 'u208016809_whs');

/** MySQL database username */
define('DB_USER', 'u208016809_root');

/** MySQL database password */
define('DB_PASSWORD', 'superman007');

/** MySQL hostname */
define('DB_HOST', 'mysql.hostinger.com.ua');

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
define('AUTH_KEY',         'DW@LME}cld#LNx-T!$-Nf:m53lP,iuy}Ho(iT6U@m1YNAAoC|#l<vS zH^|l@xt,');
define('SECURE_AUTH_KEY',  'hP|a*Aaiqr#u(lNndPB-8M+NpT.A;Z$: BEXElB]f2/#sTF:fEf)|&B!Bp318q0|');
define('LOGGED_IN_KEY',    '!>K:-XQ`o!i/A@:A= hp+{&xvH!./BPX~lgep*OU|Lk^FM^!3jCdHO6VQo-VL==U');
define('NONCE_KEY',        'xm<;n51!S4Pj_Op^5y0>N, PKhn|2+_xIh2BN?Zwf +B+Cwr^X8vF*[ j*~1mEG1');
define('AUTH_SALT',        'm`y:mVDj<|lzgvE*vI*a|g@&K48%x$P>7-s>eKO:bxq(dD!I%dXLU(c)wn=;]48S');
define('SECURE_AUTH_SALT', '8?D@IlJw(!xfNYMrYgH7DB^,w1$v T @lJ8?z4nRzj)ZRWQZI;1iS 7XG{[%[)?>');
define('LOGGED_IN_SALT',   '|W`l<N|aj;wRY^w:L3g-d&mSd>)`PS6dvg!X|@9+oqv+UYD3-~E?D&*c^?|P> qj');
define('NONCE_SALT',       '?exLc`=(Rjr!ve^F1S-mK~8KpH4vm,q.lz2S-]9GUm7euv_x@F$+_51?hEr{jU$B');

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
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
