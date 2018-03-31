@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Search
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($search, ['route' => ['searches.update', $search->id], 'method' => 'patch']) !!}

                        @include('searches.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection