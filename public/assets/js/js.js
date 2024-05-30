const cards = document.querySelectorAll('.card')
const patientCount = document.getElementById('patientCount')

for (let i = 0; i < cards.length; i++) {
    const card = cards[i];
    
    var stats = card.getAttribute('data-status')
    if(stats === 'Off Duty' || stats === 'Critical Condition') {
        card.style.backgroundColor = 'rgb(255, 0, 0, 0.3)'
    }
    if(stats === 'Available' || stats === 'In Rounds' || stats === 'Stable' || stats === 'Admitted' || stats === 'In Recovery') {
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

function patientList() {
    document.getElementById('patientTable').style.display = 'grid'
    document.getElementById('doctorTable').style.display = 'none'
}
function doctorList() {
    document.getElementById('doctorTable').style.display = 'grid'
    document.getElementById('patientTable').style.display = 'none'
}