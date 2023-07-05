@extends('layouts.base')

@section('contents')
    <a class="btn btn-primary mt-4" href="{{ route('tasks.index') }}">Back</a>

    <form class="mt-4" method="POST" action="{{ route('tasks.update', ['task' => $task->id]) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                value="{{ old('title', $task->title) }}">
            <div class="invalid-feedback">
                @error('title')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="details" class="form-label">Details</label>
            <textarea class="form-control @error('details') is-invalid @enderror" id="details" rows="3" name="details">{{ old('details', $task->details) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="image" class="form-label">Image</label>
            <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image"
                value="{{ old('image', $task->image) }}">
            <div class="invalid-feedback">
                @error('image')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="creation_date" class="form-label">Creation Date</label>
            <input type="date" class="form-control @error('creation_date') is-invalid @enderror" id="creation_date"
                name="creation_date" value="{{ old('creation_date', $task->creation_date) }}">
            <div class="invalid-feedback">
                @error('creation_date')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="expire_date" class="form-label">Expire Date</label>
            <input type="date" class="form-control @error('expire_date') is-invalid @enderror" id="expire_date"
                name="expire_date" value="{{ old('expire_date', $task->expire_date) }}">
            <div class="invalid-feedback">
                @error('expire_date')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="done" class="form-label">Done</label>
            <input type="hidden" name="done" value="0">
            <input type="checkbox" class="form-check-input @error('done') is-invalid @enderror" id="done"
                name="done" value="1" @checked(old('done', $task->done))>
            <div class="invalid-feedback">
                @error('done')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="urgent" class="form-label">Urgent</label>
            <input type="hidden" name="urgent" value="0">
            <input type="checkbox" class="form-check-input @error('urgent') is-invalid @enderror" id="urgent"
                name="urgent" value="1" @checked(old('urgent', $task->urgent))>
            <div class="invalid-feedback">
                @error('urgent')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
