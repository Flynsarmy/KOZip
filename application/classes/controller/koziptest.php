<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Koziptest extends Controller {

	public function action_index()
	{
		/*
		 * Create and output a zip file containing the 2 test documents.
		 */
		$Zip = new KOZip( $this->response );
		try {
			$Zip->read_dir( 'assets', TRUE, DOCROOT )
				->download( $this->response );
		} catch (Exception $e) {
			$this->response->body( $e->getMessage() );
		}
	}

	public function action_invalid()
	{
		/*
		 * APPPATH.'assets' doesn't exist so display the Exception returned by
		 * the read_dir method
		 */
		$Zip = new KOZip( $this->response );
		try {
			$Zip->read_dir( APPPATH.'assets' )
				->download( $this->response );
		} catch (Exception $e) {
			$this->response->body( $e->getMessage() );
		}
	}

} // End Welcome
