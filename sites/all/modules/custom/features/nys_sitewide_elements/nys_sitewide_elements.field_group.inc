<?php
/**
 * @file
 * nys_sitewide_elements.field_group.inc
 */

/**
 * Implements hook_field_group_info().
 */
function nys_sitewide_elements_field_group_info() {
  $field_groups = array();

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_article_content|node|article|form';
  $field_group->group_name = 'group_article_content';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'article';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Article Content',
    'weight' => '1',
    'children' => array(
      0 => 'body',
      1 => 'field_chapters',
      2 => 'field_image_main',
      3 => 'field_subtitle',
      4 => 'field_bills',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Article Content',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => 'group-article-content field-group-fieldset',
        'description' => '',
      ),
      'formatter' => 'open',
    ),
  );
  $field_groups['group_article_content|node|article|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_headline_and_authorship|node|article|form';
  $field_group->group_name = 'group_headline_and_authorship';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'article';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Article Heading Information',
    'weight' => '0',
    'children' => array(
      0 => 'field_article_author',
      1 => 'field_attachment',
      2 => 'field_date',
      3 => 'title',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Article Heading Information',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => 'group-headline-and-authorship field-group-fieldset',
        'description' => '',
      ),
      'formatter' => 'open',
    ),
  );
  $field_groups['group_headline_and_authorship|node|article|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_senators|node|initiative|form';
  $field_group->group_name = 'group_senators';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'initiative';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Senators',
    'weight' => '9',
    'children' => array(
      0 => 'field_associated_senator',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-senators field-group-fieldset',
        'required_fields' => 1,
      ),
    ),
  );
  $field_groups['group_senators|node|initiative|form'] = $field_group;

  // Translatables
  // Included for use with string extractors like potx.
  t('Article Content');
  t('Article Heading Information');
  t('Senators');

  return $field_groups;
}