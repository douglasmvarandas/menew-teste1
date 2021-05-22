<template>
    <breeze-authenticated-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                People
            </h2>
            <inertia-link as="button" :href="route('people.create')">
                ADD
            </inertia-link>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <table>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>E-mail</th>
                                <th>City</th>
                                <th>Country</th>
                                <th>Category</th>
                                <th>Actions</th>
                            </tr>
                            <tr v-for="person in people" :key="person.id">
                                <td>{{ person.name }}</td>
                                <td>{{ person.phone }}</td>
                                <td>{{ person.email }}</td>
                                <td>{{ person.city }}</td>
                                <td>{{ person.country }}</td>
                                <td>{{ person.category }}</td>
                                <td>
                                    Edit
                                    Delete
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </breeze-authenticated-layout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated'

    export default {
        components: {
            BreezeAuthenticatedLayout,
        },

        props: {
            auth: Object,
            errors: Object,
            people: Object,
        },
    }
</script>
