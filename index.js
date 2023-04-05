<script>
var formOverlay = document.getElementById("form_overlay");
var exitButton = document.getElementById("exit_button");

exitButton.onclick = function() {
  formOverlay.style.display = "none";
}

window.onload = function() {
  formOverlay.style.display = "block";
}
</script>