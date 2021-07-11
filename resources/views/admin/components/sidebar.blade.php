<div class="sidebar" data-color="red">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
    <div class="logo">
        <a href="{{ route('admin.main') }}" class="simple-text logo-mini"></a>
        <a href="{{ route('admin.main') }}" class="simple-text logo-normal">
            {{ config('app.name', 'Laravel') }} <b>{{ __('CMS') }}</b>
        </a>
    </div>
    @include('admin.components.sidebar_items')
</div>
