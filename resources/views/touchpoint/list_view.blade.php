@extends('layouts.app')
@section('content')
    <link href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" rel="stylesheet">
    <div class="container">
        <div class="row">
            <h1>Touchpoint overview</h1>
        </div>
        <div class="row py-4">
            <a href="create" class="btn btn-primary">New <i class="fas fa-sparkles"></i></a>
        </div>
        <div class="row">
            <div class="col">
                <table>
                    <tr>
                        <th scope="col">Subject</th>
                        <th scope="col">Actions</th>
                    </tr>
                    @foreach ($touchpoints as $touchpoint)
                    <tr>
                        <td>{{ $touchpoint->subject }}</td>
                        <td>
                            <base href="touchpoint/"/>
                            <a href="{{$touchpoint->id}}" class="btn btn-primary"><i class="far fa-eye"></i></a>
                            <a href="{{$touchpoint->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
