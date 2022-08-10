<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
    @if (session()->has('message'))
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
            role="alert">
            <div class="flex">
                <div>
                    <p class="text-sm">{{ session('message') }}</p>
                </div>
            </div>
        </div>
    @endif
    <x-form.input.button type="button" label="Create New User" event-action="create()" event-name="click"
        class="btn btn-sm hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4" id="create-user" />
    @if ($isOpen)
        @include('admin.users.create')
    @endif
    <div class="overflow-x-auto">
        <table class="table table-compact w-full">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 w-20">No.</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Created At</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($users && count($users))
                    @foreach ($users as $user)
                        <tr>
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $user->name }}</td>
                            <td class="border px-4 py-2">{{ $user->email }}</td>
                            <td class="border px-4 py-2">{{ $user->created_at }}</td>
                            <td class="border px-4 py-2">
                                <x-form.input.button type="button" label="Edit"
                                    event-action="edit({{ $user->id }})" event-name="click"
                                    class="btn btn-sm hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                    id="edit-user" />
                                @if ($user->role !== 1)
                                    <x-form.input.button type="button" label="Delete"
                                        event-action="delete({{ $user->id }})" event-name="click"
                                        class="btn btn-sm bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                        id="delete-user" />
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">Users data not available!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {!! $users->links('vendor.livewire.tailwind') !!}
    </div>
</div>
