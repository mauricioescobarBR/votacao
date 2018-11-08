function confirm_reuniao_modal(url, description, is_open) {
    $('#reuniao_modal').modal('show', {backdrop: 'static', keyboard: false});
    $('#reuniao_modal .is_open').text(is_open);
    $("#reuniao_modal .grt").text(description);
    document.getElementById('reuniao_abrir_link').setAttribute("formaction", url);
    document.getElementById('reuniao_abrir_link').focus();
}