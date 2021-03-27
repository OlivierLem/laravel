$(document).ready(function() {
    
    $("#pjax-container").on("click", "a.song", function(e) {
        e.preventDefault();
        audio.src =  $(this).attr('data-file')
        audio.play();
        current = $(this).attr("data-nb")
   })
    
    $("#search").submit(function(e) {
        e.preventDefault();
        let s = e.target.elements[0].value;
        window.location.href = '/search/'+ s;
    })

   $(document).pjax('a:not(.song)', '#pjax-container');
    
    
   $('#search').submit(function (e) {
    e.preventDefault();
    if ($.support.pjax)
        $.pjax({url: "/search/" + e.target.elements[0].value, container: '#pjax-container'});
    else
        window.location.href = "/search/" + e.target.elements[0].value;
    });
    
    $(document).on('submit', 'form[data-pjax]', function(event) {
        $.pjax.submit(event, '#pjax-container')
    })
})