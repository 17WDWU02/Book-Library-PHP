$("#addNewAuthor").click(function(event){
    event.preventDefault();
    $("#author").toggle();
    if ($('#author').is(':visible')) {
        $("#addNewAuthor").text("hide input field");
        $("input[name='authorid']").each(function(i, obj){
            $(obj).prop('checked', false);
        })
        $("input[type=authorid]").attr('disabled', true);
        $(".radio-inline").each(function(i, obj) {
            $(obj).css('opacity', '.2');
        });

    } else {
        $("#addNewAuthor").text("add new author");
        $("input[type=authorid]").attr('disabled', false);
        $(".radio-inline").each(function(i, obj) {
            $(obj).css('opacity', '1');
        });
    }
})

$("input[name='authorid']").change(function(event){
    if($(this).attr('checked', true)){
        $("#author").val("");
    }
});

$(".updateAuthor").click(function(event){
    var button = $(this);
    if(button.text() == "Edit Author"){
        event.preventDefault();
        $(this).text("Update Author");
        var td = $(this).parent().parent().find(".authorName");
        var $this = $(this);
        var $input = $('<input>', {
            value: td.text(),
            type: 'text',
            class: 'form-control',
            name: 'authorName',
            blur: function() {
               td.text(this.value);
               button.text("Edit Author");
            //    button.parent().parent().find('form').submit();
            },
            keyup: function(e) {
               if (e.which === 13) $input.blur();
            }
        }).appendTo( td.empty() ).focus();
    } else {
        button.parent().parent().find('form').submit();
    }

})
