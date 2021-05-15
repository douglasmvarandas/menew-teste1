<template>
  <layout title="Editar contato">
    <div class="container">
      <div class="row" style="margin: 22px 0">
        <div class="col-12">
          <h3>Editar contato</h3>
          <form class="row g-3" @submit.prevent="sendData">
            <div class="col-12">
              <div class="alert alert-danger" role="alert" v-if="error">
                {{ errorMessage }}
              </div>
              <label for="inputName" class="form-label">Nome</label>
              <input
                type="text"
                class="form-control"
                id="inputName"
                v-model="data.name"
                placeholder="Nome completo"
              />
            </div>
            <div class="col-md-6">
              <label for="inputEmail" class="form-label">Email</label>
              <input
                type="email"
                class="form-control"
                id="inputEmail"
                v-model="data.email"
                placeholder="seuemail@gmail.com"
              />
            </div>
            <div class="col-md-6">
              <label for="inputNumber" class="form-label">Telefone</label>
              <input
                type="number"
                class="form-control"
                v-model="data.number"
                id="inputNumber"
              />
            </div>
            <div class="col-md">
              <label for="inputCity" class="form-label">Cidade</label>
              <input
                type="text"
                class="form-control"
                id="inputCity"
                v-model="data.city"
                placeholder="João Pessoa"
              />
            </div>
            <div class="col-md">
              <label for="inputState" class="form-label">Estado</label>
              <select id="inputState" class="form-select" v-model="data.state">
                <option selected>Escolha...</option>
                <option
                  v-for="(state, index) in states"
                  :key="index"
                  :value="state.slug"
                >
                  {{ state.name }}
                </option>
              </select>
            </div>
            <div class="col-md">
              <label for="inputCategory" class="form-label">Categoria</label>
              <select
                id="inputCategory"
                class="form-select"
                v-model="data.category"
              >
                <option selected>Escolha...</option>
                <option
                  v-for="(category, index) in categories"
                  :key="index"
                  :value="category.name"
                >
                  {{ category.title }}
                </option>
              </select>
            </div>
            <div class="col-12 d-grid gap-2">
              <button type="submit" class="btn btn-primary">
                SALVAR ALTERAÇÕES
              </button>
            </div>
            <!-- {{ JSON.stringify(data) }} -->
          </form>
        </div>
      </div>
    </div>
  </layout>
</template>

<script>
import axios from "axios";
import Layout from "../Layouts/Layout.vue";

export default {
  components: { Layout },
  props: {
    contact: Object,
  },
  data() {
    return {
      counter: 0,
      contacts: [],
      states: [
        {
          name: 'Alagoas',
          slug: 'AL'
        },
        {
          name: 'Amapá',
          slug: 'AP'
        },
        {
          name: 'Bahia',
          slug: 'BA'
        },
        {
          name: 'Ceará',
          slug: 'CE'
        },
        {
          name: 'Maranhão',
          slug: 'MA'
        },
        {
          name: 'Paraíba',
          slug: 'PB'
        },
        {
          name: 'Pernambuco',
          slug: 'PE'
        },
        {
          name: 'Piauí',
          slug: 'PI'
        },
        {
          name: 'Rio Grande do Norte',
          slug: 'RN'
        },
        {
          name: 'Sergipe',
          slug: 'SE'
        },
      ],
      categories: [
        {
          name: "client",
          title: "Cliente",
        },
        {
          name: "provider",
          title: "Fornecedor",
        },
        {
          name: "employee",
          title: "Funcionário",
        },
      ],
      error: false,
      errorMessage: "",
      data: this.contact,
    };
  },
  methods: {
    doAfterSaved() {
      window.location.href = "/"
    },
    sendData(event) {
      let vi = this; // vi stands for vue instance

      vi.error = false;

      axios
        .put("/api/contacts/"+vi.contact.id, vi.data)
        .then((response) => {
          // handle success
          vi.doAfterSaved();
          console.log(response.data);
        })
        .catch(function (error) {
          // handle error
          var data = error.response.data;
          console.log(data);

          if (!data.success) {
            vi.error = true;
            vi.errorMessage = data.error.message;
          }

          // alert(_.error)
        })
        .then(function () {
          // always executed
        });
    },
  },
};
</script>