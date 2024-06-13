const cards = document.querySelectorAll(".card");
const patientCount = document.getElementById("patientCount");

for (let i = 0; i < cards.length; i++) {
    const card = cards[i];

    var stats = card.getAttribute("data-status");
    if (stats === "Off Duty" || stats === "Critical Condition") {
        card.style.backgroundColor = "#DC602E";
    }
    if (
        stats === "Available" ||
        stats === "In Rounds" ||
        stats === "Stable" ||
        stats === "Admitted" ||
        stats === "In Recovery"
    ) {
        card.style.backgroundColor = "#D0FFB7";
    }
    if (stats === "In Surgery") {
        card.style.backgroundColor = "#F6E27F";
    }
    if (stats === "On Call") {
        card.style.backgroundColor = "#F3D9B1";
    }
    if (stats === "On Vacation") {
        card.style.backgroundColor = "#636564";
    }
}

const inpRoom = document.getElementById("room");
const inpFloor = document.getElementById("floor");

inpRoom.addEventListener("input", function (e) {
    const input = e.target;
    const value = input.value;

    const filteredValue = value.replace(/[^0-9]/g, "");

    input.value = filteredValue;
});
inpFloor.addEventListener("input", function (e) {
    const input = e.target;
    const value = input.value;

    const filteredValue = value.replace(/[^0-9]/g, "");
    
    input.value = filteredValue;
});

function patientList() {
    document.getElementById("patientTable").style.display = "flex";
    document.getElementById("doctorTable").style.display = "none";
    document.getElementById("dashboard").style.display = "none";
    // document.getElementById('homepage').style.display = 'none';

    document.getElementById("dashb").style.backgroundColor = "";
    document.getElementById("ptnList").style.backgroundColor = "#75c9c8";
    document.getElementById("docList").style.backgroundColor = "";
}
function doctorList() {
    document.getElementById("doctorTable").style.display = "flex";
    document.getElementById("patientTable").style.display = "none";
    document.getElementById("dashboard").style.display = "none";
    // document.getElementById('homepage').style.display = 'none';

    document.getElementById("dashb").style.backgroundColor = "";
    document.getElementById("ptnList").style.backgroundColor = "";
    document.getElementById("docList").style.backgroundColor = "#75c9c8";
}
function dashboardView() {
    document.getElementById("doctorTable").style.display = "none";
    document.getElementById("patientTable").style.display = "none";
    document.getElementById("dashboard").style.display = "flex";
    // document.getElementById('homepage').style.display = 'none';

    document.getElementById("dashb").style.backgroundColor = "#75c9c8";
    document.getElementById("ptnList").style.backgroundColor = "";
    document.getElementById("docList").style.backgroundColor = "";
}