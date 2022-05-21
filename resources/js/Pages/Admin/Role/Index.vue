<template>
    <Head title="Role" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Role
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-4">
                            <Link
                                class="px-6 py-2 mb-2 text-green-100 bg-green-500 rounded"
                                :href="route('admin.roles.create')"
                            >
                                Create role
                            </Link>
                        </div>
                        <table>
                            <thead class="font-bold bg-gray-300 border-b-2">
                                <td class="px-4 py-2">ID</td>
                                <td class="px-4 py-2">NAME</td>
                                <td class="px-4 py-2">GUARD NAME</td>
                                <td class="px-4 py-2">Action</td>
                            </thead>
                            <tbody>
                                <tr v-for="role in roles.data" :key="role.id">
                                    <td class="px-4 py-2">{{ role.id }}</td>
                                    <td class="px-4 py-2">{{ role.name }}</td>
                                    <td class="px-4 py-2">
                                        {{ role.guard_name }}
                                    </td>
                                    <td class="px-4 py-2 font-extrabold">
                                        <Link
                                            class="text-green-700"
                                            :href="
                                                route(
                                                    'admin.roles.edit',
                                                    role.id
                                                )
                                            "
                                        >
                                            Edit
                                        </Link>
                                        <Link
                                            @click="destroy(role.id)"
                                            class="text-red-700"
                                            >Delete</Link
                                        >
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <pagination :links="roles.links" />
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/AdminAuthenticated.vue";
import BreezeNavLink from "@/Components/NavLink.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        BreezeNavLink,
        Link,
    },
    props: {
        roles: Object,
    },
    methods: {
        destroy(id) {
            this.$inertia.delete(route("admin.roles.destroy", id));
        },
    },
};
</script>
