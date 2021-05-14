<template>
<layout title="Contatos">
    <div class="container">
        <div class="row" style="margin: 22px 0;">
            <div class="col-md-8 d-grid d-md-flex justify-content-md-start">
                <h3>Contatos</h3>
            </div>
            <div class="col-md-4 d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary" data-bs-toggle="collapse" href="#form-add-new" role="button" aria-expanded="false" aria-controls="form-add-new" type="button">Novo</button>
            </div>
        </div>
        <div class="collapse" id="form-add-new">
            <div class="card card-body">
                <new-contact-form/>
            </div>
        </div>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item" v-for="(contact, index) in contacts" :key="index">
                <h2 class="accordion-header" :id="'heading'+contact.id">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" :data-bs-target="'#collapse'+contact.id" aria-expanded="false" :aria-controls="'collapse'+contact.id">
                    {{ contact.name }}
                </button>
                </h2>
                <div :id="'collapse'+contact.id" class="accordion-collapse collapse " :aria-labelledby="'heading'+contact.id" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>Nome:</strong> {{ contact.name }} <br/>
                        <strong>Email:</strong> {{ contact.email }} <br/>
                        <strong>Telefone:</strong> {{ contact.number }} <br/>
                        <strong>Cidade:</strong> {{ contact.city }} <br/>
                    </div>
                </div>
            </div>
        </div>
    {{ counter }}
    </div>
    </layout>
</template>

<script>

import axios from 'axios'
import Layout from '../Layouts/Layout'
import NewContactForm from '@/Layouts/NewContactForm'

export default {
    components: {
      Layout,
      NewContactForm,
    },
    data: () => ({
        counter: 0,
        contacts: [],
        links: [
        {
            name: 'Home',
            to: '/'
        },
        {
            name: 'Page 1',
            to: '/page-1'
        },
        {
            name: 'Bad Link',
            to: '/random-bad-url'
        }
        ]
    }),
    mounted() {
        setInterval(() => {
            this.counter++
        }, 1000)
        axios.get('/api/contacts')
        .then(response => (this.contacts = response.data.data))
        // .then(function (response) {
        //     // handle success
        //     this.data.contacts = response.data.data
        //     console.log(response);
        // })
        .catch(function (error) {
            // handle error
            console.log(error);
        })
        .then(function () {
            // always executed
        });
    },
    methods: {
        reverseMessage() {
            this.message = this.message
            .split('')
            .reverse()
            .join('')
    }
  }
}
</script>

<style scoped>
</style>