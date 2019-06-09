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
define('DB_NAME', 'luke1915_wp5');

/** MySQL database username */
define('DB_USER', 'luke1915_wp5');

/** MySQL database password */
define('DB_PASSWORD', 'O#LJBOckYzhnPe88WS(91..7');

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
define('AUTH_KEY',         'yBhXwv4GCwjr4cUudxVwdnH1oO6x14TMV7Vn1Jmk1upBHne05dZ24Qxjb819dl85');
define('SECURE_AUTH_KEY',  'bleQl0SPdvJxiFXAmJSDS4GCogXCHxmi0spDxL3K40qACvmcKN17G1TEgyA3c3K5');
define('LOGGED_IN_KEY',    'bVANaDwZD3AihI8rDu3Oa68iPWcpl5ceMJ0m0lxz5d7mRjiayPsZpHrXC8CibHgN');
define('NONCE_KEY',        'qgjWnxhx4iLFnTRnc4JWZyjhb6QUbWc9zhlgpLgy1SQhtXIV8Np5R5iAS3m1HU37');
define('AUTH_SALT',        '1Ov31YQeNZzKxlTqJvAy7sHDyJC8mB4xDKP1yjxouCKJgEKukGgsRoqPFmkwxnai');
define('SECURE_AUTH_SALT', '9oeHdIb1suLywi3BjRWhWFKTciRfB8jfV2S0qFLNkTJMcmfbyn8ZGgRFW5eLxvvf');
define('LOGGED_IN_SALT',   'SwP8ObpiFLBqZLVDzOPDiWvk41AbiMfMHJFoBV1kUGADGgtpqOts9uf9WUgWrHdw');
define('NONCE_SALT',       'fxRetW53e0Nun7xtgOs6IKQtLfXe3HNdG2flqPzptkVwChvJ8jwuTBVcCVABPN3h');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
