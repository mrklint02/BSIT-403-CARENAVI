const cards = document.querySelectorAll('.card')
const patientCount = document.getElementById('patientCount')

for (let i = 0; i < cards.length; i++) {
    const card = cards[i];
    
    var stats = card.getAttribute('data-status')
    if(stats === 'Off Duty') {
        card.style.backgroundColor = 'rgb(255, 0, 0, 0.3)'
    }
    if(stats === 'Available' || stats === 'In Rounds') {
        card.style.backgroundColor = 'rgb(0, 255, 0, 0.3)'
    }
    if(stats === 'In Surgery') {
        card.style.backgroundColor = 'rgb(255, 165, 0, 0.3)'
    }
    if(stats === 'On Call') {
        card.style.backgroundColor = 'rgb(255, 255, 0, 0.3)'
    }
    if (stats === 'On Vacation') {
        card.style.backgroundColor = 'rgb(0, 0, 0, 0.3)'
    }
}