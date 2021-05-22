<template>
    <breeze-authenticated-layout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    People
                </h2>
                <inertia-link as="button" :href="route('people.create')" class="bg-green-500 hover:bg-green-400 rounded-lg py-2 px-6 text-white uppercase">
                    ADD
                </inertia-link>
            </div>
        </template>

        <div class="py-12">
            <div class="w-full mx-auto sm:px-6 lg:px-20">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <div class="flex justify-end items-center">
                            <input type="text" v-model="search" class="my-0 rounded-lg w-2/6 text-right px-6" placeholder="Search someone here...">
                        </div>

                        <table class="w-full text-center mt-6 text-lg">
                            <tr class="bg-gray-200">
                                <th>Name</th>
                                <th>Phone</th>
                                <th>E-mail</th>
                                <th>City</th>
                                <th>Country</th>
                                <th>Category</th>
                                <th>Actions</th>
                            </tr>
                            <tr v-for="person in filteredPeople" :key="person.id">
                                <td>{{ person.name }}</td>
                                <td>{{ person.phone }}</td>
                                <td>{{ person.email }}</td>
                                <td>{{ person.city }}</td>
                                <td>{{ person.country }}</td>
                                <td>{{ person.category }}</td>
                                <td class="flex justify-center items-center space-x-2">
                                    <inertia-link :href="route('people.edit', person.id)">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="green">
                                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                        </svg>
                                    </inertia-link>
                                    <inertia-link as="button" method="delete" :href="route('people.destroy', parseInt(person.id))" @click="confirm">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="red">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                    </inertia-link>
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

        data () {
            return {
                search: null,
            }
        },

        methods: {
            confirm () {
                return confirm("Are you sure about that?");
            },
        },

        computed: {
            filteredPeople () {
                if (this.search) {
                    return this.people.filter((person) => {
                        return person.name.toLowerCase().includes(this.search.toLowerCase());
                    })
                } else {
                    return this.people;
                }
            }
        }
    }
</script>
