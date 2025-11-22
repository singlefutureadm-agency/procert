<form method="POST" id="form-funcionario" action="http://localhost/procert/public/administrador/adicionar" enctype="multipart/form-data">

  <div class="container my-5">
    <div class="row">

      <!-- FOTO -->
      <div class="col-md-4 text-center mb-4">
        <div style="width:100%; max-width:200px; aspect-ratio:1/1; overflow:hidden; border-radius:12px; margin:auto;">

          <?php
          $foto = (!empty($func['foto_funcionario']))
            ? BASE_URL . "public/uploads/" . $func['foto_funcionario']
            : BASE_URL . "public/uploads/sem-foto-servico.png";
          ?>

          <img src="<?= $foto ?>"
            alt="Foto"
            class="img-fluid"
            id="preview-img"
            style="cursor:pointer; width:100%; height:100%; object-fit:cover;">
        </div>

        <input type="file" name="foto_funcionario" id="foto_funcionario" style="display:none;" accept="image/*">
      </div>

      <!-- CAMPOS -->
      <div class="col-md-8">
        <div class="row">

          <!-- Nome -->
          <div class="col-md-6 mb-3">
            <label class="form-label">Nome do Administrador:</label>
            <input type="text" class="form-control" name="nome_funcionario" required>
          </div>

          <!-- Email -->
          <div class="col-md-6 mb-3">
            <label class="form-label">Email:</label>
            <input type="email" class="form-control" name="email_funcionario" required>
          </div>

          <!-- Data Nascimento -->
          <div class="col-md-6 mb-3">
            <label class="form-label">Data de Nascimento:</label>
            <input type="date" class="form-control" name="nasc_funcionario" required>
          </div>

          <!-- Senha -->
          <div class="col-md-6 mb-3">
            <label class="form-label">Senha:</label>
            <input type="password" class="form-control" name="senha_funcionario" required>
          </div>

          <!-- TIPO DE PESSOA -->
          <div class="col-md-6 mb-3">
            <label class="form-label">Tipo de Pessoa:</label>
            <select class="form-select" id="tipo_pessoa" name="tipo_pessoa" required>
              <option value="">Selecione...</option>
              <option value="fisica">Pessoa Física</option>
              <option value="juridica">Pessoa Jurídica</option>
            </select>
          </div>

          <!-- CPF -->
          <div class="col-md-6 mb-3" id="campo_cpf" style="display:none;">
            <label class="form-label">CPF:</label>
            <input type="text" class="form-control" id="cpf_funcionario" name="cpf_funcionario">
          </div>

          <!-- CNPJ -->
          <div class="col-md-6 mb-3" id="campo_cnpj" style="display:none;">
            <label class="form-label">CNPJ:</label>
            <input type="text" class="form-control" id="cnpj_funcionario" name="cnpj_funcionario">
          </div>

          <!-- Telefone -->
          <div class="col-md-6 mb-3">
            <label class="form-label">Telefone:</label>
            <input type="tel" class="form-control" name="telefone_funcionario">
          </div>

          <!-- Endereço -->
          <div class="col-md-6 mb-3">
            <label class="form-label">Endereço:</label>
            <input type="text" class="form-control" name="endereco_funcionario" required>
          </div>

          <!-- Bairro -->
          <div class="col-md-6 mb-3">
            <label class="form-label">Bairro:</label>
            <input type="text" class="form-control" name="bairro_funcionario" required>
          </div>

          < <div class="col-md-6">
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

      <!-- BOTÕES -->
      <div class="mt-4 d-flex justify-content-between">
        <button type="submit" class="btn btn-success">Salvar</button>
        <button type="button" class="btn btn-secondary" id="btn-cancelar">Cancelar</button>
      </div>

    </div>
  </div>
  </div>

</form>

<!-- SCRIPTS -->
<script>
  document.addEventListener('DOMContentLoaded', function() {

    // Preview de imagem
    const img = document.getElementById('preview-img');
    const file = document.getElementById('foto_funcionario');

    img.onclick = () => file.click();

    file.onchange = () => {
      if (file.files[0]) {
        let reader = new FileReader();
        reader.onload = e => img.src = e.target.result;
        reader.readAsDataURL(file.files[0]);
      }
    };

    // Tipo pessoa - CPF/CNPJ
    document.getElementById('tipo_pessoa').addEventListener('change', function() {
      const tipo = this.value;

      const campoCPF = document.getElementById('campo_cpf');
      const campoCNPJ = document.getElementById('campo_cnpj');
      const inputCPF = document.getElementById('cpf_funcionario');
      const inputCNPJ = document.getElementById('cnpj_funcionario');

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

    // Cancelar → Reset
    document.getElementById('btn-cancelar').onclick = () => {
      document.getElementById('form-funcionario').reset();
    };

  });
</script>