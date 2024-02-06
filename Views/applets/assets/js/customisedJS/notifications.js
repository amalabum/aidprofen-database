function Form_submition(actioned_form_id,submitButton, progressBar, participantsElement) {
    var Button_1 = document.getElementById(submitButton);
    var progressb = document.getElementById(progressBar);
    var participants = document.getElementById(participantsElement);

    $(actioned_form_id).on('submit', function(e) {
    progressb.style.display = "block";
        e.preventDefault();
        var $this = $(this);
        var formData = new FormData(this);
        $.ajax({
            url: $this.attr('action'),
            enctype: 'multipart/form-data',
            type: $this.attr('method'),
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function(json) {
                progressb.style.display = "none";
                console.log(json);

                if (json.status == 201) {
                    participants.style.display = "block";
                    Button_1.setAttribute("class", "btn btn-out-dashed waves-light btn-disabled btn-square disabled");
                    Button_1.disabled = true;

                    var message = json.message;

                    function notify(from, align, type, animIn, animOut) {
                        $.growl({
                            message: json.message,
                            url: ''
                        }, {
                            element: 'body',
                            type: type,
                            allow_dismiss: true,
                            placement: {
                                from: from,
                                align: align
                            },
                            offset: {
                                x: 30,
                                y: 30
                            },
                            spacing: 10,
                            z_index: 999999,
                            delay: 3500,
                            timer: 3000,
                            url_target: '_blank',
                            mouse_over: false,
                            animate: {
                                enter: animIn,
                                exit: animOut
                            },
                            icon_type: 'class',
                            template: '<div data-growl="container" style="background:#2ECC71;" class="alert" role="alert">' +
                                '<button type="button" class="close" data-growl="dismiss">' +
                                '<span aria-hidden="true">&times;</span>' +
                                '<span class="sr-only">Close</span>' +
                                '</button>' +
                                '<span data-growl="icon"></span>' +
                                '<span data-growl="title"></span>' +
                                '<span data-growl="message" ></span>' +
                                '<a href="#" data-growl="url"></a>' +
                                '</div>'
                        });
                    }
                    notify("bottom", "right", "inverse", "fadeInRight", "fadeOutRight");
                }
            }
            
            
        });
        return false;
    });
    // $('#plus').on('click', function(e) {
    //     window.location.href = 'detail_maison?m=' + maison_id;
    // });
}


function Login_on_plateform(actioned_form_id,submitButton,element_retour) {
    var Button_1 = document.getElementById(submitButton);
    var RETOur = document.getElementById(element_retour);
    RETOur.style.display = "none";

    // RETOur.css('display', 'none');

    $(actioned_form_id).on('submit', function(e) {
        //progressb.style.display = "block";
        e.preventDefault();
        var $this = $(this);
        var formData = new FormData(this);

        $.ajax({
            
            url: $this.attr('action'),
            enctype: 'multipart/form-data',
            type: $this.attr('method'),
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function(json) {
                if (json.status == 201) {
                    Button_1.setAttribute("class", "btn btn-danger waves-light btn-disabled btn-square disabled");
                    window.location.href = 'add?conf_taged_action=config_volets_new';
                }
                else if(json.status == 202){
                    console.log("erreur");
                    Button_1.setAttribute("class", "btn btn-danger waves-light btn-disabled btn-square disabled");
                    var retournlabel = document.getElementById(element_retour);
                    retournlabel.style.display = "block";                  
                }
            }
            
            
        });
        return false;
    });
    // $('#plus').on('click', function(e) {
    //     window.location.href = 'detail_maison?m=' + maison_id;
    // });
}