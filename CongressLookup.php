<?php
// Warn users if they using the old entry point and a MediaWiki with the new extension registration
if ( function_exists( 'wfLoadExtension' ) ) {
	wfLoadExtension( 'CongressLookup' );
	// Keep i18n globals so mergeMessageFileList.php doesn't break
	$wgMessagesDirs['CongressLookup'] = __DIR__ . '/i18n';
	$wgExtensionMessagesFiles['CongressLookupAlias'] = __DIR__ . '/CongressLookup.alias.php';
	wfWarn(
		'Deprecated PHP entry point used for the CongressLookup extension. ' .
		'Please use wfLoadExtension instead, ' .
		'see https://www.mediawiki.org/wiki/Extension_registration for more details.'
	);
	return;
} else {
	die( 'This version of the CongressLookup extension requires MediaWiki 1.29+' );
}