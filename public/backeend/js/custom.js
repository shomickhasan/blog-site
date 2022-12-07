$(document).ready(function () {
    $('#catTable').DataTable();

    $('#postdrescreption').summernote({
        height: 300,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: false,                  // set focus to editable area after initializing summernote
      });
});