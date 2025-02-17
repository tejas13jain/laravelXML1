@extends('layouts.app')

@section('content')
<a href="{{ route('contacts.index') }}" class="btn btn-secondary mb-3">Back</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-danger">{{ implode('', $errors->all(':message')) }}</div>
@endif

<form action="{{ route('contacts.import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Upload XML File</label>
        <input type="file" name="xml_file" class="form-control" accept=".xml" required>
    </div>
    <button type="submit" class="btn btn-success">Import</button>
</form>
@endsection
