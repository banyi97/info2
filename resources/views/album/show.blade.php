@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <album-component :album="{{$album}}"></album-component>
    </div>
</div>
<br>
@endsection