<script>
    console.log('Notyf notifications system present on page.');
    @if(Session::has('notyf'))
    const notyf = new Notyf({
        duration: {{ Session::get('notyf.5') }},
        dismissible: {{ Session::get('notyf.2') }},
        position: {
            x: "{{ Session::get('notyf.3') }}",
            y: "{{ Session::get('notyf.4') }}",
        },
        types: [
            {
                type: 'error',
                background: '#ed3d3d',
                icon: {
                    className: 'fas fa-shield-alt',
                    color: '#fff',
                }
            },
            {
                type: 'success',
                background: '#3dc763',
                icon: {
                    className: 'fas fa-check',
                    color: '#fff',

                }
            },
            {
                type: 'warning',
                background: '#ff9354',
                icon: {
                    className: 'fas fa-exclamation-triangle',
                    color: '#fff',
                }
            },
            {
                type: 'info',
                background: '#54c6ff',
                icon: {
                    className: 'fas fa-info-circle',
                    color: '#fff',
                }
            },
            {{ config('notyf.custom_types_js') }}
        ]
    });
    var type = "{{ Session::get('notyf.0', 'success') }}";
    switch (type) {
        case 'success':
            notyf.open({
                type: 'success',
                message: "{{ Session::get('notyf.1') }}",
            });
            break;

        case 'warning':
            notyf.open({
                type: 'warning',
                message: "{{ Session::get('notyf.1') }}",
            });
            break;

        case 'info':
            notyf.open({
                type: 'info',
                message: "{{ Session::get('notyf.1') }}",
            });
            break;

        case 'error':
            notyf.open({
                type: 'error',
                message: "{{ Session::get('notyf.1') }}",
            });
            break;
    }
    @endif
</script>
