@extends('layouts.base')

@section('contents')
	{{-- Messaggio di conferma cancellazione --}}
	@if (session('delete_success'))
		@php $task = session('delete_success') @endphp
		<div class="alert alert-danger">
			Il Todo "{{ $task->title }}" è stato eliminato
		</div>
	@endif

    @if (session('update_success'))
        <div class="alert alert-success">
            {{ session('update_success') }}
        </div>
    @endif

	<div class="d-flex justify-content-center mt-5">
		<table class="table table-bordered table-secondary table-striped table-hover table-rounded">
			<thead>
				<tr class="thead-dark">
					<th>Title</th>
					<th>Details</th>
					<th>Creation Date</th>
					<th>Expire Date</th>
					<th>Actions</th>
					<th>Completed</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($tasks as $task)
					<tr>
						<td class="fw-bold fs-5">{{ $task->title }}</td>
						<td class="fs-5">{{ $task->details }}</td>
						<td>{{ $task->creation_date }}</td>
						<td>{{ $task->expire_date }}</td>
						<td >
							<a href="{{ route('tasks.show', ['task' => $task->id]) }}" class="btn btn-success btn-sm fs-5">View</a>
							<a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class="btn btn-primary btn-sm fs-5">Edit</a>
							<form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST" class="d-inline">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-danger btn-sm fs-5">Delete</button>
							</form>
						</td>
						<td class="">
							<div class="pt-2 pb-2">

								<form method="POST" action="{{ route('tasks.toggle_done', ['task' => $task->id]) }}">
									@csrf
									<input type="hidden" name="done" value="0">
                                    <div class="d-flex justify-content-center">
                                        <label for="done" class="form-label fw-bold">Done</label>
                                        <input type="checkbox" class="ms-3 form-check-input @error('done') is-invalid @enderror" id="done"
                                               name="done" value="1" @if (old('done', $task->done)) checked @endif>
                                    </div>
									<div class="invalid-feedback">
										@error('done')
											{{ $message }}
										@enderror
									</div>
									<button type="submit" class="btn btn-warning">Update</button>
								</form>
							</div>

						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection
