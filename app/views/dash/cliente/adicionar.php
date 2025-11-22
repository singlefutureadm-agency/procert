<form method="POST" action="<?= BASE_URL ?>clientes/adicionar" enctype="multipart/form-data">
  <div class="container-fluid py-4">
    <div class="row">
      <!-- Imagem do cliente -->
      <div class="col-md-4 text-center mb-3 mb-md-0">
        <div class="image-container" style="width: 100%; max-width: 200px; aspect-ratio: 1/1; overflow: hidden; border-radius: 50%; margin: auto;">
          <img src="<?= BASE_URL ?>assets/img/usuario.png" alt="exfe Logo" class="img-fluid" id="preview-img" style="cursor:pointer; border-radius:12px;">
        </div>
        <input type="file" name="foto_cliente" id="foto_cliente" style="display: none;" accept="image/*">
      </div>

      <!-- Informações do cliente -->
      <div class="col-md-8">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Adicionar cliente</p>
            </div>
          </div>

          <div class="card-body">
            <p class="text-uppercase text-sm">Informações Pessoais</p>
            <div class="row">
              <!-- Nome completo -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nome_cliente" class="form-control-label">Nome Completo</label>
                  <input class="form-control" type="text" id="nome_cliente" name="nome_cliente" placeholder="Digite o nome do funcionário" required>
                </div>
              </div>

              <!-- Email -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="email_cliente" class="form-control-label">Email</label>
                  <input class="form-control" type="email" id="email_cliente" name="email_cliente" placeholder="exemplo@email.com" required>
                </div>
              </div>

              <!-- Senha -->
              <!-- Senha -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="senha_cliente" class="form-control-label">Senha</label>

                  <div class="input-group">
                    <input
                      class="form-control"
                      type="password"
                      id="senha_cliente"
                      name="senha_cliente"
                     
                      required>

                    <span class="input-group-text" id="toggleSenha" style="cursor: pointer;">
                      <i class="bi bi-eye" id="iconSenha"></i>
                    </span>
                  </div>
                </div>
              </div>

              <script>
                document.getElementById('toggleSenha').addEventListener('click', function() {
                  const input = document.getElementById('senha_cliente');
                  const icon = document.getElementById('iconSenha');

                  if (input.type === "password") {
                    input.type = "text";
                    icon.classList.remove("bi-eye");
                    icon.classList.add("bi-eye-slash");
                  } else {
                    input.type = "password";
                    icon.classList.remove("bi-eye-slash");
                    icon.classList.add("bi-eye");
                  }
                });
              </script>

              <!-- Data de Nascimento -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nasc_cliente" class="form-control-label">Data de Nascimento</label>
                  <input class="form-control" type="date" id="nasc_cliente" name="nasc_cliente" required>
                </div>
              </div>
            </div>

            <hr class="horizontal dark">
            <p class="text-uppercase text-sm">Informações do cliente</p>
            <div class="row">



              <!-- Select Tipo de Pessoa -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="tipo_pessoa" class="form-control-label">Tipo de Pessoa</label>
                  <select id="tipo_pessoa" class="form-control" required name="tipo_cliente">
                    <option value="">Selecione...</option>
                    <option value="fisica">Pessoa Física</option>
                    <option value="juridica">Pessoa Jurídica</option>
                  </select>
                </div>
              </div>

              <!-- CPF -->
              <div class="col-md-6" id="campo_cpf" style="display:none;">
                <div class="form-group">
                  <label for="cpf_cliente" class="form-control-label">CPF</label>
                  <input class="form-control" type="text" id="cpf_cliente" name="cpf_cliente">
                </div>
              </div>

              <!-- CNPJ -->
              <div class="col-md-6" id="campo_cnpj" style="display:none;">
                <div class="form-group">
                  <label for="cnpj_cliente" class="form-control-label">CNPJ</label>
                  <input class="form-control" type="text" id="cnpj_cliente" name="cnpj_cliente">
                </div>
              </div>

            </div>

            <!-- SCRIPT -->
            <script>
              document.getElementById('tipo_pessoa').addEventListener('change', function() {
                const tipo = this.value;

                const campoCPF = document.getElementById('campo_cpf');
                const campoCNPJ = document.getElementById('campo_cnpj');

                const inputCPF = document.getElementById('cpf_cnpj_cliente');
                const inputCNPJ = document.getElementById('cnpj_cliente');

                if (tipo === 'fisica') {
                  campoCPF.style.display = 'block';
                  campoCNPJ.style.display = 'none';

                  inputCPF.required = true;
                  inputCNPJ.required = false;
                  inputCNPJ.value = "";
                } else if (tipo === 'juridica') {
                  campoCPF.style.display = 'none';
                  campoCNPJ.style.display = 'block';

                  inputCPF.required = false;
                  inputCNPJ.required = true;
                  inputCPF.value = "";
                } else {
                  campoCPF.style.display = 'none';
                  campoCNPJ.style.display = 'none';

                  inputCPF.required = false;
                  inputCNPJ.required = false;
                }
              });
            </script>


            <!-- Telefone -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="telefone_cliente" class="form-control-label">Telefone</label>
                <input class="form-control" type="tel" id="telefone_cliente" name="telefone_cliente" placeholder="(XX) XXXXX-XXXX" required>
              </div>
            </div>

            <!-- CEP -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="cep_cliente" class="form-control-label">CEP</label>
                <input class="form-control" type="text" id="cep_cliente" name="cep_cliente" placeholder="Digite o CEP" maxlength="8" required>
              </div>
            </div>

            <!-- Endereço -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="endereco_cliente" class="form-control-label">Endereço</label>
                <input class="form-control" type="text" id="endereco_cliente" name="endereco_cliente" required>
              </div>
            </div>

            <!-- Bairro -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="bairro_cliente" class="form-control-label">Bairro</label>
                <input class="form-control" type="text" id="bairro_cliente" name="bairro_cliente" required>
              </div>
            </div>

            <!-- Cidade -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="cidade_cliente" class="form-control-label">Cidade</label>
                <input class="form-control" type="text" id="cidade_cliente" name="cidade_cliente" required>
              </div>
            </div>

            <!-- Estado -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="uf" class="form-control-label">Estado</label>
                <select class="form-control" id="id_uf" name="id_uf" required>
                  <option selected> Selecione </option>
                  <?php foreach ($estados as $linha): ?>
                    <option value="<?php echo $linha['id_uf']; ?>"><?php echo $linha['sigla_uf']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>

          <!-- Botões -->
          <div class="row">
            <div class="col-12 text-center">
              <button type="submit" class="btn btn-success btn-sm">Salvar Alterações</button>
              <button type="reset" class="btn btn-danger btn-sm">Limpar Campos</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</form>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Imagem do funcionário
    const visualizarImg = document.getElementById('preview-img');
    const arquivo = document.getElementById('foto_cliente');

    visualizarImg.addEventListener('click', function() {
      arquivo.click();
    });

    arquivo.addEventListener('change', function() {
      if (arquivo.files && arquivo.files[0]) {
        let render = new FileReader();
        render.onload = function(e) {
          visualizarImg.src = e.target.result;
        };
        render.readAsDataURL(arquivo.files[0]);
      }
    });

    // Função para consultar o CEP
    document.getElementById('cep_cliente').addEventListener('input', function() {
      var cep = this.value.replace(/\D/g, ''); // Remove caracteres não numéricos
      if (cep.length === 8) { // Verifica se o CEP tem 8 caracteres
        var url = `https://viacep.com.br/ws/${cep}/json/`;

        fetch(url)
          .then(response => response.json())
          .then(data => {
            if (!data.erro) {
              // Preenche os campos com os dados do CEP
              document.getElementById('endereco_cliente').value = data.logradouro;
              document.getElementById('bairro_cliente').value = data.bairro;
              document.getElementById('cidade_cliente').value = data.localidade;

              // Verifica se o estado está na lista de estados
              var estadoSelect = document.getElementById('id_uf');
              for (var i = 0; i < estadoSelect.options.length; i++) {
                if (estadoSelect.options[i].text === data.uf) {
                  estadoSelect.selectedIndex = i;
                  break;
                }
              }
            } else {
              alert('CEP não encontrado!');
            }
          })
          .catch(error => alert('Erro ao buscar o CEP: ' + error));
      }
    });
  });
</script>