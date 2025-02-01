let assignedProjectIds = {};

function loadProposals() {
    const specialization = document.getElementById("specialisation").value;
    const proposalListDiv = document.getElementById("proposalList");
    let proposalsHTML = '';

    const proposals = {
        "game-development": [
            { projectId: '', title: 'Game Engine Optimization', status: 'Approved' },
            { projectId: '', title: '3D Rendering in Games', status: 'Rejected' }
        ],
        "cybersecurity": [
            { projectId: '', title: 'Advanced Malware Detection', status: 'Approved' },
            { projectId: '', title: 'Cybersecurity Threat Intelligence', status: 'Rejected' }
        ],
        "data-science": [
            { projectId: '', title: 'AI for Traffic Prediction', status: 'Approved' },
            { projectId: '', title: 'Data Analytics for Healthcare', status: 'Pending' }
        ],
        "software-engineering": [
            { projectId: '', title: 'Web Application Development', status: 'Approved' },
            { projectId: '', title: 'Mobile App Development', status: 'Pending' }
        ]
    };

    const selectedProposals = proposals[specialization] || [];

    const approvedProposals = selectedProposals.filter(proposal => proposal.status === 'Approved');

    if (approvedProposals.length > 0) {
        proposalsHTML += '<ul>';
        approvedProposals.forEach((proposal, index) => {
            proposalsHTML += `
                <li>
                    <strong>Title:</strong> ${proposal.title} 
                    <strong>Status:</strong> ${proposal.status}
                    <br>
                    <label for="projectId${index}">Assign Project ID:</label>
                    <input type="text" id="projectId${index}" name="projectId${index}" placeholder="Enter Project ID" required>
                    <button type="button" onclick="assignProjectId(${index}, '${specialization}')">Assign</button>
                    <span id="status${index}"></span>
                </li>
            `;
        });
        proposalsHTML += '</ul>';
    } else {
        proposalsHTML = '<p>No approved proposals available for this specialization.</p>';
    }

    proposalListDiv.innerHTML = proposalsHTML;
}

function assignProjectId(index, specialization) {
    const projectIdInput = document.getElementById(`projectId${index}`).value.trim();
    const statusSpan = document.getElementById(`status${index}`);

    if (projectIdInput === '') {
        statusSpan.textContent = 'Please enter a valid Project ID.';
        statusSpan.style.color = 'red';
        return;
    }

    if (assignedProjectIds[projectIdInput]) {
        statusSpan.textContent = 'This Project ID is already taken. Please choose a different one.';
        statusSpan.style.color = 'red';
        return;
    }

    assignedProjectIds[projectIdInput] = true;

    statusSpan.textContent = `Project ID ${projectIdInput} assigned successfully!`;
    statusSpan.style.color = 'green';
}

const menuIcon = document.getElementById('menuIcon');
const navbarLinks = document.getElementById('navbarLinks');

menuIcon.addEventListener('click', () => {
    navbarLinks.classList.toggle('active');
});