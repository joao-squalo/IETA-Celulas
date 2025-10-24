 <div class="flex flex-col gap-6">
    <x-auth-header :title="__('Esqueceu sua senha?')" :description="__('Digite seu email para receber o link de recuperação')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form method="POST" wire:submit="sendPasswordResetLink" class="flex flex-col gap-6">
        <!-- Email Address -->
        <flux:input
            wire:model="email"
            :label="__('E-mail')"
            type="email"
            required
            autofocus
            placeholder="email@example.com"
        />

        <flux:button variant="danger" type="submit" class="w-full">{{ __('Enviar link de recuperação') }}</flux:button>
    </form>

    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-400">
        <span>{{ __('Ou, voltar para ') }}</span>
        <flux:link :href="route('login')" class="text-red-400"  wire:navigate>{{ __('Login') }}</flux:link>
    </div>
</div>
