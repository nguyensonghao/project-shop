// $(document).ready(function () {
  // var $image = $(".col-cropper-image > img");
  // $image.cropper({
  //   aspectRatio: 16 / 9
  // }); 

  function onImagePicked(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            // Reset image url after change value file input
            var htmlImageTag = '<img src="" class="croper-image">';
            $('.col-cropper-image').html(htmlImageTag);

            // Get width, heigth and create image
            var defaultWidth = $('.col-cropper-image')[0].clientWidth - 20;
            var imageUrl = e.target.result;
            var img = $('<img />', {src : imageUrl});
            var widthImage = img[0].width;
            var heightImage = img[0].height;
            var widthCreate = defaultWidth;
            var heightCreate = defaultWidth * heightImage / widthImage;                    

            $('.col-cropper-image').width(widthCreate)
                    .height(heightCreate);

            $('.croper-image')
                    .attr('src', imageUrl)
                    .width(widthCreate)
                    .height(heightCreate);

            // Innit crop image
            var image = $(".col-cropper-image > img");
            image.cropper({
                aspectRatio: 200/200,
                resizable: true,
                zoomable: false,
                rotatable: false,
                multiple: true,
                built: function () {
                    var originalData = image.cropper("getCroppedCanvas");
                    var imageCropUrl = originalData.toDataURL();
                    $('#image_encode').val(imageCropUrl);
                },
                cropend: function () {
                    var originalData = image.cropper("getCroppedCanvas");
                    var imageCropUrl = originalData.toDataURL();
                    $('#image_encode').val(imageCropUrl);
                }
            });

        };

        reader.readAsDataURL(input.files[0]);        
    }
  }  

function deleteRecord (id) {
    $('#id-record').val(id);
}

$(document).ready(function () {
    // Validate form add label
    $('#form-add-label').validate({
        rules: {
            name: "required",
            avatar: "required",
            editor: "required"
        },
        messages: {
            name: "Please enter label name",
            avatar: "Please chosen avatar",
            editor: "Please enter label description"
        }
    })

    $('#form-update-label').validate({
        rules: {
            name: "required",
            editor: "required"
        },
        messages: {
            name: "Please enter label name",
            editor: "Please enter label description"
        }
    })

    $('#form-add-category').validate({
        rules: {
            name: "required",
            avatar: "required",
            editor: "required"
        },
        messages: {
            name: "Please enter category name",
            avatar: "Please chosen avatar",
            editor: "Please enter category description"
        }
    })

    // Validate form add category
    $('#form-update-category').validate({
        rules: {
            name: "required",
            editor: "required"
        },
        messages: {
            name: "Please enter category name",
            editor: "Please enter category description"
        }
    })
    
    $(".select2_single").select2({
        placeholder: "Select a state",
        allowClear: true
    });

})