<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Taxes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('taxes', 'Taxes:') !!}
    {!! Form::text('taxes', null, ['class' => 'form-control']) !!}
</div>

<!-- Fees Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fees', 'Fees:') !!}
    {!! Form::text('fees', null, ['class' => 'form-control']) !!}
</div>

<!-- Promo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('promo', 'Promo:') !!}
    {!! Form::text('promo', null, ['class' => 'form-control']) !!}
</div>

<!-- Condition Field -->
<div class="form-group col-sm-6">
    {!! Form::label('condition', 'Condition:') !!}
    {!! Form::text('condition', null, ['class' => 'form-control']) !!}
</div>

<!-- Policy Field -->
<div class="form-group col-sm-6">
    {!! Form::label('policy', 'Policy:') !!}
    {!! Form::text('policy', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Start Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_start', 'Date Start:') !!}
    {!! Form::date('date_start', null, ['class' => 'form-control']) !!}
</div>

<!-- Date End Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_end', 'Date End:') !!}
    {!! Form::date('date_end', null, ['class' => 'form-control']) !!}
</div>

<!-- Room Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('room_id', 'Room Id:') !!}
    <!--{!! Form::text('room_id', null, ['class' => 'form-control']) !!}-->
	{{ Form::select('room_id',$arrayroom,null, ['class' => 'form-control'],['id' => 'form-control'])}}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tariffs.index') !!}" class="btn btn-default">Cancel</a>
</div>
