<div id="modalCreate" class="modal fade bd-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleModal">Criar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formClient" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="idClient">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputName">Nome</label>
                        <input type="text" class="form-control validation_name" id=" inputName" name="name"
                            placeholder="Digite seu nome">
                        <div class="invalid-feedback response_name"></div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail">E-mail</label>
                            <input type="email" class="form-control validation_email" id="inputEmail" name="email"
                                placeholder="Digite seu e-mail">
                            <div class="invalid-feedback response_email"></div>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPhone">Telefone</label>
                            <input type="text" class="form-control validation_phone" id="inputPhone" name="phone"
                                placeholder="Digite seu telefone">
                            <div class="invalid-feedback response_phone"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">Cidade</label>
                            <input type="text" class="form-control validation_city" id="inputCity" name="city"
                                placeholder="Digite sua cidade">
                            <div class="invalid-feedback response_city"></div>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputCity">Estado/UF</label>
                            <select class="custom-select validation_state" name="state">
                                <option value="">Selecione um UF</option>
                                @foreach ($state as $stateItem)
                                    <option value="{{ $stateItem->id_state }}">{{ $stateItem->name_state }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback response_state"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputCity">Categoria</label>
                        <select class="custom-select validation_category" name="category">
                            <option value="">Selecione uma categoria</option>
                            @foreach ($category as $categoryItem)
                                <option value="{{ $categoryItem->id_category_client }}">
                                    {{ $categoryItem->name_category_client }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback response_category"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="saveClient">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
