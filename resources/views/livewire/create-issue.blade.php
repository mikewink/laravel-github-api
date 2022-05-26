<div class="my-8 flex flex-row justify-center content-center">
    <h2 class="mr-8">Create An Issue</h2>
    <div>
        <label>{{ __('Title') }}
            <input wire:model.debounce.300ms="title"
                   type="text"
                   class=""
                   required>
        </label> <label>{{ __('Body') }}
            <input wire:model.debounce.300ms="body"
                   type="text"
                   class="">
        </label>
        <input wire:click="createIssue"
               type="submit"
               class=""
               value="{{ __('Create issue') }}">
        {{--
        <input wire:click="deleteIssue"
               type="submit"
               class=""
               value="{{ __('Delete issue') }}">
        --}}
        <p class="mt-2">Rate limit remaining: {{ $rateLimit }}</p>
    </div>
</div>
