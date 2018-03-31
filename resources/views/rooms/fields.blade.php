<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Hotel Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hotel_id', 'Hotel:') !!}
    <!--{!! Form::text('hotel_id', null, ['class' => 'form-control']) !!}-->
	{{ Form::select('hotel_id',$arrayhotel,null, ['class' => 'form-control'],['id' => 'form-control'])}}
</div>

<!-- Type Availability Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type_availability', 'Type Availability:') !!}
    <!--{!! Form::text('type_availability', null, ['class' => 'form-control']) !!}-->
	 {{ Form::select('type_availability',['AVAILABLE' => 'AVAILABLE','ON REQUEST' => 'ON REQUEST','SOLD OUT' => 'SOLD OUT'],null, ['class' => 'form-control'],['id' => 'form-control'])}}
</div>

<!-- Total People Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_people', 'Total People:') !!}
    {!! Form::text('total_people', null, ['class' => 'form-control']) !!}
</div>

<!-- King Field -->
<div class="form-group col-sm-6">
    {!! Form::label('king', 'King:') !!}
    {{ Form::select('king',['1' => 'Yes','0' => 'No'],null, ['class' => 'form-control'],['id' => 'form-control'])}}
</div>

<!-- Daybed Field -->
<div class="form-group col-sm-6">
    {!! Form::label('daybed', 'Daybed:') !!}
    {{ Form::select('daybed',['1' => 'Yes','0' => 'No'],null, ['class' => 'form-control'],['id' => 'form-control'])}}
</div>

<!-- Balcony Field -->
<div class="form-group col-sm-6">
    {!! Form::label('balcony', 'Balcony:') !!}
    {{ Form::select('balcony',['1' => 'Yes','0' => 'No'],null, ['class' => 'form-control'],['id' => 'form-control'])}}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('rooms.index') !!}" class="btn btn-default">Cancel</a>
</div>
