const assurer =  document.querySelector(".assurer");
const assurerOptions = document.querySelectorAll(".assurer > label");

assurer.addEventListener("change", e => {
	assurerOptions.forEach(label => label.classList.remove("selected"));
  e.target.parentElement.classList.add("selected");
}, {passive: true});