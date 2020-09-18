<x-app-layout>
    <section class="d-md-flex justify-content-md-center" style="margin-top: 20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h2>{{__('Contact List')}}</h2>
                </div>
                <div class="col-md-3 col-lg-3"><button class="btn btn-dark" type="button">{{__('Add new')}}</button></div>
            </div>
            <div class="row mt-1">
                @csrf
                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Telephone')}}</th>
                                <th>{{__('Email')}}</th>
                                <th>{{__('Actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $contact)
                            <tr>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->telephone}}</td>
                                <td>{{$contact->email}}</td>
                                <td>
                                    <div role="group" class="btn-group">
                                        <button class="btn btn-outline-dark" type="button">{{__('Visualize')}}</button>
                                        <button class="btn btn-outline-dark" type="button">{{__('Edit')}}</button>
                                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-dark" type="submit">{{__('Delete')}}</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
