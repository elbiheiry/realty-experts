$(document).on('submit', '.ajax-form', function () {
    var form = $(this);
    var url = form.attr('action');
    var formData = new FormData(form[0]);
    $('#save-btn').attr('disabled' , true).html('Please wait');

    $.ajax({
        url: url,
        method: 'POST',
        dataType: 'json',
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            swal({
                title: "Good job!",
                text: response,
                icon: "success",
                button: "Ok"
            }).then(function (value) {
                window.location.reload();
            });
        },
        error: function (jqXHR) {
            var response = $.parseJSON(jqXHR.responseText);
            $('#save-btn').attr('disabled' , false).html('Save');
            swal({
                title: "Error",
                text: response,
                icon: "error",
                button: "Ok"
            });
        }
    });

    $.ajaxSetup({
        headers:
            {
                'X-CSRF-Token': $('input[name="_token"]').val()
            }
    });
    return false;
});

$('.deleteBTN').on('click', function() {
    var url = $(this).data('url');

    $('#delete-form').attr('action', url);
});

/***************************************************************************
 * Modal View Modal
 **************************************************************************/

$(document).on('click', '.btn-modal-view', function () {
    var $this = $(this);
    var url = $this.data('url');
    var originalHtml = $this.html();

    $.ajax({
        url: url,
        method: 'GET',
        success: function (data) {
            $this.prop('disabled', false).html(originalHtml);
            $('.modal-data').html(data)
            $('#common-modal').modal('show');
        }
    });
});


// --------------------------Trigger File upload browsing Section ---------------------------
$(document).on('click', '.btn-product-image', function () {
    var btn = $(this);
    var uploadInp = btn.next('input[type=file]');
    uploadInp.change(function () {
        if (validateImgFile(this)) {
            btn.html('');
            previewURL(btn, this);
        }
    }).click();
});

function previewURL(btn, input) {
    if (input.files && input.files[0]) {
        // collecting the file source
        var file = input.files[0];
        // preview the image
        var reader = new FileReader();
        reader.onload = function (e) {
            var src = e.target.result;
            btn.attr('src', src);
        };
        reader.readAsDataURL(file);
    }
}
//validating the file
function validateImgFile(input) {
    if (input.files && input.files[0]) {
        // collecting the file source
        var file = input.files[0];
        // validating the image name
        if (file.name.length < 1) {
            alert("File shall not be empty");
            return false;
        }
        // validating the image size
        else if (file.size > 20000000) {
            alert("The file is too big");
            return false;
        }
        return true;
    }
}

/***************************************************************************
 * identify Tinymce
 **************************************************************************/
if (typeof tinymce !== "undefined") {
    /*Text area Editors
     =========================*/

    tinymce.init({
        selector: '.tiny-editor',
        height: 350,
        theme: 'modern',
        menubar: 'tools',
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code',
            'code'
        ],
        fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
        toolbar: 'undo redo | code | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image |sizeselect | bold italic | fontselect |  fontsizeselect',
        // enable title field in the Image dialog
        image_title: true,
        // enable automatic uploads of images represented by blob or data URIs
        automatic_uploads: true,
        // here we add custom filepicker only to Image dialog
        file_picker_types: 'image',
        file_picker_callback: function(cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');

            // Note: In modern browsers input[type="file"] is functional without
            // even adding it to the DOM, but that might not be the case in some older
            // or quirky browsers like IE, so you might want to add it to the DOM
            // just in case, and visually hide it. And do not forget do remove it
            // once you do not need it anymore.

            input.onchange = function() {
                var file = this.files[0];

                var reader = new FileReader();
                reader.onload = function () {
                    // Note: Now we need to register the blob in TinyMCEs image blob
                    // registry. In the next release this part hopefully won't be
                    // necessary, as we are looking to handle it internally.
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);

                    // call the callback and populate the Title field with the file name
                    cb(blobInfo.blobUri(), { title: file.name });
                };
                reader.readAsDataURL(file);
            };

            input.click();
        }
    });
}