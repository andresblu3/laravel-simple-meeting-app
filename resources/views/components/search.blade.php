<form action="{{ route('dashboard') }}" method="GET">
  <input type="text" name="search" id="search" value="{{ request()->get('search') }}" placeholder="Buscar..."
      class="px-1 mt-2 rounded-md border border-indigo-400" required>
</form>