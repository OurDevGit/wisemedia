<?php

namespace WPFormsSurveys\Reporting;

/**
 * Survey reporting admin page and related functionality.
 *
 * @since 1.0.0
 */
class Ajax {

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {

		add_action( 'admin_init', array( $this, 'init' ), 10 );
	}

	/**
	 * Initialize.
	 *
	 * @since 1.0.0
	 */
	public function init() {

		// Register AJAX callbacks.
		add_action( 'wp_ajax_wpforms_surveys_field_data', array( $this, 'survey_get_field_data' ) );
		add_action( 'wp_ajax_wpforms_surveys_cache_fields', array( $this, 'survey_set_field_cache' ) );
		add_action( 'wp_ajax_wpforms_surveys_set_preview_field', array( $this, 'survey_set_preview_field' ) );
	}

	/**
	 * Get survey data for a given field.
	 *
	 * @since 1.0.0
	 */
	public function survey_get_field_data() {

		// Run a security check.
		check_ajax_referer( 'wpforms-admin', 'nonce' );

		if ( empty( $_POST['form_id'] ) || empty( $_POST['field_id'] ) || empty( $_POST['entry_count'] ) ) {
			wp_send_json_error();
		}

		$form_id   = absint( $_POST['form_id'] );
		$form_data = wpforms()->form->get(
			$form_id,
			array(
				'content_only' => true,
				'cap'          => 'view_entries_form_single',
			)
		);

		if ( empty( $form_data ) ) {
			wp_send_json_error();
		}

		$field_id    = absint( $_POST['field_id'] );
		$entry_count = absint( $_POST['entry_count'] );

		wp_send_json_success( Fields::get_survey_field_data( $form_data['fields'][ $field_id ], $form_id, $entry_count ) );
	}

	/**
	 * Set field data cache.
	 *
	 * @since 1.0.0
	 */
	public function survey_set_field_cache() {

		// Run a security check.
		check_ajax_referer( 'wpforms-admin', 'nonce' );

		if ( empty( $_POST['form_id'] ) || empty( $_POST['entry_count'] ) || empty( $_POST['field_data'] ) ) {
			wp_send_json_error();
		}

		$form_id = absint( $_POST['form_id'] );

		// Check for permissions.
		if ( ! wpforms_current_user_can( 'view_entries_form_single', $form_id ) ) {
			wp_send_json_error();
		}

		$entry_count = absint( $_POST['entry_count'] );
		$data        = $_POST['field_data'];
		$field_id    = ! empty( $_POST['field_id'] ) ? absint( $_POST['field_id'] ) : false;

		if ( ! apply_filters( 'wpforms_surveys_polls_report_caching', true, $form_id ) ) {
			return;
		}

		if ( $field_id ) {
			// Cache survey field preview.
			set_transient( "wpforms_survey_report_{$form_id}_{$entry_count}_{$field_id}", $data, DAY_IN_SECONDS * 2 );
		} else {
			// Cache survey report.
			set_transient( "wpforms_survey_report_{$form_id}_{$entry_count}", $data, DAY_IN_SECONDS * 2 );
		}
	}

	/**
	 * Set preferred survey preview field.
	 *
	 * @since 1.0.0
	 */
	public function survey_set_preview_field() {

		// Run a security check.
		check_ajax_referer( 'wpforms-admin', 'nonce' );

		if ( empty( $_POST['form_id'] ) || empty( $_POST['field_id'] ) ) {
			wp_send_json_error();
		}

		$form_id = absint( $_POST['form_id'] );

		// Check for permissions.
		if ( ! wpforms_current_user_can( 'view_entries_form_single', $form_id ) ) {
			wp_send_json_error();
		}

		$field_id = absint( $_POST['field_id'] );

		// Update form meta.
		wpforms()->form->update_meta( $form_id, 'survey_preview', $field_id );
	}
}
