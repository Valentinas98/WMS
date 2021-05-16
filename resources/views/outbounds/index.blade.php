@extends('layouts.main')
<x-app-layout>
    <div class="card text-center" style="width: auto">

        <h1 class="h2 pt-3 sm-white">

            {{ __('Sandėlio išvežimai') }}

        </h1>
    </div>


<div class="container">
    <table class="table table-striped table-hover">
        <tr>
            <th>ID</th>
            <th>Išvežimo data</th>
            <th>Išvežimo eilės numeris</th>
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
        @forelse($outbounds as $outbound)
            <tr>
                <td>{{$outbound->id}}</td>
                <td>{{$outbound->outbound_date}}</td>
                <td>{{$outbound->outbound_number}}</td>
                <td>{{$outbound->cargo_manifest_number}}</td>
                <td>{{$outbound->product_number}}</td>
                <td>{{$outbound->product_name}}</td>
                <td>{{$outbound->product_quantity}}</td>
                <td>{{$outbound->product_sn}}</td>
                <td>{{$outbound->carrier_license_plate}}</td>
                <td>{{$outbound->carrier_person}}</td>
                <td>{{$outbound->loaded_by}}</td>
                <td>{{$outbound->warehouse_id}}</td>
                <td>{{$outbound->created_at}}</td>
                <td>{{$outbound->info_note}}</td>
                <td><a href="/outbounds/{{ $outbound->id }}" class="btn btn-outline-primary" >Redaguoti</a></td>

                <form action="{{ route('outbounds.destroy', $outbound->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <td><button class="btn btn-outline-danger" type="submit">Ištrinti</button></td>
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
{{--    <div class="container">--}}
{{--        <a href="/stocks" class="btn btn-outline-success" >Pridėti naują išvežimą</a>--}}
{{--    </div>--}}

</x-app-layout>
