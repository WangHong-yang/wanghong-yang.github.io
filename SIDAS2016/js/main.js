ALLOWED_EXTENSIONS = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'JPG', 'PNG'];
function contains(a, obj) {
    for (var i = 0; i < a.length; i++) {
        if (a[i] == obj) {
            return true;
        }
    }
    return false;
}
function validate_image(filename) {
    return contains(ALLOWED_EXTENSIONS, filename.split('.')[1]);
}
function previewImage(file) {
    // Put data URL
    var reader = new FileReader();
    reader.onload = (function(aImg) { return function(e) { aImg.src = e.target.result; }; })($('#previewImg')[0]);
    reader.readAsDataURL(file);
    // Display image
    $('div#preview').css({'display': 'block'});
}
function handle_files(files) {
    console.log('Handling...')
    if (validate_image(files[0].name)) {
        // hide text
        $('div#text').css({'display':'none'});
        previewImage(files[0]);
    } else {
        alert('Please input image files with .jpg .jpeg .png .gif .bmp extensions.')
    }
}

