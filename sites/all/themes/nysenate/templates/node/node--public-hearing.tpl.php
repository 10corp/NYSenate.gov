<?php
/**
 * @file
 * Default simple view template to display all the fields as a row. The template
 * outputs a full row by looping through the $fields array, printing the field's
 * HTML element (as configured in the UI) and the class attributes. If a label
 * is specified for the field, it is printed wrapped in a <label> element with
 * the same class attributes as the field's HTML element.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output
 *     safe.
 *   - $field->element_type: The HTML element wrapping the field content and
 *     label.
 *   - $field->attributes: An array of attributes for the field wrapper.
 *   - $field->handler: The Views field handler object controlling this field.
 *     Do not use var_export to dump this object, as it can't handle the
 *     recursion.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @see template_preprocess_semanticviews_view_fields()
 * @ingroup views_templates
 * @todo Justify this template. Excluding the PHP, this template outputs angle
 * brackets, the label element, slashes and whitespace.
 */

?>
<article class="c-block c-meeting-detail--header">

  <div class="c-meeting-detail--meta">
    <?php if (isset($node->field_event_status[LANGUAGE_NONE][0]['value']) && $node->field_event_status[LANGUAGE_NONE][0]['value'] === "live_now"): ?>
      <p class="c-meeting-detail--live-flag"><?php print render($content['field_event_status']);?></p>
    <?php endif;?>
    <?php if (isset($node->field_off_the_floor[LANGUAGE_NONE][0]['value']) && $node->field_off_the_floor[LANGUAGE_NONE][0]['value'] === "1"): ?>
      <p class="c-meeting-detail--floor-flag">off the floor</p>
    <?php endif;?>
  </div>

  <div>
    <p class="c-meeting-detail--date">
      <span class="c-meeting-date--num">
        <?php print date("d", $node->field_date[LANGUAGE_NONE][0]['value']);?>
      </span>
      <span class="c-meeting-date--month">
        <?php print date("M", $node->field_date[LANGUAGE_NONE][0]['value']);?>
      </span>
      <span class="c-meeting-date--year">
        <?php print date("Y", $node->field_date[LANGUAGE_NONE][0]['value']);?>
      </span>
    </p>

    <div class="c-meeting-detail--info">
      <h1 class="c-meeting-detail--title">
        <?php print $title;?>
      </h1>
      <?php if (!empty($node->field_meeting_location[LANGUAGE_NONE][0]['safe_value'])): ?>
        <p class="c-meeting-detail--location">
          <?php print $node->field_meeting_location[LANGUAGE_NONE][0]['safe_value'];?>
        </p>
      <?php endif;?>
      <p class="c-meeting-detail--time">
        <?php print date("g:i A ", $node->field_date[LANGUAGE_NONE][0]['value']);?> to <?php print date("g:i A ", $node->field_date[LANGUAGE_NONE][0]['value2']);?>
        <?php if (isset($field_video_status[0]['value']) && $field_video_status[0]['value'] != 'streaming_redirect'): ?>
          <span class="c-meeting-video--status icon-before__youtube"><?php print render($content['field_video_status']);?></span>
        <?php endif;?>
      <div title="Add to Calendar" class="addthisevent">
        Add to Calendar
        <span class="start"><?php print format_date($node->field_date[LANGUAGE_NONE][0]['value'], "custom", "m/d/Y");?><?php print format_date($node->field_date[LANGUAGE_NONE][0]['value'], "custom", "g:i A");?></span>
        <span class="end"><?php print format_date($node->field_date[LANGUAGE_NONE][0]['value2'], "custom", "m/d/Y");?><?php print format_date($node->field_date[LANGUAGE_NONE][0]['value2'], "custom", "g:i A");?></span>
        <span class="timezone">America/New_York</span>
        <span class="title"><?php print $title;?></span>
        <span class="location"><?php if (isset($node->field_meeting_location[LANGUAGE_NONE][0]['name'])) {
	print $node->field_meeting_location[LANGUAGE_NONE][0]['name'];
}
?></span>
        <span class="date_format">MM/DD/YYYY</span>
        <span class="organizer">NY STATE SENATE</span>
        <span class="organizer_email">content@senate.state.ny.us</span>
      </div>
      </p>
    </div>

    <div class="c-meeting-detail--descript">
      <?php print render($content['body']);?>
    </div>

    <?php if (!empty($content['field_chapters'])): ?>
      <div class="c-meeting-detail--descript">
        <?php print render($content['field_chapters']);?>
      </div>
    <?php endif;?>

    <?php if (!empty($content['field_issues'])): ?>
      <div class="c-meeting-detail--related">
        <p>related issues: </p>
        <?php print render($content['field_issues']);?>
      </div>
    <?php endif;?>

    <?php if (isset($field_video_status[0]['value']) && $field_video_status[0]['value'] === "streaming_live_now"): ?>
      <div class="c-meeting-detail--descript">
        <?php print render($content['field_ustream_url']);?>
      </div>
    <?php elseif (isset($field_video_status[0]['value']) && $field_video_status[0]['value'] === "streaming_redirect"): ?>
      <?php print render($content['field_ustream_url']);?>
    <?php endif;?>


    <?php if (!empty($content['field_yt'])): ?>
      <div class="c-meeting-detail--descript">
        <?php print render($content['field_yt']);?>
      </div>
    <?php endif;?>

  </div>
</article>