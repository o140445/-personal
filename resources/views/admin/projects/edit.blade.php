@extends('layouts.admin')

@section('content')
    @include('admin.projects._form', ['project' => $project])
@endsection