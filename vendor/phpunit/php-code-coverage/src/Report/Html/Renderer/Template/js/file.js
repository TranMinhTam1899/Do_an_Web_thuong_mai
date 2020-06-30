  $(function() {
   var $window     = $(window)
     , $top_link   = $('#toplink')
     , $body       = $('body, html')
     , offset      = $('#code').offset().top
     , hidePopover = function ($target) {
        $target.data('popover-hover', false);

        setTimeout(function () {
         if (!$target.data('popover-hover')) {
          $target.popover('hide');
         }
        }, 300);
     };

   $top_link.hide().click(function(event) {
    event.preventDefault();
    $body.animate({scrollTop:0}, 800);
   });

   $window.scroll(function() {
    if($window.scrollTop() > offset) {
     $top_link.fadeIn();
    } else {
     $top_link.fadeOut();
    }
   }).scroll();

   $('.popin')
    .popover({trigger: 'manual'})
    .on({
     'mouseenter.popover': function () {
      var $target = $(this);
<<<<<<< HEAD
=======
      var $container = $target.children().first();
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

      $target.data('popover-hover', true);

      // popover already displayed
      if ($target.next('.popover').length) {
       return;
      }

      // show the popover
<<<<<<< HEAD
      $target.popover('show');
=======
      $container.popover('show');
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

      // register mouse events on the popover
      $target.next('.popover:not(.popover-initialized)')
       .on({
        'mouseenter': function () {
         $target.data('popover-hover', true);
        },
        'mouseleave': function () {
<<<<<<< HEAD
         hidePopover($target);
=======
         hidePopover($container);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }
       })
       .addClass('popover-initialized');
     },
     'mouseleave.popover': function () {
<<<<<<< HEAD
      hidePopover($(this));
=======
      hidePopover($(this).children().first());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     }
    });
  });
