formSubmit = function (t, e) {
    const form = $(t).parents('form');
    const action = $(form).attr('action');
    const method = $(form).attr('method');
    const mime = $(form).attr('enctype');
    const btn = $(t).html();
    $(form).one('submit', function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            url: action,
            type: method,
            beforeSend: function () {
                $(t).attr('disabled', 'disabled');
                $('.has-error').find('.text-danger').text('');
                $('.form-control').parent('.has-error').removeClass('has-error');
                $(t).children().html('<i class="fa fa-spinner fa-spin"></i>');
            },
            data: formData,
            processData: false,
            contentType: false,
            mimeType: mime,
            dataType: 'JSON',
            xhr: function () {
                let xhr = new window.XMLHttpRequest();
                if (xhr.upload) {
                    xhr.upload.addEventListener('progress', function (event) {
                        let percent = 0;
                        let position = event.loaded || event.position;
                        let total = event.total;
                        if (event.lengthComputable) {
                            percent = Math.ceil(position / total * 100);
                        }
                    }, true);
                }
                return xhr;
            },
        }).done(function (ret) {
            let type = ret.type;
            let title = ret.title;
            if (ret.type == 'success') {
                $(form)[0].reset();
                resetSummernote();
            }
            Swal.fire({
                title: title,
                text: ret.message,
                icon: type,
                timer: 5000
            }).then(function (res) {
                if (ret.redirect && res) {
                    redirect(ret.redirect);
                }
                if (ret.redirect_new_tab && res) {
                    redirectNewTab(ret.redirect_new_tab)
                }
            }, function (dismiss) {
                if (ret.redirect && dismiss === 'timer') {
                    redirect(ret.redirect);
                }
            });
        }).fail(function (res) {
            errors = res.responseJSON['errors'];
            console.log(errors);
            if (errors) {
                $.each(errors, function (index, error) {
                    $("[name=" + index + "]").parents('.form-group').find('.text-danger').text(error);
                    $("[name=" + index + "]").parent().addClass('has-error');
                    $(form).find("." + index).text(error);
                });
            }
        }).always(function () {
            $(t).removeAttr('disabled');
            $(t).html(btn);
        });
    });
};

function redirect($url) {
    setTimeout(function () {
        window.location.href = $url;
    }, 200);
    return true;
}

function redirectNewTab($url) {
    setTimeout(function () {
        window.open($url, '_blank')
    }, 200);
    return true;
}

function resetSummernote() {
    if ($('html').find('.summernote').length > 0) {
        $('.summernote').summernote('code', '');
    }
    return true;
}

function resetMultiSelect() {
    if ($('html').find('.multi-select').length > 0) {
        $('.multi-select').multiSelect('refresh');
    }
    return true;
}

function deleteSubmit(t, e) {
    e.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#05a6ef',
        cancelButtonColor: '#4c4c4c',
        confirmButtonText: 'Yes, delete it!'
    }).then(function (stat) {
        if (stat.value != undefined && stat.value) {
            let form = $(t).parents('form'),
                action = $(form).attr('action'),
                method = $(form).attr('method'),
                btn = $(t).html();
            let formData = $(form).serialize();
            $.ajax({
                url: action,
                type: method,
                beforeSend: function () {
                    $(t).attr('disabled', 'disabled');
                    $(t).html('<i class="fa fa-spinner fa-spin"></i>');
                },
                data: formData,
                dataType: 'JSON',
                success: function (res) {
                    let icon = res.type;
                    let title = res.title;
                    let parent = 'tr';
                    if (res.type == 'success') {
                        if (res.parent) {
                            parent = res.parent;
                        }
                        $(t).parents(parent).remove();
                    }
                    swal.fire(title, res.message, icon);
                },
                complete: function () {
                    $(t).removeAttr('disabled');
                }
            });
        }
    });
}
