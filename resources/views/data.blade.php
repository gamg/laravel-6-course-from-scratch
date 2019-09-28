<ul>
    @foreach($users as $user)
        <li>{{ $user->name }}</li>
    @endforeach
</ul>

<br><br>

{{ $users->count() }}
<br>
{{ $users->currentPage() }}
<br>
{{ $users->nextPageUrl() }}

<br><br>

{{ $users->links() }}
{{-- $users->fragment('cafe')->links() --}}
{{-- $users->appends(['edad' => '18'])->links() --}}
