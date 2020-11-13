(function($) {
  $.fn.showMoreItems = function(options) {
    
    var $totalItems     = $('.container_ps .pg_berita').length,
        $visibleItems   = $('.container_ps .pg_berita:visible').length,
        settings        = $.extend({}, $.fn.showMoreItems.defaults, options),
        i               = settings.count,
        countLess       = settings.count - 1;

    $('.container_ps .pg_berita:lt(' + settings.count + ')').show();

    $('#tombol_pgberita').click(function(el) {
      el.preventDefault();

      if ($visibleItems !== $totalItems) {
        if(i + settings.count <= $totalItems) {
          $visibleItems = i += settings.count;
          $('.container_ps .pg_berita:lt('+ i +')').show();

          if(i == $totalItems) {
            $('#tombol_pgberita').hide();//text("KE AWAL");
          }

        } else if (i !== $totalItems) {
          $('.container_ps .pg_berita:gt(' + countLess + ')').show();
          $('#tombol_pgberita').hide();//text("KE AWAL");
          $visibleItems = $totalItems;
          i = $totalItems;
        }
      } else if($visibleItems === $totalItems) {
        $('.container_ps .pg_berita:gt(' + countLess + ')').hide();
        $('#tombol_pgberita').text("LIHAT LAINNYA");
        $visibleItems = settings.count;
        i = settings.count;
      }

    });
  }

  $.fn.showMoreItems.defaults = {
    count: 16
  };
})(jQuery);
