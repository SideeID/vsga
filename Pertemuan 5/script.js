var dataBarang = ["Buku Tulis", "Pensil", "Spidol"];

function showBarang() {
  var listBarang = document.getElementById("list-barang");
  listBarang.innerHTML = "";
  for (let i = 0; i < dataBarang.length; i++) {
    var btnEdit = "<a href='#' onclick='editBarang(" + i + ")'>Edit</a>";
    var btnHapus = "<a href='#' onclick='deleteBarang(" + i + ")'>Hapus</a>";
    listBarang.innerHTML +=
      "<li>" + dataBarang[i] + " [" + btnEdit + " | " + btnHapus + "]</li>";
  }
}

function addBarang() {
  var input = document.querySelector("#barang");
  dataBarang.push(input.value);
  showBarang();
  input.value="";
}

function deleteBarang(index){
    dataBarang.splice(index, 1);
    showBarang();
}