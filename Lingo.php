<?php

/**
 * Provides hover-over tool tips on articles from words defined on the
 * Terminology page.
 *
 * @file
 * @defgroup Lingo
 * @author Barry Coughlan
 * @copyright 2010 Barry Coughlan
 * @author Stephan Gambke
 * @version 0.2 alpha
 * @licence GNU General Public Licence 2.0 or later
 * @see http://www.mediawiki.org/wiki/Extension:Lingo Documentation
 */
if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'This file is part of a MediaWiki extension, it is not a valid entry point.' );
}

define( 'LINGO_VERSION', '0.2 alpha' );

$wgExtensionCredits['parserhook'][] = array(
	'path' => __FILE__,
	'name' => 'Lingo',
	'author' => array('Barry Coughlan', '[http://www.mediawiki.org/wiki/User:F.trott Stephan Gambke]'),
	'url' => 'http://www.mediawiki.org/wiki/Extension:Lingo',
	'descriptionmsg' => 'lingo-desc',
	'version' => LINGO_VERSION,
);

// server-local path to this file
$wgexLingoDir = dirname( __FILE__ );

// set LingoBasicBackend as the backend to access the glossary
$wgexLingoBackend = 'LingoBasicBackend';

// register message file
// $wgExtensionMessagesFiles['Lingo'] = $dir . '/Lingo.i18n.php';
// $wgExtensionMessagesFiles['LingoAlias'] = $dir . '/Lingo.alias.php';

// register class files with the Autoloader
// $wgAutoloadClasses['LingoSettings'] = $dir . '/LingoSettings.php';
$wgAutoloadClasses['LingoParser'] = $wgexLingoDir . '/LingoParser.php';
$wgAutoloadClasses['LingoTree'] = $wgexLingoDir . '/LingoTree.php';
$wgAutoloadClasses['LingoElement'] = $wgexLingoDir . '/LingoElement.php';
$wgAutoloadClasses['LingoBackend'] = $wgexLingoDir . '/LingoBackend.php';
$wgAutoloadClasses['LingoBasicBackend'] = $wgexLingoDir . '/LingoBasicBackend.php';
$wgAutoloadClasses['LingoMessageLog'] = $wgexLingoDir . '/LingoMessageLog.php';
// $wgAutoloadClasses['SpecialLingoBrowser'] = $dir . '/SpecialLingoBrowser.php';

$wgHooks['ParserAfterTidy'][] = 'LingoParser::parse';

// register resource modules with the Resource Loader
$wgResourceModules['ext.Lingo'] = array(
	// JavaScript and CSS styles. To combine multiple file, just list them as an array.
	// 'scripts' => 'libs/ext.myExtension.js',
	'styles' => 'skins/Lingo.css',
	// When your module is loaded, these messages will be available to mediaWiki.msg()
	// 'messages' => array( 'myextension-hello-world', 'myextension-goodbye-world' ),

	// If your scripts need code from other modules, list their identifiers as dependencies
	// and ResourceLoader will make sure they're loaded before you.
	// You don't need to manually list 'mediawiki' or 'jquery', which are always loaded.
	// 'dependencies' => array( 'jquery.ui.datepicker' ),

	// ResourceLoader needs to know where your files are; specify your
	// subdir relative to "extensions" or $wgExtensionAssetsPath
	'localBasePath' => dirname( __FILE__ ),
	'remoteExtPath' => 'Lingo'
);

