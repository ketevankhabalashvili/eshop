<div class="sidebar" data-color="red">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
    <div class="logo">
        <a @if (Route::has('admin.main')) href="{{ route('admin.main') }}" @endif class="simple-text logo-mini"></a>
        <a @if (Route::has('admin.main')) href="{{ route('admin.main') }}" @endif class="simple-text logo-normal">
            {{ config('app.name', 'Laravel') }} <b>{{ __('CMS') }}</b>
        </a>
    </div>
    @include('admin.components.sidebar_items')
</div>
