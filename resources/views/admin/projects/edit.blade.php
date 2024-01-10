@extends('layouts.app')

@section('content')

<section class="py-5">
  <div class="container">
    <h1>Edit the Project</h1>
    <form action="{{ route('admin.projects.update', $project ) }}" method="POST" >
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="name" value="{{ old('name',$project->name) }}">
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" name="description" id="description" rows="3" placeholder="descrizione" ></textarea>
      </div>

      <div class="mb-3">
        <label for="type_id" class="form-label">project type</label>
        <select type="text" class="form-control" name="type_id" id="type_id" placeholder="project type">
          <option>select a project type</option>
            @foreach ($types as $type)
              <option @selected(old('type_id', optional($project->type)->id) == $type->id) value="{{$type->id}}">{{$type->name}}</option>
            @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="project_status" class="form-label">project status</label>
        <input type="text" class="form-control" name="project_status" id="project_status" placeholder="project status">
      </div>

      <div class="form-group mb-3">
        <p>Seleziona le tecnologie:</p>
        <div class="d-flex flex-wrap gap-4 ">
          @foreach ($technologies as $technology)
            <div class="form-check">
              <input name="technologies[]" class="form-check-input" type="checkbox" value="{{$technology->id}}" id="technology-{{$technology->id}}" @checked( in_array($technology->id, old('technologies',$project->technologies->pluck('id')->all()) ) ) >
              <label class="form-check-label" for="technology-{{$technology->id}}">
                {{ $technology->name }}
              </label>
            </div>
          @endforeach
        </div>
      </div>

      <div class="">
        <input type="submit" class="btn btn-primary" value="Edit">
      </div>
      
    </form>
  </div>
</section>

@endsection