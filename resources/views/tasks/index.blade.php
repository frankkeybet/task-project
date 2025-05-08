@extends('layouts.app')

@section('content')

@if($errors->any())
   
  @foreach($errors->all() as $error)
  {{$error}}
   @endforeach
 
@endif
   <div class="row mb-3">
<div class="card">
  <div class="card-header">
  My Tasks 

  </div>
  <div class="card-body">

   <form action="{{route('tasks.store')}}" method="post">
    @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Task</label>
    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="nameInputFeedback">
   @error('name')
    <div id="nameInputFeedback" class="form-text invalid-feedback">
      {{$message}}
    </div>
    @enderror
  </div>
 
<div class="d-grid gap-2">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
 
</form>

  </div>
  </div>
</div>


<div class="row">
<x-tasks.index :tasks="$tasks">

</x-tasks.index>
</div>

@endsection
