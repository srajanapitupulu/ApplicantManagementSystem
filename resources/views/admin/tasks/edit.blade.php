<h2>Edit Task</h2>
<form method="POST" action="{{ route('admin.tasks.update', $task) }}">
    @csrf
    @method('PUT')
    <label>Title</label><br>
    <input type="text" name="title" value="{{ $task->title }}" required><br><br>
    <label>Description</label><br>
    <textarea name="description" required>{{ $task->description }}</textarea><br><br>
    <button type="submit">Update</button>
</form>