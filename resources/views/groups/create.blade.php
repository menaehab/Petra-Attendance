<div class="container">
    <h2>Create groups</h2>
    <form action="{{ route('groups.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control" name="name" value="{{old("name")}}">
            @error("name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="level" class="form-label">level</label>
            <input type="text" class="form-control" name="level" value="{{old("level")}}">
            @error("level")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>