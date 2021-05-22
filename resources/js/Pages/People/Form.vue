<template>
    <breeze-authenticated-layout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 v-if="!this.person" class="font-semibold text-xl text-gray-800 leading-tight">
                    People ADD
                </h2>
                <h2 v-else class="font-semibold text-xl text-gray-800 leading-tight">
                    People ATT
                </h2>
                <inertia-link as="button" :href="route('people.index')" class="bg-red-500 hover:bg-red-400 rounded-lg py-2 px-6 text-white uppercase">
                    BACK
                </inertia-link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b">
                        <form @submit.prevent="submit" class="px-4">
                            <label for="name">Name:</label>
                            <div v-if="errors.name" class="errorMessage">{{ errors.name }}</div>
                            <input id="name" v-model="form.name" />

                            <label for="phone">Phone:</label>
                            <div v-if="errors.phone" class="errorMessage">{{ errors.phone }}</div>
                            <input id="phone" v-model="form.phone" />

                            <label for="email">E-mail:</label>
                            <div v-if="errors.email" class="errorMessage">{{ errors.email }}</div>
                            <input id="email" v-model="form.email" />

                            <label for="city">City:</label>
                            <div v-if="errors.city" class="errorMessage">{{ errors.city }}</div>
                            <select v-model="form.city" id="city">
                                <option v-for="city in cities" :key="city.id" :value="city.id">
                                    {{ city.name }}
                                </option>
                            </select>

                            <label for="category">Category:</label>
                            <div v-if="errors.category" class="errorMessage">{{ errors.category }}</div>
                            <select v-model="form.category" id="category">
                                <option v-for="category in categories" :key="category.id" :value="category.id">
                                    {{ category.name }}
                                </option>
                            </select>

                            <button v-if="!this.person" type="submit" class="bg-green-500 hover:bg-green-400 rounded-lg py-2 mt-2 text-white uppercase">REGISTER</button>
                            <button v-else type="submit" class="bg-green-500 hover:bg-green-400 rounded-lg py-2 mt-2 text-white uppercase">UPDATE</button>
                        </form>
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
            cities: Object,
            categories: Object,
            person: Object,
        },
        data() {
            return {
                form: {
                    name: null,
                    phone: null,
                    email: null,
                    city: null,
                    category: null,
                },
            }
        },
        mounted () {
            if (this.person) {
                this.form.name = this.person.name
                this.form.phone = this.person.phone
                this.form.email = this.person.email
                this.form.city = this.person.city_id
                this.form.category = this.person.category_id
            }
        },
        methods: {
            submit() {
                if (this.person) {
                    this.$inertia.put(this.route('people.update', this.person.id), this.form);
                } else {
                    this.$inertia.post('/people', this.form)
                }
            },
        },
    }
</script>
