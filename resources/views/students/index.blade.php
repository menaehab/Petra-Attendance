<div class="container">
    <h2>students List</h2>
    <a href="{{ route('students.create') }}" class="mb-3 btn btn-primary">Create students</a>
    <form action="{{ route('students.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <button type="submit" class="btn btn-primary">Import</button>
    </form>
    @if (session('failures'))
        @foreach (session('failures') as $failure)
            <div>
                <p>{{ $failure->row() }}</p>
                <p>{{ $failure->attribute() }}</p>
                <p>
                <ul>
                    @foreach ($failure->errors() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </p>

            </div>
        @endforeach
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>name</th>
                <th>phone</th>
                <th>code</th>
                <th>group_id</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->code }}</td>
                    <td>{{ $item->group_id }}</td>
                    <td>
                        <a href="{{ route('students.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('students.destroy', $item->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
