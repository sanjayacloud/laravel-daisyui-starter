<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                <div class="stats shadow">
                    <div class="stat">
                        <div class="stat-title">Total Page Views</div>
                        <div class="stat-value">89,400</div>
                        <div class="stat-desc">21% more than last month</div>
                    </div>
                </div>
                
                <div class="stats shadow">
                    <div class="stat">
                        <div class="stat-figure text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        </div>
                        <div class="stat-title">Total Likes</div>
                        <div class="stat-value text-primary">25.6K</div>
                        <div class="stat-desc">21% more than last month</div>
                    </div>
                </div>
                
                <div class="stats shadow">
                    <div class="stat">
                        <div class="stat-figure text-secondary">
                            <div class="avatar online">
                                <div class="w-16 rounded-full">
                                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=John" />
                                </div>
                            </div>
                        </div>
                        <div class="stat-value">86%</div>
                        <div class="stat-title">Tasks done</div>
                        <div class="stat-desc text-secondary">31 tasks remaining</div>
                    </div>
                </div>
            </div>

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Alert Card -->
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body">
                        <h2 class="card-title">Alerts</h2>
                        <div class="space-y-2">
                            <div class="alert alert-info">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span>New software update available.</span>
                            </div>
                            <div class="alert alert-success">
                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                <span>Your purchase has been confirmed!</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Card -->
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body">
                        <h2 class="card-title">Quick Actions</h2>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">What is your name?</span>
                            </label>
                            <input type="text" placeholder="Type here" class="input input-bordered w-full" />
                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">Pick a color</span>
                            </label>
                            <div class="flex gap-2">
                                <input type="radio" name="color" class="radio radio-primary" checked />
                                <input type="radio" name="color" class="radio radio-secondary" />
                                <input type="radio" name="color" class="radio radio-accent" />
                            </div>
                        </div>
                        <div class="card-actions justify-end mt-4">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Recent Activity</h2>
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <label>
                                            <input type="checkbox" class="checkbox" />
                                        </label>
                                    </th>
                                    <th>Name</th>
                                    <th>Job</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>
                                        <label>
                                            <input type="checkbox" class="checkbox" />
                                        </label>
                                    </th>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="avatar">
                                                <div class="mask mask-squircle w-12 h-12">
                                                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Cy" alt="Avatar" />
                                                </div>
                                            </div>
                                            <div>
                                                <div class="font-bold">Cy Ganderton</div>
                                                <div class="text-sm opacity-50">United States</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Quality Control Specialist</td>
                                    <td><div class="badge badge-success gap-2">Active</div></td>
                                    <th>
                                        <button class="btn btn-ghost btn-xs">details</button>
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <label>
                                            <input type="checkbox" class="checkbox" />
                                        </label>
                                    </th>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="avatar">
                                                <div class="mask mask-squircle w-12 h-12">
                                                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Hart" alt="Avatar" />
                                                </div>
                                            </div>
                                            <div>
                                                <div class="font-bold">Hart Hagerty</div>
                                                <div class="text-sm opacity-50">Canada</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Desktop Support Technician</td>
                                    <td><div class="badge badge-warning gap-2">Pending</div></td>
                                    <th>
                                        <button class="btn btn-ghost btn-xs">details</button>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>