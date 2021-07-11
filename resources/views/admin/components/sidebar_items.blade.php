<div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
        <li @if(Route::currentRouteName() == 'admin.main') class="active" @endif>
            <a @if (Route::has('admin.main')) href="{{ route('admin.main') }}" @endif>
                <i class="now-ui-icons design_app"></i>
                <p>{{ __('Home') }}</p>
            </a>
        </li>
        <li @if(Route::currentRouteName() == 'admin.users.index') class="active" @endif>
            <a @if (Route::has('admin.users.index')) href="{{ route('admin.users.index') }}" @endif>
                <i class="fa fa-users"></i>
                <p>{{ __('Users') }}</p>
            </a>
        </li>
        <li @if(Route::currentRouteName() == 'admin.categories.index') class="active" @endif>
            <a @if (Route::has('admin.categories.index')) href="{{ route('admin.categories.index') }}" @endif>
                <i class="fa fa-sliders-h"></i>
                <p>{{ __('Categories') }}</p>
            </a>
        </li>
        <li @if(Route::currentRouteName() == 'admin.products.index') class="active" @endif>
            <a @if (Route::has('admin.products.index')) href="{{ route('admin.products.index') }}" @endif>
                <i class="fa fa-database"></i>
                <p>{{ __('Products') }}</p>
            </a>
        </li>
        <li @if(Route::currentRouteName() == 'admin.orders.index') class="active" @endif>
            <a @if (Route::has('admin.orders.index')) href="{{ route('admin.orders.index') }}" @endif>
                <i class="fa fa-handshake"></i>
                <p>{{ __('Orders') }}</p>
            </a>
        </li>
        <li @if(Route::currentRouteName() == 'admin.advertisements.index') class="active" @endif>
            <a @if (Route::has('admin.advertisements.index')) href="{{ route('admin.advertisements.index') }}" @endif>
                <i class="fa fa-ad"></i>
                <p>{{ __('Advertisements') }}</p>
            </a>
        </li>
        <li @if(Route::currentRouteName() == 'admin.productImages.index') class="active" @endif>
            <a @if (Route::has('admin.productImages.index')) href="{{ route('admin.productImages.index') }}" @endif>
                <i class="fa fa-images"></i>
                <p>{{ __('Medias and Files') }}</p>
            </a>
        </li>
    </ul>
</div>
