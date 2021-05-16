@extends('layouts.main')


<x-app-layout>
    <div class="card text-center" style="width: auto">

        <h1 class="h2 pt-3 sm-white">

            {{ __('Sandėlio įvežimai') }}

        </h1>
    </div>


<div class="container">
    <table class="table table-striped table-hover">
        <tr>
            <th>ID</th>
            <th>Priėmimo data</th>
            <th>Priėmimo eilės numeris</th>
            <th>Važtaraščio numeris</th>
            <th>Prekės numeris</th>
            <th>Prekės pavadinimas</th>
            <th>Palečių kiekis</th>
            <th>Serijos numeris</th>
            <th>Vilkiko valstybinis numeris</th>
            <th>Vilkiko vairuotojo vardas</th>
            <th>Sandėlio darbuotojo vardas</th>
            <th>Sandėlio ID</th>
            <th>Įrašo sukūrimo data</th>
            <th>Papildoma Informacija</th>
            <th>Veiksmai</th>
        </tr>

        <tbody>
        @forelse($inbounds as $inbound)
            <tr>
                <td>{{$inbound->id}}</td>
                <td>{{$inbound->inbound_date}}</td>
                <td>{{$inbound->inbound_number}}</td>
                <td>{{$inbound->cargo_manifest_number}}</td>
                <td>{{$inbound->product_number}}</td>
                <td>{{$inbound->product_name}}</td>
                <td>{{$inbound->product_quantity}}</td>
                <td>{{$inbound->product_sn}}</td>
                <td>{{$inbound->carrier_license_plate}}</td>
                <td>{{$inbound->carrier_person}}</td>
                <td>{{$inbound->loaded_by}}</td>
                <td>{{$inbound->warehouse_id}}</td>
                <td>{{$inbound->created_at}}</td>
                <td>{{$inbound->info_note}}</td>
                <td><a href="/inbounds/{{ $inbound->id }}" class="btn btn-outline-primary" >Redaguoti</a></td>

                <form action="{{ route('inbounds.destroy', $inbound->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <td>
                        <button class="btn btn-outline-danger" type="submit">Ištrinti</button>
                    </td>
                </form>

            </tr>
        @empty
            <p>Nėra jokių įrašų</p>
        @endforelse
        </tbody>
    </table>



{{--    <div class="container">--}}

{{--        <form action="{{ route('clients.find') }}" method="GET">--}}

{{--            <button type="submit">Ieškoti įrašų</button>--}}
{{--        </form>--}}
{{--    </div>--}}

</div>
    <div class="container">
        <a href="/inbounds/create" class="btn btn-outline-success" >Sukurti naują įvežimą</a>
    </div>

</x-app-layout>
