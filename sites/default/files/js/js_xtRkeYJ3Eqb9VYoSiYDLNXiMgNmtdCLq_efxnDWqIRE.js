/**
 * @file
 * Javascript behaviors for jquery.inputmask integration.
 */

(function ($, Drupal) {

  'use strict';

  /**
   * Initialize input masks.
   *
   * @type {Drupal~behavior}
   */
  Drupal.behaviors.webformElementMask = {
    attach: function (context) {
      $(context).find('input.js-webform-element-mask').once('webform-element-mask').inputmask();
    }
  };

})(jQuery, Drupal);
;
/**
 * @file
 * Javascript behaviors for color element integration.
 */

(function ($, Drupal) {

  'use strict';

  /**
   * Enhance HTML5 color element.
   *
   * @type {Drupal~behavior}
   */
  Drupal.behaviors.webformColor = {
    attach: function (context) {
      $(context).find('.form-color:not(.form-color-output)').once('webform-color').each(function () {
        var $element = $(this);
        // Handle browser that don't support the HTML5 color input.
        if (Modernizr.inputtypes.color === false) {
          // Remove swatch sizes.
          $element.removeClass('form-color-small')
            .removeClass('form-color-medium')
            .removeClass('form-color-large');
        }
        else {
          // Display color input's output to the end user.
          var $output = $('<input class="form-color-output ' + $element.attr('class') + ' js-webform-element-mask" data-inputmask-mask="\\#######" />').inputmask();
          $output[0].value = $element[0].value;
          $element
            .after($output)
            .css({float: 'left'});

          // Sync $element and $output.
          $element.on('input', function () {
            $output[0].value = $element[0].value;
          });
          $output.on('input', function () {
            $element[0].value = $output[0].value;
          });
        }
      })
    }
  };

})(jQuery, Drupal);
;
