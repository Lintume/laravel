$(document).ready(function(){

    $('.table_body').on('click', '.popup_hash', function (event) {
        $("#myModal").modal();
        $(".pop_table").empty();
        var row = $(this).closest('tr');
        var json_hashes = row.data('hash');
        //console.log(json_hashes);
        for (var algorithm in json_hashes)
        {
            var hidden_row = $('table tr.hidden').clone();
            var hash = json_hashes[algorithm];
            var substr = hash.substr(0, 30);
            hidden_row.find('.hash').text(substr);
            hidden_row.find('.algorithm').text(algorithm);
            hidden_row.find('.actions').data('wordid', row.data('word_id'));
            hidden_row.removeClass('hidden');

            $('.pop_table').append(hidden_row);
        }

        $('#myModal .modal-header h4').text(row.find('.text_word').text());
    });

    $('.pop_table').on('click', '.actions', function (event) {
        var row = $(this).closest('tr');
        console.log(row.find('.algorithm').text());
        $.ajax({
            url:"/laravel/public/hashes",
            method: "POST",
            data: { word_id: $('.actions').eq(2).data('wordid'), hash: row.find('.hash').text(), algorithm: row.find('.algorithm').text()},
            success: function(response){ // What to do if we succeed
                console.log(response);
            },
            error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });
    });
});