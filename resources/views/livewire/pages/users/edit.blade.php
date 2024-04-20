<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Editar Usuario') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __("Edita los campos del usuario.") }}
                    </p>
                </header>

                <form wire:submit.prevent="save" class="mt-6 space-y-6">
                <div>
                        <x-input-label for="name" :value="__('Nombre')" />
                        <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div>
                        <x-input-label for="lastname" :value="__('Apellido')" />
                        <x-text-input wire:model="lastname" id="lastname" name="lastname" type="text" class="mt-1 block w-full" required autofocus autocomplete="lastname" />
                        <x-input-error class="mt-2" :messages="$errors->get('lastname')" />
                    </div>

                    <div>
                        <x-input-label for="phone" :value="__('Teléfono')" />
                        <x-text-input wire:model="phone" id="phone" name="phone" type="number" class="mt-1 block w-full" required autocomplete="phone" />
                        <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                    </div>

                    <div>
                        <x-input-label for="email" :value="__('Correo')" />
                        <x-text-input wire:model="email" id="email" name="email" type="email" class="mt-1 block w-full" required autocomplete="email" />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>

                    <div>
                        <x-input-label for="password" :value="__('Contraseña')" />
                        <x-text-input wire:model="password" id="password" name="password" type="password" class="mt-1 block w-full" required autocomplete="password" />
                        <x-input-error class="mt-2" :messages="$errors->get('password')" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Guardar') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>