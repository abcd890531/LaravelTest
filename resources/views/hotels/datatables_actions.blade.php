{!! Form::open(['route' => ['hotels.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    
	@if (!Auth::guest())
		<a href="{{ route('hotels.show', $id) }}" class='btn btn-default btn-xs'>
			<i class="glyphicon glyphicon-eye-open"></i>
		</a>
		<a href="{{ route('hotels.edit', $id) }}" class='btn btn-default btn-xs'>
			<i class="glyphicon glyphicon-edit"></i>
		</a>	
		{!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
			'type' => 'submit',
			'class' => 'btn btn-danger btn-xs',
			'onclick' => "return confirm('Are you sure?')"
		]) !!}		
	@else
      <div>	
		<a href="{{ route('hotels.show', $id) }}" class='btn btn-block btn-success' style="font-size:18px">
			<i class="glyphicon">¡Offer!</i>			
		</a>
		<p class="headline text-red">&nbsp;&nbsp;&nbsp;	</p>
		<p class="headline text-red" style="font-size:15px">{!! $included !!} </p>
	 </div>
	@endif
	
</div>
{!! Form::close() !!}
