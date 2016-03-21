$('a[title=View]').on('click', function(e){
    e.preventDefault();

    var url =  $(this).attr('href');
    console.log(url);
    $.ajax({
        type:"GET",
        url: url,
        //data:params,
        success:function(data){
            $('#view-book')
                .modal('show')
                .find('.modal-body')
                .html('')
                .append(data);
        },
    });
});