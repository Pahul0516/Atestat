// Get the grid container element
const gridContainerB = document.querySelector('.grid-containerB');
const gridContainerI = document.querySelector('.grid-containerI');
const gridContainerW = document.querySelector('.grid-containerW');
const gridContainerM = document.querySelector('.grid-containerM');
const gridContainerE = document.querySelector('.grid-containerE');

// Get the barista creation element
const baristaCreation = document.querySelector('.barista-creation');
const inspirationeItaliana = document.querySelector('.inspiratione-italiana');
const worldExplorations = document.querySelector('.world-explorations');
const masterOrigins = document.querySelector('.master-origins');
const espresso = document.querySelector('.espresso');

// Calculate the height of the grid container
const gridHeightB = gridContainerB.getBoundingClientRect().height;
const gridHeightI = gridContainerI.getBoundingClientRect().height;
const gridHeightW = gridContainerW.getBoundingClientRect().height;
const gridHeightM = gridContainerM.getBoundingClientRect().height;
const gridHeightE = gridContainerE.getBoundingClientRect().height;

// Set the height of the barista creation element
baristaCreation.style.minHeight = `${gridHeightB}px`;
inspirationeItaliana.style.minHeight = `${gridHeightI}px`;
worldExplorations.style.minHeight = `${gridHeightW}px`;
masterOrigins.style.minHeight = `${gridHeightM}px`;
espresso.style.minHeight = `${gridHeightE}px`;


function updateBaristaCreationHeight() {
    const gridContainerB = $('.grid-containerB');
    const baristaCreation = $('.barista-creation');
    const gridHeightB = gridContainerB.outerHeight();
    baristaCreation.css('min-height', `${gridHeightB}px`);
}


function updateInspirationeItalianaHeight() {
    const gridContainerI = $('.grid-containerI');
    const inspirationeItaliana = $('.inspiratione-italiana');
    const gridHeightI = gridContainerI.outerHeight();
    inspirationeItaliana.css('min-height', `${gridHeightI}px`);
}

function updateWorldExplorationsHeight() {
    const gridContainerW = $('.grid-containerW');
    const worldExplorations = $('.world-explorations');
    const gridHeightW = gridContainerW.outerHeight();
    worldExplorations.css('min-height', `${gridHeightW}px`);
}

function updateMasterOriginsHeight() {
    const gridContainerM = $('.grid-containerM');
    const masterOrigins = $('.master-origins');
    const gridHeightM = gridContainerM.outerHeight();
    masterOrigins.css('min-height', `${gridHeightM}px`);
}

function updateEspressoHeight() {
    const gridContainerE = $('.grid-containerE');
    const espresso = $('.espresso');
    const gridHeightE = gridContainerE.outerHeight();
    espresso.css('min-height', `${gridHeightE}px`);
}

// Example usage
$('.grid-containerB').append('<div class="capsula"></div>');
updateBaristaCreationHeight();
$('.grid-containerI').append('<div class="capsula"></div>');
updateInspirationeItalianaHeight();
$('.grid-containerW').append('<div class="capsula"></div>');
updateWorldExplorationsHeight();
$('.grid-containerM').append('<div class="capsula"></div>');
updateMasterOriginsHeight();
$('.grid-containerE').append('<div class="capsula"></div>');
updateEspressoHeight();
