<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 9/13/18
 * Time: 4:47 PM
 */

class Brizy_Admin_Migrations_RulesMigration implements Brizy_Admin_Migrations_MigrationInterface {

	/**
	 * Return the version
	 *
	 * @return mixed
	 */
	public function getVersion() {
		return '1.0.54';
	}

	/**
	 * @return int|mixed|WP_Error
	 * @throws Brizy_Editor_Exceptions_NotFound
	 */
	public function execute() {

		$templateIds = $this->getTemplateIds();

		foreach($templateIds as $templateId) {
			$data  = get_post_meta( (int) $templateId, 'brizy-template-rules', true );
			add_post_meta( (int) $templateId, 'brizy-bk-'.get_class($this).'-'.$this->getVersion(), $data );
			add_post_meta( (int) $templateId, 'brizy-rules', $data );
			delete_post_meta( (int) $templateId, 'brizy-template-rules' );
		}
	}

	/**
	 * Get posts and meta
	 */
	public function getTemplateIds() {
		global $wpdb;

		// query all posts (all post_type, all post_status) that have meta_key = 'brizy' and is not 'revision'
		return $wpdb->get_results("
			SELECT pm.post_id
			FROM {$wpdb->postmeta} pm				
			WHERE pm.meta_key = 'brizy-template-rules'");
	}
}