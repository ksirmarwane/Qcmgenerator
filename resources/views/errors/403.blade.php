@extends('layouts.app')

@section('content')
<div class="container py-4" style="background-color: #fff;">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <p>Oops! That page can&rsquo;t be found.</p> 
            <p>
            It looks like nothing was found at this location. Maybe try one of the links below or a search</p>
            <a href="{{ url('/home') }}">retour</a>
        </div>
    </div>
    
</div>
@endsection
