=== Warn of an unsecure admin environment ===
Contributors: markhowellsmead
Donate link: https://www.paypal.me/mhmli
Tags: https, ssl, admin, warning
Requires at least: 4.6
Tested up to: 4.6.1
Stable tag: trunk
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

== Description ==

Outputs a warning message if the current view in the admin area was loaded over a non-secure connection. (i.e. without HTTPS/SSL.)

== Installation ==

1. Upload the plugin folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. That's it.

== Changelog ==

= 1.1.0 =
* Use WordPress' own <code>is_ssl()</code> function.

= 1.0.0 =
* Initial version.
