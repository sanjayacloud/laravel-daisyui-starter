<x-laravel-daisyui-starter::layout>
    <div class="max-w-2xl mx-auto">
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title text-2xl font-bold mb-4">Profile Information</h2>
                <p class="text-base-content/70 mb-6">Update your account's profile information and email address.</p>

                <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
                    @csrf
                    @method('patch')

                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Name</span>
                        </label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="input input-bordered w-full" required autofocus autocomplete="name" />
                        @error('name')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="input input-bordered w-full" required autocomplete="username" />
                        @error('email')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="btn btn-primary">Save</button>
                        @if (session('status') === 'profile-updated')
                            <div class="badge badge-success">Saved</div>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <div class="card bg-base-100 shadow-xl mt-8">
            <div class="card-body">
                <h2 class="card-title text-2xl font-bold mb-4">Update Password</h2>
                <p class="text-base-content/70 mb-6">Ensure your account is using a long, random password to stay secure.</p>

                <form method="post" action="{{ route('password.update') }}" class="space-y-6">
                    @csrf
                    @method('put')

                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Current Password</span>
                        </label>
                        <input type="password" name="current_password" class="input input-bordered w-full" required autocomplete="current-password" />
                        @error('current_password')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">New Password</span>
                        </label>
                        <input type="password" name="password" class="input input-bordered w-full" required autocomplete="new-password" />
                        @error('password')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Confirm Password</span>
                        </label>
                        <input type="password" name="password_confirmation" class="input input-bordered w-full" required autocomplete="new-password" />
                        @error('password_confirmation')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="btn btn-primary">Update Password</button>
                        @if (session('status') === 'password-updated')
                            <div class="badge badge-success">Updated</div>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <div class="card bg-base-100 shadow-xl mt-8">
            <div class="card-body">
                <h2 class="card-title text-2xl font-bold mb-4">Delete Account</h2>
                <p class="text-base-content/70 mb-6">Once your account is deleted, all of its resources and data will be permanently deleted.</p>

                <div class="flex items-center gap-4">
                    <button class="btn btn-error" onclick="delete_account.showModal()">Delete Account</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Account Modal -->
    <dialog id="delete_account" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Are you sure you want to delete your account?</h3>
            <p class="py-4">Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.</p>

            <form method="post" action="{{ route('profile.destroy') }}" class="space-y-4">
                @csrf
                @method('delete')

                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Password</span>
                    </label>
                    <input type="password" name="password" class="input input-bordered w-full" required />
                    @error('password')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <div class="modal-action">
                    <button type="button" class="btn" onclick="delete_account.close()">Cancel</button>
                    <button type="submit" class="btn btn-error">Delete Account</button>
                </div>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
</x-laravel-daisyui-starter::layout>