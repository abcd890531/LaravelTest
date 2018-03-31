<!-- Picture Field -->
<div class="form-group col-sm-6">
    {!! Form::label('picture', 'Picture (public/img/):') !!}
    {!! Form::text('picture', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Classification Field -->
<div class="form-group col-sm-6">
    {!! Form::label('classification', 'Classification (5,4,3,2,1):') !!}
    {!! Form::text('classification', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Included Field-->
<div class="form-group col-sm-6">
    {!! Form::label('included', 'Included(all-in,breakfast:') !!}
    {!! Form::text('included', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('hotels.index') !!}" class="btn btn-default">Cancel</a>
</div>
