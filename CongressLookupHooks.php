<?php

class CongressLookupHooks {

	/**
	 * LoadExtensionSchemaUpdates hook handler
	 * This function makes sure that the database schema is up to date.
	 * @param $updater DatabaseUpdater|null
	 * @return true
	 */
	public static function schemaUpdate( $updater = null ) {
		if ( $updater === null ) {
			global $wgExtNewTables;
			$wgExtNewTables[] = array( 'cl_senate', dirname( __FILE__ ) . '/patches/CongressLookup.sql' );
			$wgExtNewTables[] = array( 'cl_errors', dirname( __FILE__ ) . '/patches/CongressDataErrors.sql' );
		} else {
			$updater->addExtensionUpdate( array( 'addTable', 'cl_senate',
				dirname( __FILE__ ) . '/patches/CongressLookup.sql', true ) );
			$updater->addExtensionUpdate( array( 'addTable', 'cl_errors',
				dirname( __FILE__ ) . '/patches/CongressDataErrors.sql', true ) );
		}
		return true;
	}

}