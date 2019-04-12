@extends('layouts.app')

@section('content')

<div class="card">
  <h3 class="card-header">
    Редактировать задачу
  </h3>
      @if ($errors->any())
        @foreach ($errors->all() as $error)
            @component('components.error', [
                'message' => $error,
            ])

            @endcomponent
        @endforeach
    @endif
  <div class="card-body">
    <form action="{{ route('tasks.update', $task->id) }}" method="post">
      @csrf
      @method('put')

      @include('task.partials.form')
    </form>
  </div>
</div>

@endsection
