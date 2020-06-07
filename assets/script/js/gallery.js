$(document).ready(function() {
    $('#galleryHeaderView').addClass('active');
    $('#galleryPhotoView').addClass('active');

    var urlParams = new URLSearchParams(window.location.search);
    var folderItem = urlParams.get('folderid');
    if (folderItem == "1587894961" || folderItem == "1587916779" || folderItem == "1587917258") {
        $('#ashramPhotoView').addClass('active');
    } else {
        $('#masterPhotoView').addClass('active');
    }
    $('#galleryView_' + folderItem).addClass('active');
    loadCategory()
    if (!window.localStorage.languageCode) {
        window.localStorage.languageCode = 'en';
    } else {
        $('#languageSelector').val(window.localStorage.languageCode);
    }
});