<x-app-layout>
    <section class="d-md-flex justify-content-md-center" style="margin-top: 20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2>{{__('Contact Info')}}</h2>
                </div>
                <div class="col-md-3"><button class="btn btn-dark" type="button">{{__('Edit')}}</button></div>
            </div>
            <div class="row mt-1 ml-1">
                <span><b>{{__('Name')}}: </b>{{$contact->name}}</span>
            </div>
            <div class="row mt-1 ml-1">
                <span><b>{{__('Telephone')}}: </b>{{$contact->telephone}}</span>
            </div>
            <div class="row mt-1 ml-1">
                <span><b>{{__('Email')}}: </b>{{$contact->email}}</span>
            </div>
            <div class="row mt-1 ml-1">
                <span><b>{{__('City')}}: </b>{{$contact->city}}</span>
            </div>
            <div class="row mt-1 ml-1">
                <span><b>{{__('State')}}: </b>{{$contact->state}}</span>
            </div>
            <div class="row mt-1 ml-1">
                <span><b>{{__('Category')}}: </b>{{$contact->category}}</span>
            </div>
        </div>
    </section>
</x-app-layout>
