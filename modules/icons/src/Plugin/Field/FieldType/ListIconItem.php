<?php

namespace Drupal\icons\Plugin\Field\FieldType;

use Drupal;
use Drupal\Core\Field\Annotation\FieldType;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\TypedData\DataDefinition;
use Drupal\options\Plugin\Field\FieldType\ListStringItem;

/**
 * Plugin implementation of the 'list_icon' field type.
 *
 * @FieldType(
 *   id = "list_icon",
 *   label = @Translation("List (icon)"),
 *   description = @Translation("This field stores icon values from a list of allowed 'value => label' pairs, i.e. 'US States': IL => Illinois, IA => Iowa, IN => Indiana."),
 *   category = @Translation("Icon"),
 *   default_widget = "icon_select_widget",
 *   default_formatter = "list_icon",
 * )
 */
class ListIconItem extends ListStringItem {

  /**
   * {@inheritdoc}
   */
  public static function defaultStorageSettings(): array {
    $storage_settings = [
      'allowed_values_function' => [],
    ];

    return array_merge(parent::defaultStorageSettings(), $storage_settings);
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['value'] = DataDefinition::create('string')
      ->setLabel(t('Icon name value'))
      ->addConstraint('Length', array('max' => 255))
      ->setRequired(TRUE);

    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public function getSettableOptions(AccountInterface $account = NULL) {
    return Drupal::service('icons.manager')->getIconOptions();
  }

}
