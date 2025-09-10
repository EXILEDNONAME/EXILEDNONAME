$('#exilednoname_table').on('change', '.group-checkable', function() {
    var set = $(this).closest('table').find('td:first-child .checkable');
    var checked = $(this).is(':checked');
    $(set).each(function() {
      if (checked) {
        $(this).prop('checked', true);
        $('#exilednoname_table').DataTable().rows($(this).closest('tr')).select();
        var checkedNodes = $('#exilednoname_table').DataTable().rows('.selected').nodes();
        var count = checkedNodes.length;
        $('#exilednoname_selected').html(count);
        if (count > 0) {
          $('#toolbar_delete').collapse('show');
          $('#collapse_bulk').collapse('show');
        }
      } else {
        $(this).prop('checked', false);
        $('#exilednoname_table').DataTable().rows($(this).closest('tr')).deselect();
        $('#toolbar_delete').collapse('hide');
        $('#collapse_bulk').collapse('hide');
      }
    });
  });
