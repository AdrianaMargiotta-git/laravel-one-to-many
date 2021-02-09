<header>
    HEADER
    <a href="{{route('home')}}">Task list</a> -- 
    <a href="{{route('typologies-index')}}">Task type list</a> -- 
    <a href="{{route('employees-index')}}">List of employees</a> -- 
    <a href="{{route('typologies-create')}}">Insert a new type of task</a>

    <br><br>

    @if ($errors -> any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors -> all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

</header>