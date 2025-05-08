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
     <x-tasks.delete-model modelRoute="tasks.destroy" :modelId="$task->id"></x-delete-model>
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