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
<div class="card">

@if($tasks->count())
<table class="table">
  <thead>
<tr>
   <th scope="col">Id</th>
   <th scope="col">Name</th>
   <th scope="col">Created Date</th>
   <th scope="col">Delete</th>
</tr>
  </thead>
  <tbody>



  @foreach($tasks as $task)
    
   <tr>
    <td>{{$task->id}}</td>
    <td>{{$task->name}}</td>
    <td>{{$task->created_at->diffForHumans()}}</td>
    <td>
      <form action="{{route('tasks.destroy', $task->id)}}" method="post">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">Delete</button>

      </form>
    </td>
   </tr>
   @endforeach
  
  </tbody>
</table>

@else

<h1 class="text-center mt-2 mb-2">
  No Tasks Found
</h1>
@endif
</div>
</div>

@endsection
