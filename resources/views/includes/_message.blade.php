@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <script>
            $(document).ready(function() {
                new PNotify({
                    title: 'Oh no! an error occurred..',
                    text: '{{$error}}',
                    type: 'error',
                    styling: 'bootstrap3',
                });
            });
        </script>
    @endforeach
@endif
@if (session('success'))
    <script>
        $(document).ready(function() {
            new PNotify({
                title: 'Success!',
                text: '{{session('success')}}',
                type: 'success',
                styling: 'bootstrap3',
            });
        });
    </script>
@endif
@if (session('error'))
    <script>
        $(document).ready(function() {
            new PNotify({
                title: 'Failed!',
                text: '{{session('error')}}',
                type: 'error',
                styling: 'bootstrap3',
            });
        });
    </script>
@endif
@if (session('info'))
    <script>
        $(document).ready(function() {
            new PNotify({
                title: 'Information',
                text: '{{session('info')}}',
                styling: 'bootstrap3',
            });
        });
    </script>
@endif