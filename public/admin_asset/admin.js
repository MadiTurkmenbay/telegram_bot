$(document).ready(function () {
    $(".nav-treeview .nav-link, .nav-link").each(function () {
        var location2 = window.location.protocol + '//' + window.location.host + window.location.pathname;
        var link = this.href;
        if (link === location2) {
            $(this).addClass('active');
            $(this).parent().parent().parent().addClass('menu-is-opening menu-open');
        }
    });
    $(".hidden_urls").each(function () {
        var location2 = window.location.protocol + '//' + window.location.host + window.location.pathname;
        var link = this.dataset.hsss;
        if (link === location2) {
            // $(this).addClass('active');
            $(this).parent().addClass('active');
        }
    });

    $('.delete-btn').click(function () {
        var res = confirm('Подтвердите действия');
        if (!res) {
            return false;
        }
    });
})
let videos_add = [];
let authors =''
function add_video(event) {
    event.preventDefault()
    authors = ''
    let author = $('#video_input').val()
    if (author.length > 1){
        videos_add.push(author)
    }
    videos_add.forEach(function callback(currentValue, index, array) {
        authors += '<div class="one_author" id="' + index + '"><p>' + currentValue + '</p> <button type="button" onclick="del_video(' + index + ')"><img src="/images/close_white.svg" alt="close"></button></div>'
    })
    $('.videos_wrap').html(authors)
    $('.hidden_videos').val(videos_add)
    $('#video_input').val('')
}

function del_video(index) {
    if (index > -1) {
        videos_add.splice(index, 1);
    }
    authors = ''
    videos_add.forEach(function callback(currentValue, index, array) {
        authors += '<div class="one_author" id="' + index + '"><p>' + currentValue + '</p> <button type="button" onclick="del_video(' + index + ')"><img src="/images/close_white.svg" alt="close"></button></div>'
    })
    $('.videos_wrap').html(authors)
    $('.hidden_videos').val(videos_add)
}

