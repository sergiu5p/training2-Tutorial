<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h1>Projects</h1>

    <ul>
        @foreach ($projects as $project)
            <a href="/projects/{{ $project->id }}">
                @if ($project->owner_id === auth()->id())
                    <li>{{ $project->title }}</li>
                @endif
            </a>
        @endforeach
    </ul>

</body>
</html>
