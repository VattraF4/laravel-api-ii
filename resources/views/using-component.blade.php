@extends('components.layouts.app')
@section('content')
    <x-card">
        <x-slot name="header">
            <h5>
                <i class="fa fa-info-circle"></i> 
                Hello From Slot Header
            </h5>
        </x-slot>
        <h1>Using Component</h1>
        <p>This is a page that uses a component.</p>

        <x-button type="primary" text="Save" />
        <x-button type="success" text="Update" />
        <x-button type="danger" text="Delete" />
    </x-card>
@endsection