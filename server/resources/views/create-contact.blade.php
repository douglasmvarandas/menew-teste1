<x-app-layout>
    <section class="d-md-flex justify-content-md-center" style="margin-top: 20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2>{{__('Create Contact')}}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method='post' action="{{url('contacts')}}">
                        @csrf
                        <div class="form-group">
                            <input class="form-control" type="text" name="name" placeholder="{{__('Name')}}" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="email" placeholder="{{__('Email')}}" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="telephone" placeholder="{{__('Telephone')}}" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="city" placeholder="{{__('City')}}" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="state" placeholder="{{__('State')}}" required>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="category">
                                <option value="Cliente" selected="">Cliente</option>
                                <option value="Fornecedor">Fornecedor</option>
                                <option value="Funcionário">Funcionário</option>
                            </select>
                        </div>
                        <button class="btn btn-dark btn-block" type="submit">{{__('Create')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
