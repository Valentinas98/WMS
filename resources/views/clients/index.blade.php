@extends('layouts.main')


<x-app-layout>
    <div class="card text-center" style="width: auto">

        <h1 class="h2 pt-3 sm-white">

            {{ __('Klientai') }}

        </h1>
    </div>

    <div class="container">
        <table class="table table-striped table-hover">
            <tr>
                <th>ID</th>
                <th>Kliento vardas</th>
                <th>Kliento telefonas</th>
                <th>Kliento El. Paštas</th>
                <th>Kliento juridnis kodas</th>
                <th>Kliento PVM kodas</th>
                <th>Kliento adresas</th>
                <th>Veiksmai</th>
            </tr>

            <tbody>
            @forelse($clients as $client)

                <tr>
                    <td>{{$client->client_id}}</td>
                    <td>{{$client->client_name}}</td>
                    <td>{{$client->client_phone_number}}</td>
                    <td>{{$client->client_email}}</td>
                    <td>{{$client->client_code}}</td>
                    <td>{{$client->client_VAT_code}}</td>
                    <td>{{$client->client_address}}</td>
                    <td><a href="/clients/{{ $client->client_id }}" class="btn btn-outline-primary" >Redaguoti</a></td>

                    <form action="{{ route('clients.destroy', $client->client_id)}}" method="post">
                        @method('DELETE')
                        @csrf
                        <td>
                            <button class="btn btn-outline-danger" type="submit">Ištrinti</button>
                        </td>
                    </form>

                </tr>
            @empty
                <p>Klientų nėra</p>
            @endforelse
            </tbody>
        </table>



        {{--        <form action="{{ route('clients.find') }}" method="GET">--}}

        {{--            <button type="submit">Find client</button>--}}
        {{--        </form>--}}


    </div>
    <div class="container">
        <a href="/clients/create" class="btn btn-outline-success" >Pridėti naują klientą</a>
    </div>
</x-app-layout>


