/**
 * Created by nanakwafo on 23/02/2020.
 */

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#preview_image').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
$(document).on('change', 'input[type="file"]', function () {
    readURL(this);

})

