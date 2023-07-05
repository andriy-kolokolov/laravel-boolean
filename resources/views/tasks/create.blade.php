@extends('layouts.base')

@section('contents')
    <h1>Add new Todo:</h1>

    <a class="btn btn-primary" href="{{ route('tasks.index') }}">View</a>


    <form class="mt-4" method="POST" action="{{ route('tasks.store') }}">
        @csrf

        <div class="mb-4">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                value="{{ old('title') }}">
            <div class="invalid-feedback">
                @error('title')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="details" class="form-label">Details</label>
            <textarea class="form-control @error('details') is-invalid @enderror" id="details" rows="3" name="details">{{ old('details') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="image" class="form-label">Image</label>
            <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image"
                value="{{ old('image') }}">
            <div class="invalid-feedback">
                @error('image')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="creation_date" class="form-label">Creation Date</label>
            <input type="date" class="form-control @error('creation_date') is-invalid @enderror" id="creation_date"
                name="creation_date" value="{{ old('creation_date') }}">
            <div class="invalid-feedback">
                @error('creation_date')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="expire_date" class="form-label">Expire Date</label>
            <input type="date" class="form-control @error('expire_date') is-invalid @enderror" id="expire_date"
                name="expire_date" value="{{ old('expire_date') }}">
            <div class="invalid-feedback">
                @error('expire_date')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="done" class="form-check-label">Done</label>
            <input type="hidden" name="done" value="0">
            <input type="checkbox" class="form-check-input @error('done') is-invalid @enderror" id="done"
                name="done" value="1" {{ old('done') ? 'checked' : '' }}>
            <div class="invalid-feedback">
                @error('done')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="urgent" class="form-check-label">Urgent</label>
            <input type="hidden" name="urgent" value="0">
            <input type="checkbox" class="form-check-input @error('urgent') is-invalid @enderror" id="urgent"
                name="urgent" value="1" {{ old('urgent') ? 'checked' : '' }}>
            <div class="invalid-feedback">
                @error('urgent')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <a class="btn btn-secondary" href="/tasks">Back</a>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
