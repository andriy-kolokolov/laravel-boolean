@extends('layouts.base')

@section('contents')
	{{-- Messaggio di conferma modifica --}}
	@if (session('update_success'))
		<div class="alert alert-success">
			{{ session('update_success') }}
		</div>
	@endif

	<div class="show">

		<div class="image">
			<img src="{{ $task->image }}" alt="{{ $task->title }}">
		</div>

		<div class="info">
			<ul class="list-group" style="margin-bottom: 2em;">
				<li class="list-group-item"><span>Title:</span> {{ $task->title }}</li>
				<li class="list-group-item"><span>Details:</span> {!! $task->details !!}</li>
				<li class="list-group-item"><span>Creation Date:</span> {{ $task->creation_date }}</li>
				<li class="list-group-item"><span>Expire Date:</span> {{ $task->expire_date }}</li>
				<li class="list-group-item"><span>Done:</span> {{ $task->done ? '✅' : '❌'}}</li>
				<li class="list-group-item"><span>Urgent:</span> {{ $task->urgent ? '✅' : '❌'}}</li>
			</ul>

			<a class="btn btn-secondary" href="/tasks">Back</a>
		</div>

	</div>
@endsection
