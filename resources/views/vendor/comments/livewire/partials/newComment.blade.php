@if($writable && \Illuminate\Support\Facades\Gate::check('createComment', $model))
    <div class="comments-form bg-black/15 rounded-lg p-4 border border-gray-700">
        @if($showAvatars)
            <x-comments::avatar/>
        @endif

        <form
            class="comments-form-inner"
            wire:submit.prevent="comment"
            wire:keydown.cmd.enter="comment"
            wire:keydown.ctrl.enter="comment"
        >
            @if (!auth()->check())
                <div class="mb-4 text-sm text-gray-600 text-center">
                    Want to comment as yourself?
                    <a href="{{ url('/auth/github/redirect') }}" class="underline hover:text-pink-400 text-pink-600">
                        Sign in with GitHub
                    </a>
                </div>
            @endif
            <x-dynamic-component
                :component="\Spatie\LivewireComments\Support\Config::editor()"
                model="text"
                :commentable="$model"
                :placeholder="__('comments::comments.write_comment')"
                wire:key="editor-new"
            />
            @error('text')
            <p class="comments-error">
                {{ $message }}
            </p>
            @enderror
            <x-comments::button submit="">
                {{ __('comments::comments.create_comment') }}
            </x-comments::button>
        </form>
    </div>
@endif
