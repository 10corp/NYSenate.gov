<?php
/**
 * @file
 * nys_student_submissions.field_group.inc
 */

/**
 * Implements hook_field_group_info().
 */
function nys_student_submissions_field_group_info() {
  $field_groups = array();

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_admin|field_collection_item|field_school_stud_earthday_subm|form';
  $field_group->group_name = 'group_admin';
  $field_group->entity_type = 'field_collection_item';
  $field_group->bundle = 'field_school_stud_earthday_subm';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Adminstrative',
    'weight' => '0',
    'children' => array(
      0 => 'field_school_featured_entry',
      1 => 'field_school_show_student',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Adminstrative',
      'instance_settings' => array(
        'required_fields' => 1,
        'id' => '',
        'classes' => 'group-admin field-group-fieldset',
        'description' => '',
      ),
      'formatter' => 'open',
    ),
  );
  $field_groups['group_admin|field_collection_item|field_school_stud_earthday_subm|form'] = $field_group;

  // Translatables
  // Included for use with string extractors like potx.
  t('Adminstrative');

  return $field_groups;
}