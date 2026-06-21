<x-layout>
    @if (session('success'))
        <div class="alert alert-success mb-4 text-white !p-2">
            {{ session('success') }}
        </div>
    @elseif (session('success_del'))
        <div class="alert alert-error mb-4 text-white !p-2">
            {{ session('success_del') }}
        </div>
    @endif

    
</x-layout>