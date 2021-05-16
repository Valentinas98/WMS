@extends('layouts.main')

<x-app-layout>
    <div class="card text-center" style="width: auto">

        <h1 class="h2 pt-3 sm-white">

            {{ __('Redaguoti kliento duomenis') }}

        </h1>
    </div>

    <style>
        .center_form {
            margin: 0 auto;
            width: 25% /* value of your choice which suits your alignment */
        }

        .btn {
            height: 36px;
            width: 350px;
            padding: 10px 12px;
        }

        .tarpas{
            padding-bottom: 15px;
        }

        .text{
            min-width: 350px;
        }

    </style>

    <div class="container">


        <form action="/clients/{{ $clients->client_id }}" method="post" class="center_form" >

            @method('PATCH')

            <div class="form-group">
                <label for="client_name">Kliento vardas</label>
                <input class="text" type="text" name="client_name" autocomplete="off" value="{{ $clients->client_name }}">
                @error('client_name') <p style="color: red;">{{'Neįvestas kliento vardas.'}}</p> @enderror
            </div>

            <div class="form-group">
                <label for="client_phone_number">Kliento telefono numeris</label>
                <input class="text" type="text" name="client_phone_number" autocomplete="off" value="{{ $clients->client_phone_number }}">
                @error('client_phone_number') <p style="color: red;">{{'Neįvestas kliento telefono numeris.'}}</p> @enderror
            </div>

            <div class="form-group">
                <label for="client_email">Kliento el. paštas</label>
                <input class="text" type="text" name="client_email" autocomplete="off" value="{{ $clients->client_email }}">
                @error('client_email') <p style="color: red;">{{'Neįvestas, arba blogai įvestas kliento el. paštas.'}}</p> @enderror
            </div>

            <div class="form-group">
                <label for="client_code">Kliento / Įmonės kodas</label>
                <input class="text" type="text" name="client_code" autocomplete="off" value="{{ $clients->client_code }}">
                @error('client_code') <p style="color: red;">{{'Neįvestas kliento / įmonės kodas.'}}</p> @enderror
            </div>

            <div class="form-group">
                <label for="client_VAT_code">PVM mokėtojo kodas</label>
                <input class="text" type="text" name="client_VAT_code" autocomplete="off" value="{{ $clients->client_VAT_code }}">
                @error('client_VAT_code') <p style="color: red;">{{'Neįvestas PVM mokėtojo kodas.'}}</p> @enderror
            </div>

            <div class="form-group">
                <label for="client_address">Adresas</label>
                <input class="text" type="text" name="client_address" autocomplete="off" value="{{ $clients->client_address }}">
                @error('client_address') <p style="color: red;">{{'Neįvestas kliento adresas.'}}</p> @enderror
            </div>

            @csrf

            <div class="tarpas">
                <button class="btn btn-outline-success">Redaguoti kliento duomenis</button>
            </div>

            <div>
                <a href="/clients" class="btn btn-outline-danger">Grįžti</a>
            </div>
        </form>

    </div>

</x-app-layout>
