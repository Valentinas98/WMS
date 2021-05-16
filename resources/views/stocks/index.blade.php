@extends('layouts.main')


<x-app-layout>
    <div class="card text-center" style="width: auto">

        <h1 class="h2 pt-3 sm-white">

            {{ __('Sandėlio likučiai') }}

        </h1>
    </div>

    <div class="container">
        <table class="table table-striped table-hover">
            <tr>
{{--                <th>ID</th>--}}
                <th>Produkto numeris</th>
                <th>Produkto pavadinimas</th>
                <th>Produkto serijos numeris</th>
                <th>Produkto kiekis</th>
                <th>Veiksmas</th>
            </tr>

            <tbody>
            @forelse($stocks as $stock)

                <tr>
{{--                    <td>{{$stock->id}}</td>--}}
                    <td>{{$stock->product_number}}</td>
                    <td>{{$stock->product_name}}</td>
                    <td>{{$stock->product_sn}}</td>
                    <td>{{$stock->product_quantity}}</td>
                    <td><a href="/outbounds/create/{{ $stock->id }}" class="btn btn-outline-primary">Išvežti</a></td>

                </tr>

            @empty
                <p>Nėra jokių produktų</p>
            @endforelse
            </tbody>
        </table>


    </div>
</x-app-layout>

