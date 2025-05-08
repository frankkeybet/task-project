
<form action="{{route($modelRoute, $modelId)}}" method="post">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">Delete</button>

      </form>