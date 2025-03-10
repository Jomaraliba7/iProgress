@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ url('/create-folder') }}" method="POST">
    @csrf
    <!-- ...existing form fields... -->
    <input type="text" name="path" placeholder="Folder Path">
    <button type="submit">Create Folder</button>
</form>
