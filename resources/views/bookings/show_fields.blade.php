<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $booking->id !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $booking->nombre !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $booking->email !!}</p>
</div>

<!-- Card Number Field -->
<div class="form-group">
    {!! Form::label('card_number', 'Card Number:') !!}
    <p>{!! $booking->card_number !!}</p>
</div>

<!-- Expiration Date Field -->
<div class="form-group">
    {!! Form::label('expiration_date', 'Expiration Date:') !!}
    <p>{!! $booking->expiration_date !!}</p>
</div>

<!-- Cvcode Field -->
<div class="form-group">
    {!! Form::label('cvCode', 'Cvcode:') !!}
    <p>{!! $booking->cvCode !!}</p>
</div>

<!-- Hotel Id Field -->
<div class="form-group">
    {!! Form::label('hotel_id', 'Hotel Id:') !!}
    <p>{!! $booking->hotel_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $booking->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $booking->updated_at !!}</p>
</div>

