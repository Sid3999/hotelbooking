@extends('layouts.theme')
@section('content')
@include('include.navbar')


<br>   

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
@include('include.footer')
@endsection
