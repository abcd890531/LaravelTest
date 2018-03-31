@extends('layouts.app')

@section('content')
@if (Auth::guest())
<div class="container">
    <div class="row">
        <div  class="col-md-10 col-md-offset-1">	
          	<div class="panel panel-default">
@endif
		<section class="content-header">
			<h1 class="pull-left">Rooms</h1>
			
		</section>
		<div class="content">
			<div class="clearfix"></div>

			@include('flash::message')

			<div class="clearfix"></div>
			<div class="box box-primary">
			  <h1></h1>
			   <table class="table table-striped table-bordered table-hover display nowrap dataTable dtr-inline collapsed" id="mydata">
			       <thead>
				      <tr>
					    <th>Room Name</th>
						<th>Type of Availability</th>
						<th>Information</th>
						<th>Price</th>
						<th>Action</th>
					  </tr>
				   </thead>
				   <tfoot>
                       <tr>
					    <th>Room Name</th>
						<th>Type of Availability</th>
						<th>Information</th>
						<th>Price</th>
						<th>Action</th>
					  </tr>				   
				   </tfoot>
				   <tbody>
				     <?php foreach ($rooms as $room): ?>				       
					   <tr>
							<td> <h5 class="name__copytext m-0 item__slideout-toggle"  dir="ltr"><?php echo $room->name; ?></h5></td>
							<td><p class="headline text-orange" style="font-size:15px"><?php echo $room->type_availability; ?></p></td>
							<td><h5 class="name__copytext m-0 item__slideout-toggle"  dir="ltr"><span class="glyphicon glyphicon-eye-open"></span><a data-toggle="modal" data-target="#<?php echo $room->id;?>" style="cursor:pointer;"><strong> DETAILS<strong><a/></h5></td>
							<td><strong>{!! $hotel->price !!}</strong> USD Per Night</td>
							<td><h5 class="name__copytext m-0 item__slideout-toggle"  dir="ltr"><a  data-toggle="modal" data-target="#req" style="cursor:pointer;" href="#" ><strong><?php if($room->type_availability != "SOLD OUT") echo "REQUEST"; ?> </strong><a/></h5></td>
						</tr>	 

						<div class="modal fade" id="<?php echo $room->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">	
						 <div class="modal-dialog">
							 <div class="modal-content">
							   <div class="modal-header">
								 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								 <h4>ROOM INFORMATION - {!! $room->name !!}</h4>							 
							   </div>								
								<div class="modal-body">
									 @if ($room->king == 1)
                                       <a href="#" class="btn btn-info btn-la"><span class="glyphicon glyphicon-bed"></span> King</a>
                                     @endif	
                                      @if ($room->daybed == 1)
                                       <a href="#" class="btn btn-info btn-la"><span class="fa fa-fw fa-bed"></span> Daybed</a>
                                     @endif	
                                     @if ($room->balcony == 1)
									 <a href="#" class="btn btn-info btn-la"><span class="fa fa-fw fa-university"></span> Balcony </a>
                                     @endif	 
									   									
                                      <p>&nbsp;&nbsp;</p>Total People: 
                                      	@for ($i = 0; $i < $room->total_people; $i++)
                                           <span class="glyphicon glyphicon-user"></span> 
                                        @endfor
										<p>&nbsp;&nbsp;</p>
                                       <p><strong>Conditions and Offers</strong></p> 
                                       @foreach ($tariffs as $tariff)
										  @if ($tariff->room_id == $room->id)
										       <strong>.</strong>{!! $tariff->condition !!}
										      <p>&nbsp;&nbsp;</p>
                                              <p><strong>Cancellation Policy</strong></p>
                                               <strong>.</strong>{!! $tariff->policy !!}	
											   <p></p>
                                                <strong>Price: </strong> {!! $tariff->price !!} USD		
											   <strong>Taxes :  </strong>{!! $tariff->taxes !!} USD
											   <strong>Fees {!! $tariff->fees !!}p/nt  </strong>{!! $tariff->fees !!} USD
											    <strong>Total :  </strong><?php echo ((int)$tariff->price)+((int)$tariff->taxes)+((int)$tariff->fees) ; ?> USD											   
                                          @endif	
										@endforeach									
										
								</div>
								<div class="modal-footer">
								 <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
								</div>
							 </div>
						 </div>
						</div>                       						
						
				    <?php endforeach; ?>
				  </tbody>				 
			   </table>
				<div class="modal fade" id="req" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">	
						 <div class="modal-dialog">
							 <div class="modal-content">
							   <div class="modal-header">
								 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								 							 
							   </div>								
								<div class="modal-body">
                            {!! Form::open(['route' => 'bookings.store']) !!}								
								      <!-- Nombre Field -->
											<div class="form-group col-sm-6">
												{!! Form::label('nombre', 'Nombre:') !!}
												{!! Form::text('nombre', null, ['class' => 'form-control']) !!}
											</div>

											<!-- Email Field -->
											<div class="form-group col-sm-6">
												{!! Form::label('email', 'Email:') !!}
												{!! Form::text('email', null, ['class' => 'form-control']) !!}
											</div>

											<!-- Card Number Field -->
											<div class="form-group col-sm-6">
												{!! Form::label('card_number', 'Card Number:') !!}
												{!! Form::text('card_number', null, ['class' => 'form-control']) !!}
											</div>

											<!-- Expiration Date Field -->
											<div class="form-group col-sm-6">
												{!! Form::label('expiration_date', 'Expiration Date:') !!}
												{!! Form::date('expiration_date', null, ['class' => 'form-control']) !!}
											</div>

											<!-- Cvcode Field -->
											<div class="form-group col-sm-6">
												{!! Form::label('cvCode', 'Cvcode:') !!}
												{!! Form::text('cvCode', null, ['class' => 'form-control']) !!}
											</div>

											<!-- Hotel Id Field -->
											<div class="form-group col-sm-6">
												{!! Form::label('hotel_id', 'Hotel Id:') !!}
												{!! Form::text('hotel_id', null, ['class' => 'form-control']) !!}
											</div>   
											<!-- Submit Field -->
											<div class="form-group col-sm-12">
												 
												 {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                                 <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
											</div>		
                                        {!! Form::close() !!}											
								</div>
								<div class="modal-footer">
								
								</div>
							 </div>
						 </div>
						</div>
			</div>
			<a href="{!! route('hotels.index') !!}" class="btn btn-default">Back</a>
		</div>
			
@if (Auth::guest())				
	      </div>
        </div>         
    </div>
</div>
@endif
@endsection
