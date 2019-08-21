@extends('layout')

@section('content')
    <h1 class="title">Edit Project</h1>

    <form method="POST" action="/projects" style="margin-bottom: 1em">
        @csrf

        <div class="field">
            <label for="title" class="label">Project Title</label>

            <div class="control">
                <input
                    type="text"
                    class="input
                    {{ $errors->has('title') ? 'is-danger' : '' }}"
                    name="title"
                    value="{{ old('title') }}"
                    required
                >
            </div>
        </div>

        <div class="field">
            <label for="description" class="label">Project Description</label>

            <div class="control">
                <textarea
                    name="description"
                    class="textarea
                    {{ $errors->has('description') ? 'is-danger' : '' }}"
                    required>
                        {{ old('description') }}
                </textarea>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Update Project</button>
            </div>
        </div>

        @include('errors')
    </form>
@endsection()
