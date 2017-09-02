var tick = function ($el, duration) {
  'use strict';

  $el.attr('data-duration', duration);
  $el.find('.duration').html(duration);

};

(function ($) {
  'use strict';

  $.fn.timer = function (options) {

    var settings = $.extend({

      duration: 2,
      unit: 's',
    }, options);

    var updateEverySecond = 1000;
    var updateEveryMinute = 60 * 1000;

    return this.each(function () {

      var duration = settings.duration;
      var unit = settings.unit;

      var updateInterval = updateEverySecond;
      

      var $$ = $(this);

      $$.html('<div class="timer-bg"><span class="duration"></span><small class="unit"></small></div>' +
        '<div class="timer-half-container right"><div class="timer-half right"></div></div>' +
        '<div class="timer-half-container left"><div class="timer-half left"></div></div>');

      $$.addClass('timer');
      $$.find('.unit').html(unit);

      // start ticking
      tick($$, duration);

      /* global setInterval */
      setInterval(function () {
        tick($$, duration);

        if(duration == 0)
          timeExpired();
        duration--;
      }, updateInterval);

    });

  };

  function timeExpired(){
    alert('Hello');
  }
}(jQuery));

