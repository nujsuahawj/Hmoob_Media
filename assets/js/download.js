(function() {
    'use strict';

    $(document).ready(function() {

        var sTime = new Date().getTime();
        var countDown = WAITING_TIME; // WATING TIME

        function UpdateCountDownTime() {
            var cTime = new Date().getTime();
            var diff = cTime - sTime;
            var timeStr = '';
            var seconds = countDown - Math.floor(diff / 1000);
            if (seconds >= 0) {
                var hours = Math.floor(seconds / 3600);
                var minutes = Math.floor((seconds - (hours * 3600)) / 60);
                seconds -= (minutes * 60);
                if (seconds < countDown) {
                    timeStr = timeStr + "" + seconds;
                } else {
                    timeStr = timeStr + "" + seconds;
                }
                document.getElementById("flb_download_file").innerHTML = 'Please Wait ' + timeStr + ' Seconds';
            } else {
                $('.flb_download_file').remove();
                $('#flb_download_files').append('<button id="flb_request_file" data-authorized="' + AUTHORIZED + '"  data-id="' + FILE_ID + '" class="flb_download_file btn-green download_btn btn w-100"><span class="download_spinner spinner-border spinner-border-sm me-2 d-none" role="status"></span> Download file (' + FILE_SIZE + ')</button>');
                clearInterval(counter);
            }
        }
        UpdateCountDownTime();
        var counter = setInterval(UpdateCountDownTime, 500);

        // STATRT DOWNLOAD FILE
        $("body").on("click", "#flb_request_file", function(e) {
            e.preventDefault();
            $('.download_spinner').removeClass('d-none');
            var authorized = $(this).data("authorized");
            var file_id = $(this).data("id");
            $.ajax({
                url: BASE_URL + "/download/request/" + authorized + "/" + file_id,
                type: 'get',
                dataType: "JSON",
                data: { "authorized": authorized, 'file_id': file_id },
                success: function(response) {
                    $('.download_spinner').addClass('d-none');
                    if ($.isEmptyObject(response.error)) {
                        $('#flb_request_file').remove();
                        $('#flb_download_files').append('<button class="flb_download_file text-dark download_btn btn w-100 disabled">Downloading.....</button>');
                        window.location = response.download_link;
                    } else {
                        swal("Opps !", response.error, {
                            icon: "error",
                            buttons: {
                                confirm: {
                                    className: 'btn btn-danger'
                                }
                            },
                        }).then(function() {
                            location.reload();
                        });
                    }
                },
            });
        });

        // COPY THE LINK
        $('#copyLink').on('click', function() {
            var copyText = document.getElementById("sharelink");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");
        });
    });
})(jQuery);