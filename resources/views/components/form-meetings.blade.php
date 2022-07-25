<div>
  <div class="block mb-2">
    <label class="block" for="title">Titulo de la reunion</label>
    <input type="text" name="title" id="title" class="w-full mt-2 border border-gray-200 focus:border-idigo-500 hover:border-idigo-500 rounded-md" value="{{ $meeting->title }}" required>
  </div>
  <div class="block mb-2">
    <label class="block" for="start_date">Fecha y Hora de Inicio</label>
    <input type="text" name="start_date" id="start_date" class="w-full mt-2 border border-gray-200 focus:border-idigo-500 hover:border-idigo-500 rounded-md" value="{{ $meeting->start_date }}" required>
  </div>
  <div class="block mb-2">
    <label class="block" for="end_date">Fecha y Hora de Fin</label>
    <input type="text" name="end_date" id="end_date" class="w-full mt-2 border border-gray-200 focus:border-idigo-500 hover:border-idigo-500 rounded-md" value="{{ $meeting->end_date }}" required>
  </div>
  <div class="block mb-2">
    <label class="block" for="description">Descripcion</label>
    <textarea name="description" id="description" class="w-full mt-2 border border-gray-200 focus:border-idigo-500 hover:border-idigo-500 rounded-md" cols="30" rows="10" required>{{ $meeting->description }}</textarea>
  </div>
  <div class="block mb-2">
    <label class="block" for="url">Url de la reunion</label>
    <input type="text" name="url" id="url" class="w-full mt-2 border border-gray-200 focus:border-idigo-500 hover:border-idigo-500 rounded-md" value="{{ $meeting->url }}" required>
  </div>
</div>