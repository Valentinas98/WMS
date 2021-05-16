@extends('layouts.main')

<x-app-layout>
    <div class="card text-center" style="width: auto">

        <h1 class="h2 pt-3 sm-white">

            {{ __('Redaguoti įvežimo duomenis') }}

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

<form action="/inbounds/{{ $inbounds->id }}" method="post" class="center_form" >

    @method('PATCH')


    <div class="form-group">
        <label for="inbound_date">Priėmimo Data</label>
        <input class="text" type="date" name="inbound_date" autocomplete="off" value="{{ $inbounds->inbound_date }}">
        @error('inbound_date') <p style="color: red;">{{'Data nepasirinkta.'}}</p> @enderror
    </div>

    <div class="form-group">
        <label for="inbound_number">Priėmimo numeris</label>
        <input class="text" type="text" name="inbound_number" autocomplete="off" value="{{ $inbounds->inbound_number }}">
        @error('inbound_number') <p style="color: red;">{{'Neįvestas priėmimo numeris.'}}</p> @enderror
    </div>

    <div class="form-group">
        <label for="cargo_manifest_number">Važtaraščio numeris</label>
        <input class="text" type="text" name="cargo_manifest_number" autocomplete="off" value="{{ $inbounds->cargo_manifest_number }}">
        @error('cargo_manifest_number') <p style="color: red;">{{'Neįvestas važtaraščio numeris.'}}</p> @enderror
    </div>

    <div class="form-group">
        <label for="product_number">Prekės numeris</label>
        <input class="text" type="text" name="product_number" readonly autocomplete="off" value="{{ $inbounds->product_number }}">
        @error('product_number') <p style="color: red;">{{'Neįvestas prekės numeris.'}}</p> @enderror
    </div>

    <div class="form-group">
        <label for="product_name">Prekės pavadinimas</label>
        <input class="text" type="text" name="product_name" autocomplete="off" value="{{ $inbounds->product_name }}">
        @error('product_name') <p style="color: red;">{{'Neįvestas prekės pavadinimas.'}}</p> @enderror
    </div>

    <div class="form-group">
        <label for="product_quantity">Palečių kiekis</label>
        <input class="text" type="text" name="product_quantity" readonly autocomplete="off" value="{{ $inbounds->product_quantity }}">
        @error('product_quantity') <p style="color: red;">{{'Neįvestas, arba neteisingai įvestas palečių kiekis.'}}</p> @enderror
    </div>

    <div class="form-group">
        <label for="product_sn">Serijos numeris</label>
        <input class="text" type="text" name="product_sn" readonly autocomplete="off" value="{{ $inbounds->product_sn }}">
        @error('product_sn') <p style="color: red;">{{'Neįvestas serijos numeris.'}}</p> @enderror
    </div>

    <div class="form-group">
        <label for="carrier_license_plate">Vilkiko valstybinis numeris</label>
        <input class="text" type="text" name="carrier_license_plate" autocomplete="off" value="{{ $inbounds->carrier_license_plate }}">
        @error('carrier_license_plate') <p style="color: red;">{{'Neįvestas vilkiko valstybinis numeris.'}}</p> @enderror
    </div>

    <div class="form-group">
        <label for="carrier_person">Vilkiko vairuotojo vardas</label>
        <input class="text" type="text" name="carrier_person" autocomplete="off" value="{{ $inbounds->carrier_person }}">
        @error('carrier_person') <p style="color: red;">{{'Neįvestas vilkiko vairuotojo vardas.'}}</p> @enderror
    </div>

    <div class="form-group">
        <label for="loaded_by">Sandėlio darbuotojo vardas</label>
        <input class="text" type="text" name="loaded_by" autocomplete="off" value="{{ $inbounds->loaded_by }}">
        @error('loaded_by') <p style="color: red;">{{'Neįvestas sandėlio darbuotojo vardas.'}}</p> @enderror
    </div>

    <div class="form-group">
        <label for="warehouse_id">Sandėlio ID</label>
        <input class="text" type="text" name="warehouse_id" autocomplete="off" value="{{ $inbounds->warehouse_id }}">
        @error('warehouse_id') <p style="color: red;">{{'Neįvestas sandėlio ID (1).'}}</p> @enderror
    </div>

    <div class="form-group">
        <label for="info_note">Papildoma Informacija</label>
        <input class="text" type="text" name="info_note" autocomplete="off" value="{{ $inbounds->info_note }}">
{{--        @error('info_note') <p style="color: red;">{{$message}}</p> @enderror--}}
    </div>

    @csrf

    <div class="tarpas">
        <button class="btn btn-outline-success">Redaguoti įvežimo duomenis</button>
    </div>
    <div>
    <a href="/inbounds" class="btn btn-outline-danger" >Grįžti</a>
    </div>

</form>
    </div>

</x-app-layout>
