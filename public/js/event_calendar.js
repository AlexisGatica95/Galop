$('.event_calendar .dia.has_events').on('click tap',function() {
    var day = $(this).data('day');
    var month = $(this).closest('.grid.month').data('month');
    var year = $(this).closest('.grid.month').data('year');
    var dataDate = day+'_'+month+'_'+year;
    var dateBlock = $('[data-date='+dataDate+']');
    $(dateBlock).toggleClass('open');
    $(this).toggleClass('open');

})