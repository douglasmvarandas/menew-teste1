<template>
  <form class="row g-3">
    <div class="col-12">
    <label for="inputName" class="form-label">Nome</label>
    <input type="text" class="form-control" id="inputName" placeholder="Nome completo">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputNumber" class="form-label">Telefone</label>
    <input type="number" class="form-control" id="inputNumber">
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="col-md">
    <label for="inputCity" class="form-label">City</label>
    <input type="text" class="form-control" id="inputCity">
  </div>
  <div class="col-md">
    <label for="inputState" class="form-label">State</label>
    <select id="inputState" class="form-select">
      <option selected>Choose...</option>
      <option v-for="(state, index) in states" :key="index" :value="state.to">{{ state.name }}</option>
    </select>
  </div>
  <div class="col-md">
    <label for="inputZip" class="form-label">Função</label>
    <input type="text" class="form-control" id="inputZip">
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Sign in</button>
  </div>
</form>
</template>

<script>

export default {
    data: () => ({
        counter: 0,
        contacts: [],
        states: [
        {
            name: 'Paraíba',
            to: 'PB'
        },
        ]
    })
}
</script>
