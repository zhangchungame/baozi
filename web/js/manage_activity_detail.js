var EcommerceProductsEdit = function () {

    var handleImages = function() {

        // see http://www.plupload.com/
        var uploader = new plupload.Uploader({
            runtimes : 'html5,flash,silverlight,html4',

            browse_button : document.getElementById('tab_images_uploader_pickfiles'), // you can pass in id...
            container: document.getElementById('tab_images_uploader_container'), // ... or DOM Element itself

            // url : "assets/plugins/plupload/examples/upload.php",
            url : "?r=manage/base/imageupload",

            filters : {
                max_file_size : '10mb',
                mime_types: [
                    {title : "Image files", extensions : "jpg,gif,png"},
                    {title : "Zip files", extensions : "zip"}
                ]
            },

            // Flash settings
            flash_swf_url : 'assets/plugins/plupload/js/Moxie.swf',

            // Silverlight settings
            silverlight_xap_url : 'assets/plugins/plupload/js/Moxie.xap',

            init: {
                PostInit: function() {
                    $('#tab_images_uploader_filelist').html("");

                    $('#tab_images_uploader_uploadfiles').click(function() {
                        uploader.start();
                        return false;
                    });

                    $('#tab_images_uploader_filelist').on('click', '.added-files .remove', function(){
                        uploader.removeFile($(this).parent('.added-files').attr("id"));
                        $(this).parent('.added-files').remove();
                    });
                },

                FilesAdded: function(up, files) {
                    console.log(up,files);
                    plupload.each(files, function(file) {
                        $('#tab_images_uploader_filelist').append('<div class="alert alert-warning added-files" id="uploaded_file_' + file.id + '">' + file.name + '(' + plupload.formatSize(file.size) + ') <span class="status label label-info"></span>&nbsp;<a href="javascript:;" style="margin-top:-5px" class="remove pull-right btn btn-sm red"><i class="fa fa-times"></i> remove</a></div>');
                    });
                },

                UploadProgress: function(up, file) {
                    $('#uploaded_file_' + file.id + ' > .status').html(file.percent + '%');
                },

                FileUploaded: function(up, file, response) {
                    // console.log(up,file,response);
                    var response = $.parseJSON(response.response);

                    if (response.result && response.result == 'OK') {
                        response.label='';
                        response.sort_order=1;
                        imageShowAdd(response);
                        $('#uploaded_file_' + file.id ).remove();//successfull upload
                    } else {
                        $('#uploaded_file_' + file.id + ' > .status').removeClass("label-info").addClass("label-danger").html('<i class="fa fa-warning"></i> Failed'); // set failed upload
                        App.alert({type: 'danger', message: 'One of uploads failed. Please retry.', closeInSeconds: 10, icon: 'warning'});
                    }
                },

                Error: function(up, err) {
                    App.alert({type: 'danger', message: err.message, closeInSeconds: 10, icon: 'warning'});
                }
            }
        });

        uploader.init();

    }



    var initComponents = function () {
        //init datepickers
        $('.date-picker').datepicker({
            rtl: App.isRTL(),
            autoclose: true
        });

        //init datetimepickers
        $(".datetime-picker").datetimepicker({
            isRTL: App.isRTL(),
            autoclose: true,
            todayBtn: true,
            pickerPosition: (App.isRTL() ? "bottom-right" : "bottom-left"),
            minuteStep: 10
        });

        //init maxlength handler
        $('.maxlength-handler').maxlength({
            limitReachedClass: "label label-danger",
            alwaysShow: true,
            threshold: 5
        });
    }

    return {

        //main function to initiate the module
        init: function () {
            initComponents();

            handleImages();
        }

    };

}();

jQuery(document).ready(function() {
    EcommerceProductsEdit.init();
});