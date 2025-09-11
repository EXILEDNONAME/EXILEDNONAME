<script>
    var EXILEDNONAME = {};
</script>

@if(!empty($datatable) && $datatable == 'true' || !empty($activities) && $activities == 'true' || !empty($trash) && $trash == 'true' || !empty($administrative) && $administrative == 'true')
<script>
    var this_url = "{{ request()->getPathInfo(); }}";
    var active = "{{ !empty($active) && $active == 'true' ? 'true' : '' }}";
    var charts = "{{ !empty($charts) && $charts == 'true' ? 'true' : '' }}";
    var date = "{{ !empty($date) && $date == 'true' ? 'true' : '' }}";
    var daterange = "{{ !empty($daterange) && $daterange == 'true' ? 'true' : '' }}";
    var file = "{{ !empty($file) && $file == 'true' ? 'true' : '' }}";
    var status = "{{ !empty($status) && $status == 'true' ? 'true' : '' }}";
    var extensions = "{{ !empty($extension) && $extension == 'management-users' ? 'management-users' : '' }}";
    var sort = "{{ !empty($sort) && $sort > 0 ? $sort : '1, desc' }}";
    window.tableBodyColumns = [
        @yield('table-body')
    ];
</script>
@endif

<script src="{{ env('APP_URL') }}/assets/backend/plugins/global/plugins.bundle.js"></script>
<script src="{{ env('APP_URL') }}/assets/backend/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="{{ env('APP_URL') }}/assets/backend/js/scripts.bundle.js"></script>
<script src="{{ env('APP_URL') }}/assets/backend/js/pages/widgets.js"></script>
@stack('js')

@if ($message = Session::get('success'))
<script>
    toastr.success('{{ $message }}');
</script>
@endif
@if ($message = Session::get('error'))
<script>
    toastr.error('{{ $message }}');
</script>
@endif