/**
 * @file
 * Block behaviors.
 */

(function ($, window) {

  "use strict";

  /**
   * Provide the summary information for the block settings vertical tabs.
   *
   * @type {Drupal~behavior}
   *
   * @prop {Drupal~behaviorAttach} attach
   *   Attaches the behavior for the block settings summaries.
   */
  Drupal.behaviors.aesopIssueChange = {
    attach: function (context, settings) {
        //console.log(settings);
      $('#issue_change').change(function(){ //alert("sadf");
          window.location.href = this.value;
      });

    }
  };

})(jQuery, window);
