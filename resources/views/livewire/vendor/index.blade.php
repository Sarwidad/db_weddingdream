<div>
    <a href="{{ route('vendor.create') }}" class="btn btn-md btn-success mb-3">TAMBAH Vendor</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">TITLE</th>
                <th scope="col">CONTENT</th>
                <th scope="col">AKSI</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vendors as $vendor)
            <tr>
                <td>{{ $vendor->title }}</td>
                <td>{{ $vendor->content }}</td>
                <td class="text-center">
                    <a href="{{ route('vendor.edit', $vendor->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                    <button wire:click="destroy({{ $vendor->id }})" class="btn btn-sm btn-danger">DELETE</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $vendors->links() }}
</div>

