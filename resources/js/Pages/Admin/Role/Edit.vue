<template>
    <Head title="Role" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Role > Edit
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div>
                                <label for="title">Name</label>
                                <input
                                    type="text"
                                    v-model="form.name"
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                                />
                            </div>
                            <div>
                                <label for="title">GUARD NAME</label>
                                <input
                                    type="text"
                                    v-model="form.guard_name"
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                                />
                            </div>

                            <!-- submit -->
                            <div class="flex items-center mt-4">
                                <button
                                    class="px-6 py-2 text-white bg-gray-900 rounded"
                                >
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/AdminAuthenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
    },
    setup(props) {
        const form = useForm({
            name: props.role.name,
            guard_name: props.role.guard_name,
        });

        return { form };
    },
    props: {
        role: Object,
    },
    methods: {
        submit() {
            this.form.put(route("admin.roles.update", this.role.id));
        },
    },
};
</script>
