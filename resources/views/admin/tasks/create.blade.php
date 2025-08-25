<h2>Create Task</h2>
<form method="POST" action="{{ route('tasks.store') }}">
    @csrf
    <label>Title</label><br>
    <input type="text" name="title" required><br><br>
    <label>Description</label><br>
    <textarea name="description" required></textarea><br><br>
    <button type="submit">Save</button>
</form>