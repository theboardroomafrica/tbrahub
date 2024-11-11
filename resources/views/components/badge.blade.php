@if (is_null($state))
    <span class="badge badge-mustard">{{ $slot }}</span>
@elseif($state)
    <span class="badge badge-success">{{ $slot }}</span>
@else
    <span class="badge badge-danger">{{ $slot }}</span>
@endif
