@extends('components.layouts.app')
@section('content')
    <h1>Using Component</h1>
    <p>This is a page that uses a component.</p>

    <x-button type="primary" text="Save" />
    <x-button type="success" text="Update" />
    <x-button type="danger" text="Delete" />

@endsection