<li class="{{ Request::is('hotels*') ? 'active' : '' }}">
    <a href="{!! route('hotels.index') !!}"><i class="fa fa-edit"></i><span>Hotels</span></a>
</li>


<li class="{{ Request::is('rooms*') ? 'active' : '' }}">
    <a href="{!! route('rooms.index') !!}"><i class="fa fa-edit"></i><span>Rooms</span></a>
</li>

<li class="{{ Request::is('tariffs*') ? 'active' : '' }}">
    <a href="{!! route('tariffs.index') !!}"><i class="fa fa-edit"></i><span>Tariffs</span></a>
</li>

<li class="{{ Request::is('searches*') ? 'active' : '' }}">
    <a href="{!! route('searches.index') !!}"><i class="fa fa-edit"></i><span>searches</span></a>
</li>

<li class="{{ Request::is('bookings*') ? 'active' : '' }}">
    <a href="{!! route('bookings.index') !!}"><i class="fa fa-edit"></i><span>bookings</span></a>
</li>

