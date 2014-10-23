
$(document).ready(function() {
    $('#autocompletion').autocomplete({
        serviceUrl: 'autocompletion.php',
        dataType: 'json'
    });
});