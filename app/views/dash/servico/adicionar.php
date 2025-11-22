<form method="POST" action="<?= BASE_URL ?>clientes/adicionar" enctype="multipart/form-data">
  <div class="container py-4">

    <div class="row g-4">
      <!-- Imagem do cliente -->
      <div class="col-md-4 d-flex flex-column align-items-center">

        <div class="border rounded-circle shadow-sm d-flex justify-content-center align-items-center overflow-hidden"
          style="width: 180px; height: 180px; cursor:pointer;">
          <img src="<?= BASE_URL ?>assets/img/usuario.png" id="preview-img" class="img-fluid" style="object-fit: cover;">
        </div>

        <input type="file" name="foto_cliente" id="foto_cliente" accept="image/*" class="d-none">
        <small class="text-muted mt-2">Clique na imagem para selecionar uma foto.</small>

        <script>
          document.getElementById("preview-img").addEventListener("click", () => {
            document.getElementById("foto_cliente").click();
          });

          document.getElementById("foto_cliente").addEventListener("change", function(e) {
            if (this.files && this.files[0]) {
              const reader = new FileReader();
              reader.onload = e => document.getElementById("preview-img").src = e.target.result;
              reader.readAsDataURL(this.files[0]);
            }
          });
        </script>

      </div>

      <!-- Informações do cliente -->
      <div class="col-md-8">
        <div class="card shadow-sm border-0">
          <div class="card-header bg-light">
            <h5 class="mb-0">Adicionar Cliente</h5>
          </div>

          <div class="card-body">

            <!-- INFORMAÇÕES PESSOAIS -->
            <h6 class="text-secondary text-uppercase">Informações Pessoais</h6>

            <div class="row g-3 mt-1">

              <!-- Nome -->
              <div class="col-md-6">
                <label class="form-label">Nome Completo</label>
                <input type="text" id="nome_cliente" name="nome_cliente" class="form-control"
                  placeholder="Digite o nome do cliente" required>
              </div>

              <!-- Email -->
              <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" id="email_cliente" name="email_cliente" class="form-control"
                  placeholder="email@exemplo.com" required>
              </div>

              <!-- Senha -->
              <div class="col-md-6">
                <label class="form-label">Senha</label>
                <div class="input-group">
                  <input type="password" id="senha_cliente" name="senha_cliente" class="form-control" required>
                  <button class="input-group-text bg-white" type="button" id="toggleSenha">
                    <i class="bi bi-eye" id="iconSenha"></i>
                  </button>
                </div>
              </div>

              <script>
                document.getElementById('toggleSenha').addEventListener('click', function () {
                  const input = document.getElementById('senha_cliente');
                  const icon = document.getElementById('iconSenha');

                  if (input.type === "password") {
                    input.type = "text";
                    icon.classList.replace("bi-eye", "bi-eye-slash");
                  } else {
                    input.type = "password";
                    icon.classList.replace("bi-eye-slash", "bi-eye");
                  }
                });
              </script>

              <!-- Data de nascimento -->
              <div class="col-md-6">
                <label class="form-label">Data de Nascimento</label>
                <input type="date" id="nasc_cliente" name="nasc_cliente" class="form-control" required>
              </div>

            </div>

            <hr>

            <!-- INFORMAÇÕES DO CLIENTE -->
            <h6 class="text-secondary text-uppercase">Informações do Cliente</h6>

            <div class="row g-3 mt-1">

              <!-- Tipo de pessoa -->
              <div class="col-md-6">
                <label class="form-label">Tipo de Pessoa</label>
                <select id="tipo_pessoa" class="form-select" name="tipo_cliente" required>
                  <option value="">Selecione...</option>
                  <option value="fisica">Pessoa Física</option>
                  <option value="juridica">Pessoa Jurídica</option>
                </select>
              </div>

              <!-- CPF -->
              <div class="col-md-6" id="campo_cpf" style="display:none;">
                <label class="form-label">CPF</label>
                <input type="text" id="cpf_cliente" name="cpf_cliente" class="form-control">
              </div>

              <!-- CNPJ -->
              <div class="col-md-6" id="campo_cnpj" style="display:none;">
                <label class="form-label">CNPJ</label>
                <input type="text" id="cnpj_cliente" name="cnpj_cliente" class="form-control">
              </div>

            </div>

            <script>
              document.getElementById('tipo_pessoa').addEventListener('change', function () {
                const tipo = this.value;
                const campoCPF = document.getElementById('campo_cpf');
                const campoCNPJ = document.getElementById('campo_cnpj');

                const inputCPF = document.getElementById('cpf_cliente');
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

            <div class="row g-3 mt-2">

              <!-- Telefone -->
              <div class="col-md-6">
                <label class="form-label">Telefone</label>
                <input type="tel" id="telefone_cliente" name="telefone_cliente" class="form-control"
                  placeholder="(XX) XXXXX-XXXX" required>
              </div>

              <!-- CEP -->
              <div class="col-md-6">
                <label class="form-label">CEP</label>
                <input type="text" id="cep_cliente" name="cep_cliente" class="form-control" maxlength="8"
                  placeholder="Digite o CEP" required>
              </div>

              <!-- Endereço -->
              <div class="col-md-6">
                <label class="form-label">Endereço</label>
                <input type="text" id="endereco_cliente" name="endereco_cliente" class="form-control" required>
              </div>

              <!-- Bairro -->
              <div class="col-md-6">
                <label class="form-label">Bairro</label>
                <input type="text" id="bairro_cliente" name="bairro_cliente" class="form-control" required>
              </div>

              <!-- Cidade -->
              <div class="col-md-6">
                <label class="form-label">Cidade</label>
                <input type="text" id="cidade_cliente" name="cidade_cliente" class="form-control" required>
              </div>

              <!-- Estado -->
              <div class="col-md-6">
                <label class="form-label">Estado</label>
                <select id="id_uf" name="id_uf" class="form-select" required>
                  <option value="">Selecione</option>
                  <?php foreach ($estados as $linha): ?>
                    <option value="<?= $linha['id_uf'] ?>"><?= $linha['sigla_uf'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

            </div>

          </div>

          <!-- Botões -->
          <div class="card-footer text-center bg-light">
            <button type="submit" class="btn btn-success px-4 me-2">Salvar</button>
            <button type="reset" class="btn btn-outline-danger px-4">Limpar</button>
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