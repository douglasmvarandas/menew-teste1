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
        <div :class="formClass" id="form-add-new">
            <div class="card card-body">
                <new-contact-form :do-after-saved="reloadContacts"/>
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
                        <strong>Cidade:</strong> {{ contact.city }} - {{ contact.state }}<br/>
                        <strong>Categoria:</strong> {{ categories[contact.category] }} <br/>
                        <div class="btn-group" role="group" aria-label="Ações">
                            <button class="btn btn-outline-primary">Apagar contato</button>
                            <a class="btn btn-primary" :href="'/contacts/edit/'+contact.id">Editar contato</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        formClass: 'collapse ',
        contacts: [],
        categories: {
          'client': 'Cliente',
          'provider': 'Fornecedor',
          'employee': 'Funcionário'
        },
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
        this.loadContacts()
    },
    methods: {
      reloadContacts() {
          this.formClass = "collapse"
          this.loadContacts()
      },
      loadContacts() {
        axios.get('/api/contacts')
        .then(response => (this.contacts = response.data.data))
        .catch(function (error) {
            // handle error
            console.log(error);
        })
        .then(function () {
            // always executed
        })
      }
  }
}
</script>

<style scoped>

#form-add-new {
  margin-bottom: 22px;
}

.btn-group {
    margin-top: 16px;
}

</style>