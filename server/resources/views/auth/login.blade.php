<x-guest-layout>
    <div class="card text-primary bg-light">
        <div class="card-body align-items-center">
            <h2 class="text-center card-title">{{__('Login')}}</h2>

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="{{__('Email')}}" required autofocus>
                </div>

                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="{{__('Password')}}"
                           required autocomplete="current-password">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">{{__('Login')}}</button>
                </div>
            </form>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                    {{ __('Register') }}
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
