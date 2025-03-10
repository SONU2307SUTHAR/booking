<div>
    <div class="mb-4">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" wire:model="title" class="form-control" />
                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea id="content" wire:model="content" class="form-control"></textarea>
                @error('content') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                {{ $isEditMode ? 'Update Post' : 'Create Post' }}
            </button>
        </form>
    </div>

    <h3>Posts List</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ Str::limit($post->content, 50) }}</td>
                    <td>
                        <button wire:click="edit({{ $post->id }})" class="btn btn-warning btn-sm">Edit</button>
                        <button wire:click="delete({{ $post->id }})" class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
