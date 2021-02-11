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

if (strstr($_SERVER["SERVER_NAME"], "coffee-shop.local")) {
  define("DB_NAME", "local");
  define("DB_USER", "root");
  define("DB_PASSWORD", "root");
  define("DB_HOST", "localhost");
} else {
  define("DB_NAME", "dbagqeechytuvf");
  define("DB_USER", "uodojjmnmfcaj");
  define("DB_PASSWORD", "16E*@2Snf~4f");
  define("DB_HOST", "127.0.0.1");
}

/** Database Charset to use in creating database tables. */
define("DB_CHARSET", "utf8");

/** The Database Collate type. Don't change this if in doubt. */
define("DB_COLLATE", "");

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define(
  "AUTH_KEY",
  "3dI09zHm2NuXnHGSrvFdpDUDuV81cMhmr6sIE3ss+KFIHkuEqHz1VjcoqkGeVvGvQAO71qSDMQYbRZp8z0UkiA=="
);
define(
  "SECURE_AUTH_KEY",
  "JxkHiDYs00Cp3ZLD5oD+Kw4Y7rIOnhwFJcpKf71b6sEOfe/p4151MGXgzKozhwJEFz75vrXL67MGjdiSB2/XNg=="
);
define(
  "LOGGED_IN_KEY",
  "+MUQXlRPmEJ4BYPzdEkAU3fRzLdJgKPBy9KrPQr7D9Q8LLnCa1ELo5OmO3KzIouXMwh3OrX0quDpe5mH4n0DCQ=="
);
define(
  "NONCE_KEY",
  "3xjt+9lvbZ+2MwY88SfEeUkc8ho/xVma3KhTFvYgxV5J1w0hQ49IApsBycb/Azshi4gekW1xWQnG8OfvG8+uIw=="
);
define(
  "AUTH_SALT",
  "BgqFzRUA7p44AFX3uVe555VXwoWYpl5PDqhK2qvnf76ofT1esv6Ton4ZeMOrN20JKbl1RBKfZUrlQlnw1e+7YQ=="
);
define(
  "SECURE_AUTH_SALT",
  "vGTnWvZS8sd2cRJo9B5d/BFiU3xNF+ZoVSBmr0T/Rb+3NW+WSF2jr5qvyHH82taMJHgVNZz/jM1B12xIHt7Q8w=="
);
define(
  "LOGGED_IN_SALT",
  "yoJLeRzCZgiPtpfRKuAWI+AGKtxBXmtUhLxD0AlJ/eqnYRf4ar7SbKWwpp/zZIwQUOnrxkFXzOvP5PaXkWLUcw=="
);
define(
  "NONCE_SALT",
  "wzzWaFb3+k2bPCiqOvndjQ4Zeth/K2AdE07UwNXo7eR5MyBXeo05a3jFyMQvNcqkUwgyqhxSQPfvBpOT/eA7Kg=="
);

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = "wp_";

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined("ABSPATH")) {
  define("ABSPATH", dirname(__FILE__) . "/");
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . "wp-settings.php";
