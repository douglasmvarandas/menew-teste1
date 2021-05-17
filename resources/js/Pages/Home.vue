<template>
  <layout title="Contatos">
    <div class="container">
      <div class="row" style="margin: 22px 0">
        <div class="col-8 d-grid d-flex justify-content-md-start">
          <h3>Contatos</h3>
        </div>
        <div class="col-4 d-grid gap-2 d-flex justify-content-end">
          <button
            class="btn btn-primary"
            data-bs-toggle="collapse"
            href="#form-add-new"
            role="button"
            aria-expanded="false"
            aria-controls="form-add-new"
            type="button"
          >
            <i class="bi bi-person-plus-fill no-space"></i>
            <span class="d-none d-md-inline">Novo</span>
          </button>
        </div>
        <form
          class="row g-3"
          style="padding-end: 0px"
          @submit.prevent="searchByName"
        >
          <div class="form-group col-9" style="padding-start: 0px">
            <input
              type="text"
              v-model="search"
              class="form-control"
              id="inputPassword2"
              placeholder="Pesquisar"
            />
          </div>
          <button type="submit" class="btn btn-primary col-3">
            <i class="bi bi-search no-space"></i>
            <span class="d-none d-md-inline">Pesquisar</span>
          </button>
        </form>

        <div :class="'row g-3 ' + formClass" id="form-add-new">
          <div class="card card-body">
            <new-contact-form :do-after-saved="reloadContacts" />
          </div>
        </div>
      </div>

      <div class="row align-items-center" v-if="contactlist.length == 0">
        <div class="error-icon">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            class="bi bi-exclamation-circle"
            viewBox="0 0 16 16">
            <path
              d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path
              d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
          </svg>
          <h3>Não encontramos nenhum resultado</h3>
        </div>
      </div>

      <div class="accordion" id="accordionExample">
        <div
          class="accordion-item"
          v-for="(contact, index) in contactlist"
          :key="index"
        >
          <h2 class="accordion-header" :id="'heading' + contact.id">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              :data-bs-target="'#collapse' + contact.id"
              aria-expanded="false"
              :aria-controls="'collapse' + contact.id"
            >
              {{ contact.name }}
            </button>
          </h2>
          <div
            :id="'collapse' + contact.id"
            class="accordion-collapse collapse"
            :aria-labelledby="'heading' + contact.id"
            data-bs-parent="#accordionExample"
          >
            <div class="accordion-body">
              <strong>Nome:</strong> {{ contact.name }} <br />
              <strong>Email:</strong> {{ contact.email }} <br />
              <strong>Telefone:</strong> {{ contact.number }} <br />
              <strong>Cidade:</strong> {{ contact.city }} - {{ contact.state
              }}<br />
              <strong>Categoria:</strong> {{ categories[contact.category] }}
              <br />
              <div class="btn-group" role="group" aria-label="Ações">
                <button
                  class="btn btn-outline-primary"
                  @click="deleteContact(contact.id)"
                >
                  Apagar contato
                </button>
                <a
                  class="btn btn-primary"
                  :href="'/contacts/edit/' + contact.id"
                  >Editar contato</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </layout>
</template>

<script>
import axios from "axios";
import Layout from "../Layouts/Layout";
import NewContactForm from "@/Layouts/NewContactForm";

export default {
  components: {
    Layout,
    NewContactForm,
  },
  data: () => ({
    formClass: "collapse ",
    contacts: [],
    contactlist: [],
    categories: {
      client: "Cliente",
      provider: "Fornecedor",
      employee: "Funcionário",
    },
    search: "",
    links: [
      {
        name: "Home",
        to: "/",
      },
      {
        name: "Page 1",
        to: "/page-1",
      },
      {
        name: "Bad Link",
        to: "/random-bad-url",
      },
    ],
  }),
  mounted() {
    this.loadContacts();
  },
  methods: {
    matchQuery(value) {
      if (value == "") return true;
      return value.name.toLowerCase().includes(this.search.toLowerCase());
    },
    searchByName(event) {
      var vi = this;
      var result = this.contacts.filter(this.matchQuery);

      vi.contactlist = [];
      if (result.length > 0) {
        result.forEach(function (element, index, array) {
          var contact = Object.assign({}, element);
          vi.contactlist.push(contact);
        });
      }
    },
    reloadContacts() {
      this.formClass = "collapse";
      this.loadContacts();
    },
    loadContacts() {
      axios
        .get("/api/contacts")
        .then((response) => (this.contacts = response.data.data))
        .catch(function (error) {
          // handle error
          console.log(error);
        })
        .then(function () {
          // always executed
        });
    },
    deleteContact(id) {
      axios
        .delete("/api/contacts/" + id)
        .then((response) => {
          this.reloadContacts();
        })
        .catch(function (error) {
          // handle error
          console.log(error);
        })
        .then(function () {
          // always executed
        });
    },
  },
  watch: {
    search: function (newValue, oldValue) {
      if (newValue != "") {
        this.searchByName(newValue);
      } else {
        this.searchByName("");
      }
    },
    contacts: function (newValue, oldValue) {
      if (newValue != []) {
        this.contactlist = newValue;
      }
    },
  },
};
</script>

<style lang="stylus" scoped>
#form-add-new {
  margin-bottom: 22px;
}

.btn-group {
  margin-top: 16px;
}

button {
  i.bi {
    margin-right: 12px;

    &.no-space {
      margin: 0px;
    }
  }
}

.error-icon {
  margin: 50px auto;
  text-align: center;

  svg {
    width: 150px;
    height: auto;
    display: block;
    margin: 0 auto;
    margin-bottom: 22px;
  }
}
</style>