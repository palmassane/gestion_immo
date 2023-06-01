<x-master-layout>
<x-header-immo>
</x-header-immo>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<form  method="POST" class="bg-white" action=" {{url('categorie/update/'.$categorie->id)}}">
            @csrf
            @method('PUT')          
<div class="card card-primary mt-5 py-2"> 
  <div class="card-header">
   <h3 class="card-title">Modification Catégories</h3>

  </div>
       <div class="card-body">
             <div class="form-group">

             <div class="row ">
             <div class="col-md-12">
             <div class="form-group">
             <x-input-label for="libelle" :value="__('Nom Categorie')" />
            <x-text-input id="libelle" name="libelle" type="text" class="form-control" :value="old('libelle', $categorie->libelle)" required autocomplete="title" />
            <x-input-error class="mt-2" :messages="$errors->get('categorie')" />
             </div>
            </div>
            
           </div>

           <div class="row">
            <div class="col-md-12 mb-4">
            <div class="form-group">
            <x-input-label for="description" :value="__('Description')" />
            <textarea id="description" name="description" class="form-control" required autofocus autocomplete="description">{{ $categorie->description }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
            </div>
            </div>
            </div>

            <div class="row">
            <div class="col-md-12 mb-4">
            <div class="form-group">
            <label for="active">{{ __('Active') }}</label><br>
                <label>
                    <input type="checkbox" id="active" name="active" value="1" {{ old('active', $categorie->active) ? 'checked' : '' }}>
                    Oui
                </label>
                
            <x-input-error class="mt-2" :messages="$errors->get('active')" />
            </div>
            </div>
            </div>       
          </div>
      <div class="card-footer">
      <button class="btn btn-primary">{{ __('Modifier') }}</button>
        @if (session('status') === 'register-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600 dark:text-gray-400"
            >{{ __('Modifier') }}</p>
      @endif
   </div>
    </div>
    </div>
<x-body-immo>
</x-body-immo>
</x-master-layout>