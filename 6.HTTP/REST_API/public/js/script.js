$(document).ready(function () {
    const settings = $('input[type=checkbox]');
    settings.on('click', function (e) {
        let target = e.target;
        $.ajax({
            type: "POST",
            url: $('#navbarSupportedContent').attr('data-route'),
            data: {'data': {'id': target.id, 'val': target.checked}},
            success: function (data) {
            }
        });
    });

    $('#load-more').click(function (){
        let loadMore = $('#load-more');
        let nextPage = loadMore.attr('data-next-page');
       $.ajax({
           type: "GET",
           url: loadMore.attr('data-route')+'?page='+loadMore.attr('data-next-page'),
           success: function (data) {
               $(".tm-gallery").append(data);
               loadMore.attr('data-next-page', +nextPage+1);
           }
       })
    });
});
