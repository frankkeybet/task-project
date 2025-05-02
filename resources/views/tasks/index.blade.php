@extends('layouts.app')

@section('content')

@if($errors->any())
   
  @foreach($error->all() as $error)
  {{$error}}
   @endforeach
 
@endif
   
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
    <div id="nameInputFeedbac" class="form-text invalid-feedback">
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


@endsection
