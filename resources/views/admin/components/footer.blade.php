<footer class="footer">
    <div class="container-fluid">
        <div class="copyright" id="copyright">
            {{ __('Copyright') }} &copy; <script>
                document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script> <a @if (Route::has('home123')) href="{{ route('home123') }}" @endif target="_blank" class="text-danger">{{ config('app.name', 'Laravel') }}</a>. {{ __('All rights reserved.') }}
        </div>
    </div>
</footer>
