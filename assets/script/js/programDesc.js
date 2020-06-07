var planProgramData = {};
var scheduleTemplates = "";

$(document).ready(function() {
    $('#scheduleHeaderView').addClass('active');
    $('#progromDescListView').addClass('active');
    loadCategory()
    if (!window.localStorage.languageCode) {
        window.localStorage.languageCode = 'en';
    } else {
        $('#languageSelector').val(window.localStorage.languageCode);
    }
});
