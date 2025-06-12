<div class="container">
    <h2>Edit group</h2>
    <form action="{{ route('groups.update', $group->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control" name="name" value="{{old("name", $group["name"])}}">
            @error("name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="level" class="form-label">level</label>
            <input type="text" class="form-control" name="level" value="{{old("level", $group["level"])}}">
            @error("level")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>