<x-layouts.apps title="Laravel-All Post">
    <br>
    <x-alert :success="$save" type="danger" error="Something went wrong">
        Saved successfully!
    </x-alert>
<hr>
    <x-alert :success="$save" error="Error Happened!">
        Create Post Successfully!
    </x-alert>

    @foreach ($posts as $post)
        <x-card>
            <x-slot name="header">
                <h4>{{$post->title}}</h4>
                <h6>{{ $post->subtitle }}</h6>
            </x-slot>



            <p>{{ $post->body }}</p>
            <x-action-group>
                <a href="{{ route('posts-web.edit', $post->id) }}">
                    <x-button type="warning" text="Edit" :show="true" />
                </a>
                <form action="{{ route('posts-web.destroy', $post->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this post?');">
                    @csrf
                    @method('DELETE')
                    <x-button type="danger" text="Delete" :show="auth()->check()" />
                </form>
            </x-action-group>


            <x-slot name="footer">
                <small>Created at: {{ $post->created_at->format('Y-m-d H:i:s') }}</small>
            </x-slot>
        </x-card>
        <hr>

    @endforeach
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>

</x-layouts.apps>