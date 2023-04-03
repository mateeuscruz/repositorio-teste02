// Adiciona o evento de clique ao botão "Deletar"
const btnDelete = document.querySelectorAll(".btn-delete");

btnDelete.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    // Previne o comportamento padrão do botão
    e.preventDefault();

    // Obtém o id do lançamento a ser excluído
    const id = btn.dataset.id;

    // Cria um objeto FormData e adiciona o id como parâmetro
    const formData = new FormData();
    formData.append("id", id);

    // Envia a requisição AJAX ao servidor
    fetch("excluir.php", {
      method: "POST",
      body: formData,
    })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Erro ao excluir o lançamento");
      }
      // Recarrega a página após a exclusão bem-sucedida
      window.location.reload();
    })
    .catch((error) => {
      console.error(error);
    });
  });
});