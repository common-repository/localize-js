=== Localize js ===
Contributors: kamiel79
Author URI: http://creativechoice.org/
Plugin URL: http://code.creativechoice.org/localize-js/
Requires at Least: 3.0
Tested Up To: 4.01
License: Unlicence
License URI: http://unlicense.org
Tags: wordpress, wordpress.org, translation, i18n, l10n, .po, multilingual, javascript 
Stable tag: 3.0
Donate link: http://code.creativechoice.org/localize-js/

Provide translation function _e("") in javascript files.

== Description ==

Wordpress has the function wp_localize_scripts for translation, but the strings passed to it have to be hard-coded. Until you parse the .js-files and scan for occurrences of _e() with a fast regexp, and localize them with the data using the Wordpress _e-function to localize from a .po file.
*Note*. Your po-file has to include strings from javascript files. To do this in Poedit, see http://stackoverflow.com/questions/16557327/how-to-generate-po-file-from-js-file-using-poedit.

== Installation ==
1. Unzip the plugin in your plugin directory. 
2. Activate the plugin in Wordpress.
3. Make sure your .po-file is in your /languages directory and contains the translations from the .js-files.
4. Place the following code in your javascript file: <pre>function _e(s) {
	return ccb_e_ccb_HANDLE[s];
}
</pre> where you replace HANDLE with the handle for your script (you use the handle to enqueue the script in functions.php.)
5. Translate your javascripts! You can now use <code>alert ( _e("Error! Try again in your language"))</code>. Note that there is no text-domain here as that is taken care of by PHP when it fills the array dynamically.

== Screenshots ==

None for the moment.

== Upgrade Notice ==

None for the moment.

== Frequently asked questions ==

None for the moment.

== Changelog ==
= December 11, 2014 =
* First release.