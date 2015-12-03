<?php

namespace Drupal\aesop\Plugin\Block;

use Drupal\Core\Block\BlockBase;


/**
 * Provides a 'dropdown taxonomy menu' Block
 *
 * @Block(
 *   id = "aesop_dropdown_block",
 *   admin_label = @Translation("Aesop dropdown menu"),
 * )
 */
class Dropdown extends BlockBase {

    /**
     * {@inheritdoc}
     */
    public function build() {
        global $base_url;
        $terms = \Drupal::service('entity.manager')->getStorage('taxonomy_term')->loadTree('fabulist_issue_number', 0, NULL, TRUE);
        $options = '';
        foreach ($terms as $term) {
            //$options[$term->url()] = $term->getName();
            $options .= '<option value = "'.$term->url().'">'.$term->getName().'</option>';
        }
        
        $select =  [
            '#markup' => '<div><select onchange="window.location.href=this.value" id="issue_change">'.$options.'</select></div>',
            '#allowed_tags' => ['select','option'],
        ];
        
        $select['#attached']['library'][] = 'aesop/aesop.issue-change';
        
        return $select;
       
        return [
            '#type' => 'select',
            '#title_display' => 'invisible',
            '#title' => t('Selected'),
            '#options' => $options,
            '#attributes'=>array('id'=>'issue_select')
            //'#default_value' => $category['selected'],
            
        ];
    }

}
