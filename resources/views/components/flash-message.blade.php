@if(session()->has("message"/* "success"/"error" */))
    <div x-data="{show: true}" x-init="setTimeout(() => show=false, 3000)" x-show="show" class="fixed top-0 bg-laravel left-1/2 transform -translate-x-1/2 text-white px-48 py-3">
        <p>
            {{session("message"/* "success"/"error" */)}}
        </p>
    </div>
@endif