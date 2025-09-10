$('#exilednoname_table').on('change', '.checkable', function() {
  var checkedNodes = $('#exilednoname_table').DataTable().rows('.selected').nodes();
  var count = checkedNodes.length;
  $('#exilednoname_selected').html(count);
  if (count > 0) {
    $('#toolbar_delete').collapse('show');
    $('#collapse_bulk').collapse('show');
  } else {
    $('#toolbar_delete').collapse('hide');
    $('#collapse_bulk').collapse('hide');
  }
});
