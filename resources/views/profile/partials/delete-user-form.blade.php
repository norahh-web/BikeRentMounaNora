<section class="profile-form profile-form--delete">
    <header class="profile-form__header">
        <h2 class="profile-form__title">
            {{ __('Delete Account') }}
        </h2>

        <p class="profile-form__description">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <details class="profile-form__confirmacion" @if ($errors->userDeletion->isNotEmpty()) open @endif>
        <summary class="button button--danger">{{ __('Delete Account') }}</summary>

        <form method="post" action="{{ route('profile.destroy') }}" class="profile-form__modal-form">
            @csrf
            @method('delete')

            <h2 class="profile-form__title">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="profile-form__description">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="profile-form__group">
                <x-input-label for="password" value="{{ __('Password') }}" class="profile-form__label--hidden" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="profile-form__input profile-form__input--narrow"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="profile-form__error" />
            </div>

            <div class="profile-form__modal-actions">
                <x-danger-button>
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </details>
</section>
