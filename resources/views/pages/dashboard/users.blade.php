<x-dashboard.layouts title="Data Users">
    @role('admin')
    <section class="flex flex-col gap-5">
        <h1 class="font-bold text-xl">— Data User</h1>
        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr class="divide-x">
                        <th></th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $i => $user)
                    <tr class="divide-x">
                        <td>{{ $i + 1 }}</th>
                        <th>{{ $user['name'] }}</th>
                        <td>{{ $user['role'] }}</td>
                        <td>{{ $user['email'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    @endrole

    </x-dashboard-layouts>
