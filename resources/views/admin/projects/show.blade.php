@extends('layouts.app')

@section('content')
    <section>
      <div class="container">
        <div class="card mt-5" style="width: 400px;">
          <a href="{{ route('admin.projects.edit',$project) }}">
            <button class="btn btn-primary" style="width: 70px;">Edit</button>
          </a>
          <form class="pt-2" action="{{ route('admin.projects.destroy', $project) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
            <div class="card-body">
              <h5 class="card-title"><strong>Project Name:</strong> {{$project->name}}</h5>
              <p class="card-text"><strong>Project Description:</strong> {{$project->description}}</p>
              @if ($project->type)
                <p class="card-text"><strong>Project Type: </strong>
                  {{$project->type->name}}
                </p>
              @endif
              <ul class="d-flex gap-2">
                @foreach ($project->technologies as $technology)
                  <li class="badge rounded-pill text-bg-primary">{{$technology->name}}</li>                    
                @endforeach
              </ul>
              <p><strong>GitHub Link:</strong></p>
              <a href="#" class="card-link">{{$project->link}}</a>
              
            </div>
        </div>
      </div>
    </section>
@endsection