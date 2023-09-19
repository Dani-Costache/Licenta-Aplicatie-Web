// Obține referințele la elementele implicate
const menuIcon = document.getElementById("menuIcon");
const listIconContainer = document.querySelector(".list-icon-container");

// Variabilă pentru a urmări starea listei
let isMouseOverMenuIcon = false;
let isMouseOverList = false;

// Adaugă un eveniment de mouseenter pe iconița meniului
menuIcon.addEventListener("mouseenter", () => {
  // Afișează lista
  listIconContainer.style.display = "block";
  isMouseOverMenuIcon = true;
});

// Adaugă un eveniment de mouseleave pe iconița meniului
menuIcon.addEventListener("mouseleave", () => {
  isMouseOverMenuIcon = false;
  setTimeout(hideListIfMouseNotOver, 1000); // Adăugăm o mică întârziere înainte de a ascunde lista
});

// Adaugă un eveniment de mouseenter pe lista
listIconContainer.addEventListener("mouseenter", () => {
  isMouseOverList = true;
});

// Adaugă un eveniment de mouseleave pe lista
listIconContainer.addEventListener("mouseleave", () => {
  isMouseOverList = false;
  setTimeout(hideListIfMouseNotOver, 0); // Adăugăm o mică întârziere înainte de a ascunde lista
});

// Funcție pentru a ascunde lista dacă mouse-ul nu se află nici pe iconița meniului, nici pe lista
function hideListIfMouseNotOver() {
  if (!isMouseOverMenuIcon && !isMouseOverList) {
    listIconContainer.style.display = "none";
  }
}
