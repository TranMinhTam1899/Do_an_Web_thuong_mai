@extends('client.layouts.master')

@section('title')
404
@endsection


@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="error-wrapper text-center ptb-50 pt-xs-20">
            <div class="error-text">
                <h1 class="text-primary">404</h1>
                <h2>Opps! PAGE NOT BE FOUND</h2>
                <p>Sorry but the page you are looking for does not exist, have been removed, <br> name changed or is
                    temporarity unavailable.</p>
            </div>

            <div class="error-button mb-60">
                <a href="index.html" class="bg-primary ">Back to home page</a>
            </div>
        </div>
    </div>
</div>
@endsection