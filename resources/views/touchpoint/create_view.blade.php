@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Create</h1>
        </div>
        <div class="row">
            <form action="/touchpoint/create" method="post" class="col">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Please fix the following errors
                    </div>
                @endif
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" placeholder="Subject" value="{{ old('subject') }}">
                    @error('subject')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea style="height: 400px;" class="form-control @error('content') is-invalid @enderror" id="content" name="content" placeholder="content">{{ old('content') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
