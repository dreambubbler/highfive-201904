<?php

/**
 * This Controller provides callback functionality for the highfive module.
 *
 * TODO: Task 3) Create about() method, which returns a dictionary definition
 *               of 'high five'
 *
 * TODO: Task 8) Create performHighFive($first, $second) method, which
 *               returns an HTML list of two URL arguments.
 */

namespace Drupal\highfive\Controller;

use Drupal\Core\Controller\ControllerBase;


/**
 * Controller routines for highfive routes.
 */
class HighFiveController extends ControllerBase {


  /**
   * {@inheritdoc}
   */
  protected function getModuleName() {
    return 'highfive';
  }

  /**
   * Constructs a simple page.
   *
   * The router _controller callback, maps the path
   * 'highfive/demo' to this method.
   *
   * _controller callbacks return a renderable array for the content area of the
   * page. The theme system will later render and surround the content with the
   * appropriate blocks, navigation, and styling.
   */
  public function tutorial() {
    $demovid_path = drupal_get_path('module', 'highfive') . '/assets/Curiosity_Rover_Begins_Mars_Mission_-_high-five_clip.240p.webm';

    $paragraph_tag = '<p>' . $this->t('Watch NASA\'s Curiosity-rover team celebrate with high fives after the landing on Mars, August 2012.') . '<br /></p>';
    $video_tag = '<video width="320" height="240" controls>
                    <source src="/' . $demovid_path . '" type="video/webm">
                  </video>';


    $markuphtml = $paragraph_tag . $video_tag;

    // Notice the short array syntax in the #allowed_tags key!
    // PRO TIP! Even though we are declaring markup (i.e. static html)
    //  We have to declare '#allowed_tags' because Drupal 8 by default,
    //  passes the #markup string through
    //  \Drupal\Component\Utility\Xss::filterAdmin(),
    //  which strips known XSS vectors while allowing a permissive list of
    //  HTML tags that are not XSS vectors.
    //
    //  You can use #allowed_tags to set the list of allowed tags,
    //  but this does not stop Drupal from stripping HTML attributes (e.g. style).
    //  See Render API overview for more.
    //  https://api.drupal.org/api/drupal/core%21lib%21Drupal%21Core%21Render%21theme.api.php/group/theme_render/8.3.x
    return array(
      '#type' => 'markup',
      '#markup' => $markuphtml,
      '#allowed_tags' => ['video', 'source', 'br'],
    );

  }

  // TODO: Task 3) Create public about() method.




  // TODO: Task 8) Create performHighFive($first, $second) method.


}
