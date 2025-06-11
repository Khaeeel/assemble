@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Add New Patient Record</h2>

    <form method="POST" action="{{ route('health.records.store') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Patient Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" id="age" name="age" value="{{ old('age') }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
        </div>

        <div class="mb-3">
            <label for="visit_purpose" class="form-label">Visit Purpose</label>
            <input type="text" class="form-control" id="visit_purpose" name="visit_purpose" value="{{ old('visit_purpose') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('health.records') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif