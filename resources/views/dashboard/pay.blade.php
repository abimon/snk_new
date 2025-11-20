@extends('layouts.app',['title'=>'Payment'])
@section('content')
<div class="container pt-5 mt-5">
    <iframe src="{{$redirect_url}}" frameborder="0" class="container w-full h-full" style="height: 100vh;"></iframe>
</div>
@endsection