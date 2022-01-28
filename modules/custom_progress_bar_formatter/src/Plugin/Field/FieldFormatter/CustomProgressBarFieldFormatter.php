<?php

namespace Drupal\custom_progress_bar_formatter\Plugin\Field\FieldFormatter;

use Drupal\Component\Utility\Html;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'progress_bar' field formatter.
 *
 * @FieldFormatter(
 *   id = "custom_progress_bar_formatter",
 *   label = @Translation("Custom progress bar formatter"),
 *   field_types = {
 *     "integer",
 *     "list_string",
 *     "list_integer",
 *     "list_float",
 *   }
 * )
 */
class CustomProgressBarFieldFormatter extends FormatterBase
{

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings()
  {
    return [
        'custom_progress_bar_type' => 'bar',
      ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state)
  {
    // Creating type field setting.

    $element['custom_progress_bar_type'] = [
      '#type' => 'select',
      '#title' => $this
        ->t('Select progress bar type'),
      '#options' => [
        'bar' => $this->t('Rainbow Bar'),
        'colorbar' => $this->t('Color Bar'),
        'circle' => $this->t('Circular'),
        'circular' => $this->t('Color Circular'),
      ],
      '#default_value' => $this->getSetting('custom_progress_bar_type'),

    ];

    // Remove description for integer fields, as it uses one color
    if ($this->fieldDefinition->getType() == 'integer') {
      $element['custom_progress_bar_type']['#description'] = '';
    }

    return $element;
  }


  /**
   * {@inheritdoc}
   */
  public function settingsSummary()
  {
    $summary = [];
    $summary[] = t('@setting: @value', ['@setting' => 'Progress bar type', '@value' => $this->getSetting('custom_progress_bar_type')]);
    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode)
  {
    $elements = [];
    // If field type is integer.
    if ($this->fieldDefinition->getType() == 'integer') {
      foreach ($items as $delta => $item) {

        $min = ($this->fieldDefinition->getSetting('min')) ? $this->fieldDefinition->getSetting('min') : 0;
        $max = ($this->fieldDefinition->getSetting('max')) ? $this->fieldDefinition->getSetting('max') : 100;
        $value = round(($item->value / ($max - $min)) * 100);
        $elements[$delta] = [
          '#theme' => 'custom-progress_bar_format_' . $this->getSetting('custom_progress_bar_type'),
          '#state' => [
            'state' => $value,
            'name' => $value . $this->fieldDefinition->getSetting('suffix'),
            'lowest_percent' => $value,
          ],
          '#attached' => array('library' => array('custom_progress_bar_formatter/progress-bar-' . $this->getSetting('custom_progress_bar_type'))),
        ];
      }
    } // Else field type is List.
    else {
      $list = $items->getSettings();
      // If allowed value is present.
      if (in_array('allowed_values', array_keys($list))) {
        $allowed_value = $list['allowed_values'];
        $list_count = count($allowed_value);
        $elements = $this->getStateDetail($allowed_value, $list_count, $items);
      }
    }
    return $elements;
  }

  /**
   * Generate the output appropriate for one field item.
   *
   * @param \Drupal\Core\Field\FieldItemInterface $item
   *   One field item.
   *
   * @return string
   *   The textual output generated.
   */
  protected function viewValue(FieldItemInterface $item)
  {
    // The text value has no text format assigned to it, so the user input
    // should equal the output, including newlines.
    return nl2br(Html::escape($item->value));
  }

  /**
   * Helper function to get the color.
   */
  protected function getColor($allowed_value, $color_value, $list_count)
  {
    $color = explode(',', $color_value);
    $color_count = count($color);
    $color_data = [];
    if ($color_count < $list_count) {
      foreach ($allowed_value as $value) {
        $color_data[] = $color[0];
      }
    } else {
      $color_data = $color;
    }
    return $color_data;
  }

  /**
   * Helper function to get the state data.
   */
  protected function getStateData($allowed_value, $list_count, $search_value, $color)
  {
    // Array Loop Counter.
    $loop_count = 0;
    $state_data = array();
    $lowest_percent = (1 / $list_count) * 100;
    // Go through all allowed values.
    foreach ($allowed_value as $key => $value) {
      // If loop count is less than search position.
      if ($loop_count < $search_value + 1) {
        // State.
        $state = (($loop_count + 1) / $list_count) * 100;
        // Add items.
        $state_data[] = array(
          'state' => $state,
          'name' => $key,
          'color' => $color[$loop_count],
          'lowest_percent' => $lowest_percent,
        );
      }
      ++$loop_count;
    }
    return $state_data;
  }

  /**
   * Helper function to get the element data for state.
   */
  protected function getStateDetail($allowed_value, $list_count, $items)
  {
    $elements = [];
    $color_value = $this->getSetting('custom_progress_bar_color');
    $type_value = $this->getSetting('custom_progress_bar_type');
    $color = $this->getColor($allowed_value, $color_value, $list_count);
    // Get the state value for each row.
    foreach ($items as $delta => $item) {
      $search_value = array_search($this->viewValue($item), array_keys($allowed_value));
      $state = $this->getStateData($allowed_value, $list_count, $search_value, $color);
      $elements[$delta] = [
        '#theme' => 'custom-progress_bar_format_' . $type_value,
        '#state' => $state,
        '#attached' => array('library' => array('custom_progress_bar_formatter/progress-bar-' . $type_value)),
      ];
    }
    return $elements;
  }

}
