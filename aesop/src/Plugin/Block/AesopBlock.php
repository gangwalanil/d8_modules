<?php

namespace Drupal\aesop\Plugin\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Url;

/**
 * Provides a 'Primary taxonomy menu' Block
 *
 * @Block(
 *   id = "aesop_block",
 *   admin_label = @Translation("Aesop primany menu"),
 * )
 */
class AesopBlock extends BlockBase {

    /**
     * {@inheritdoc}
     */
    public function build() {
        global $base_url;
        $terms = \Drupal::service('entity.manager')->getStorage('taxonomy_term')->loadTree('fabulist_article_type', 0, NULL, TRUE);
        $menu_list = '<ul>';
        $menu_list .= '<li>' . \Drupal::l('Home', Url::fromUri($base_url)) . '</li>';
        foreach ($terms as $term) {
            $menu_list .= '<li>' . \Drupal::l($term->getName(), $term->urlInfo()) . '</li>';
        }
        $menu_list .= '</ul>';

        return array(
            '#markup' => $menu_list,
        );
    }

}
