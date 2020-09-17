<x-guest-layout>
    <div class="card text-primary bg-light">
        <div class="card-body align-items-center">
            <h2 class="text-center card-title">{{__('Login')}}</h2>

            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <input class="form-control" type="name" name="name" placeholder="{{__('Name')}}" required autofocus>
                </div>

                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="{{__('Email')}}" required>
                </div>

                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="{{__('Password')}}"
                           required autocomplete="new-password">
                </div>

                <div class="form-group">
                    <input class="form-control" type="password" name="password_confirmation" placeholder="{{ __('Confirm Password') }}"
                           required autocomplete="new-password">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">{{__('Login')}}</button>
                </div>
            </form>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Login') }}
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
