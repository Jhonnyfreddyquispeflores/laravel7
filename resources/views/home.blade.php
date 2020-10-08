@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bienvenidos') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('post.index') }}" class="btn btn-primary">Módulo POSTS</a>
<!--                    <br>
                    <a href="{{ url('site-register') }}">{{ __('RECAPTCHA') }}</a>-->
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
