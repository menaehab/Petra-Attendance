<div class="container">
    <h2>Edit student</h2>
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control" name="name" value="{{old("name", $student["name"])}}">
            @error("name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="phone" class="form-label">phone</label>
            <input type="text" class="form-control" name="phone" value="{{old("phone", $student["phone"])}}">
            @error("phone")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="code" class="form-label">code</label>
            <input type="text" class="form-control" name="code" value="{{old("code", $student["code"])}}">
            @error("code")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="group_id" class="form-label">group_id</label>
            <input type="text" class="form-control" name="group_id" value="{{old("group_id", $student["group_id"])}}">
            @error("group_id")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>