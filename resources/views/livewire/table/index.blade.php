<div>
    <div class="container">
        <div class="py-5">
            <nav class="navbar">
                <div class="bg-light col-5">
                    <input wire:model.live='search' class="form-control me-2" type="search" placeholder="Search"
                        aria-label="Search">
                </div>
                <div class="btn-group col-">
                    <select wire:model.live='admin' class="form-select" aria-label="Default select example">
                        <option value="">All</option>
                        <option value="0">Member</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
            </nav>
            <table class="table border">
                <thead>
                    <tr>
                        <th scope="col">NAME</th>
                        <th scope="col">Email</th>
                        <th scope="col">ROLE</th>
                        <th scope="col">JOINED</th>
                        <th scope="col">LAST UPDATE</th>
                    </tr>
                </thead>
                @foreach ($users as $user)
                    <tbody>
                        <tr>
                            <th>{{ $user->name }}</th>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->is_admin ? 'Admin' : 'Member' }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->updated_at }}</td>
                            <td><button wire:confirm="Are you sure you want to delete {{$user->name}}?"
                                wire:click='delete({{ $user->id }})' class="text-danger">X</button></td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
            <div class="col-1 mb-2">
                <select wire:model.live='perPage' class="form-select" aria-label="Default select example">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                </select>
            </div>
            {{ $users->links() }}
        </div>
    </div>
</div>
</div>
