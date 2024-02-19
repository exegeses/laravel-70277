
@if( session('mensaje') )
    <div class="alert alert-{{ session('css') }}">
        {{ session('mensaje') }}
    </div>
@endif
