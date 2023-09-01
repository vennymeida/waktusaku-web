@extends('landing-page.app')

@section('main')
    <section>
        <div class="col-md-10 mx-auto my-5 bg-white px-5 py-5 card-contact" style="border-radius: 15px;">
            <h2 class="section-title">Please Verify Your Email</h2>
            <div>{{ __('Verify Your Email Address') }}</div>
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            {{ __('Before proceeding, please check your email for a verification link.') }}
            <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit"
                    class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
            </form>
        </div>
    </section>
@endsection
