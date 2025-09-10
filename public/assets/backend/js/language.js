fetch("{{ route('assets.lang') }}").then(response => {
    return response.json();
}).then(data => {
    translations = data;
});
window.translations = {
    default: {
        label: {
            please_wait: "{{ __('default.label.please_wait') }}"
        }
    }
};